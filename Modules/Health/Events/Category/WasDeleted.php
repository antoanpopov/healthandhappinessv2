<?php

namespace Modules\Health\Events\Category;

use Modules\Health\Entities\Category;
use Modules\Media\Contracts\DeletingMedia;


class WasDeleted implements DeletingMedia
{
    /**
     * @var Category $category
     */
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->category->id;
    }
    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return get_class($this->category);
    }
}