<?php declare(strict_types=1);

namespace Shopware\Core\Framework\DataAbstractionLayer\Indexing;

class CompositeEntityIndexingMessage extends EntityIndexingMessage
{
    /**
     * @var array<EntityIndexingMessage>
     */
    protected array $collection;

    /**
     * @param EntityIndexingMessage[] $collection
     */
    public function __construct(array $collection = [])
    {
        $this->collection = $collection;
    }

    public function add(EntityIndexingMessage $message): void
    {
        $this->collection[] = $message;
    }

    /**
     * @return EntityIndexingMessage[]
     */
    public function getCollection(): array
    {
        return $this->collection;
    }
}
