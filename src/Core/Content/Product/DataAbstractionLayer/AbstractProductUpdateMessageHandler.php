<?php declare(strict_types=1);

namespace Shopware\Core\Content\Product\DataAbstractionLayer;

use Shopware\Core\Framework\DataAbstractionLayer\Event\EntityWrittenContainerEvent;
use Shopware\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexingMessage;
use Shopware\Core\Framework\Log\Package;

#[Package('core')]
abstract class AbstractProductUpdateMessageHandler
{
    abstract public function getDecorated(): AbstractProductUpdateMessageHandler;

    abstract public function update(EntityWrittenContainerEvent $event): ?EntityIndexingMessage;
}
