<?php declare(strict_types=1);

namespace Shopware\Core\Content\Product\DataAbstractionLayer;

use Doctrine\DBAL\ArrayParameterType;
use Doctrine\DBAL\Connection;
use Shopware\Core\Content\Product\Events\ProductIndexerEvent;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Defaults;
use Shopware\Core\Framework\DataAbstractionLayer\Dbal\Common\IterableQuery;
use Shopware\Core\Framework\DataAbstractionLayer\Dbal\Common\IteratorFactory;
use Shopware\Core\Framework\DataAbstractionLayer\Doctrine\RetryableQuery;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Event\EntityWrittenContainerEvent;
use Shopware\Core\Framework\DataAbstractionLayer\Indexing\ChildCountUpdater;
use Shopware\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexer;
use Shopware\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexerRegistry;
use Shopware\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexingMessage;
use Shopware\Core\Framework\DataAbstractionLayer\Indexing\InheritanceUpdater;
use Shopware\Core\Framework\DataAbstractionLayer\Indexing\ManyToManyIdFieldUpdater;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Plugin\Exception\DecorationPatternException;
use Shopware\Core\Framework\Uuid\Uuid;
use Shopware\Core\Profiling\Profiler;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

#[Package('core')]
class ProductUpdateMessageHandler extends AbstractProductUpdateMessageHandler
{
    public function __construct(
        private readonly InheritanceUpdater $inheritanceUpdater,
        private readonly StockUpdater $stockUpdater,
        private readonly Connection $connection,
        private readonly MessageBusInterface $messageBus
    ) {

    }

    public function getDecorated():self {
        throw new DecorationPatternException(self::class);
    }

    public function update(EntityWrittenContainerEvent $event): ?EntityIndexingMessage
    {
        $updates = $event->getPrimaryKeys(ProductDefinition::ENTITY_NAME);

        if (empty($updates)) {
            return null;
        }

        Profiler::trace('product:indexer:inheritance', function () use ($updates, $event): void {
            $this->inheritanceUpdater->update(ProductDefinition::ENTITY_NAME, $updates, $event->getContext());
        });

        $stocks = $event->getPrimaryKeysWithPropertyChange(ProductDefinition::ENTITY_NAME, ['stock', 'isCloseout', 'minPurchase']);
        Profiler::trace('product:indexer:stock', function () use ($stocks, $event): void {
            $this->stockUpdater->update(array_values($stocks), $event->getContext());
        });

        $message = new ProductIndexingMessage(array_values($updates), null, $event->getContext());
        $message->addSkip(ProductIndexer::INHERITANCE_UPDATER, ProductIndexer::STOCK_UPDATER);

        $delayed = \array_unique(\array_filter(\array_merge(
            $this->getParentIds($updates),
            $this->getChildrenIds($updates)
        )));

        foreach (\array_chunk($delayed, 50) as $chunk) {
            $child = new ProductIndexingMessage($chunk, null, $event->getContext());
            $child->setIndexer($this->getName());
            EntityIndexerRegistry::addSkips($child, $event->getContext());

            $this->messageBus->dispatch($child);
        }

        return $message;
    }

    /**
     * @param array<string> $ids
     *
     * @return string[]
     */
    private function getParentIds(array $ids): array
    {
        $parentIds = $this->connection->fetchFirstColumn(
            'SELECT DISTINCT LOWER(HEX(product.parent_id)) as id FROM product WHERE id IN (:ids)',
            ['ids' => Uuid::fromHexToBytesList($ids)],
            ['ids' => ArrayParameterType::STRING]
        );

        return array_unique(array_filter($parentIds));
    }

    /**
     * @param array<string> $ids
     *
     * @return array<string>
     */
    private function getChildrenIds(array $ids): array
    {
        $childrenIds = $this->connection->fetchFirstColumn(
            'SELECT DISTINCT LOWER(HEX(id)) as id FROM product WHERE parent_id IN (:ids)',
            ['ids' => Uuid::fromHexToBytesList($ids)],
            ['ids' => ArrayParameterType::STRING]
        );

        return array_unique(array_filter($childrenIds));
    }
}
