<?php

declare(strict_types=1);

namespace Setono\SyliusMeilisearchPlugin\Filter\Object;

use Setono\SyliusMeilisearchPlugin\Document\Document;
use Setono\SyliusMeilisearchPlugin\IndexScope\IndexScope;
use Setono\SyliusMeilisearchPlugin\Model\IndexableInterface;

interface FilterInterface
{
    /**
     * Works like array_filter. If the method returns true, the $entity will be in the resulting set of entities to index
     */
    public function filter(IndexableInterface $entity, Document $document, IndexScope $indexScope): bool;
}
