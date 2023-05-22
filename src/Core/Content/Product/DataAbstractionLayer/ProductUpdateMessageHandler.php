<?php declare(strict_types=1);

namespace Shopware\Core\Content\Product\DataAbstractionLayer;

use Doctrine\DBAL\ArrayParameterType;
use Doctrine\DBAL\Connection;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Event\EntityWrittenContainerEvent;
use Shopware\Core\Framework\DataAbstractionLayer\Indexing\CompositeEntityIndexingMessage;
use Shopware\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexingMessage;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Plugin\Exception\DecorationPatternException;
use Shopware\Core\Framework\Uuid\Uuid;

#[Package('core')]
class ProductUpdateMessageHandler extends AbstractProductUpdateMessageHandler
{
    public function __construct(private readonly Connection $connection)
    {
    }

    public function getDecorated(): self
    {
        throw new DecorationPatternException(self::class);
    }

    public function update(EntityWrittenContainerEvent $event): ?EntityIndexingMessage
    {
        $updates = $event->getPrimaryKeys(ProductDefinition::ENTITY_NAME);

        if (empty($updates)) {
            return null;
        }

        $collection = new CompositeEntityIndexingMessage();

        // trigger immediate inheritance update
        $inheritance = new InheritanceUpdateMessage(array_values($updates), null, $event->getContext(), false, true);
        $collection->add($inheritance);

        // trigger immediate stock update
        $stocks = $event->getPrimaryKeysWithPropertyChange(ProductDefinition::ENTITY_NAME, ['stock', 'isCloseout', 'minPurchase']);
        $collection->add(
            new StockUpdateMessage(array_values($stocks), null, $event->getContext(), false, true)
        );

        $message = new ProductIndexingMessage(array_values($updates), null, $event->getContext());
        $message->addSkip(ProductIndexer::INHERITANCE_UPDATER, ProductIndexer::STOCK_UPDATER);
        $collection->add($message);

        $delayed = \array_unique(\array_filter(\array_merge(
            $this->getParentIds($updates),
            $this->getChildrenIds($updates)
        )));

        foreach (\array_chunk($delayed, 50) as $chunk) {
            $collection->add(new ProductIndexingMessage($chunk, null, $event->getContext(), true));
        }

        return $collection;
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
