<?php

namespace Modules\Health\Events\Author;

use Modules\Health\Entities\Author;
use Modules\Media\Contracts\DeletingMedia;


class WasDeleted implements DeletingMedia
{
    /**
     * @var Author $author
     */
    private $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->author->id;
    }
    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return get_class($this->author);
    }
}