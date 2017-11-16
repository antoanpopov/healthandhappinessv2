<?php

namespace Modules\Health\Events\Category;

use Modules\Health\Entities\Category;
use Modules\Media\Contracts\StoringMedia;

class WasUpdated implements StoringMedia
{
    /**
     * @var Category
     */
    public $category;

    /**
     * @var array
     */
    public $data;

    public function __construct(Category $category, array $data)
    {
        $this->category = $category;
        $this->data = $data;
    }

    /**
     * Get the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->category;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}
