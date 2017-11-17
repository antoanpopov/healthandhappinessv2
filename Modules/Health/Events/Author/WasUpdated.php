<?php

namespace Modules\Health\Events\Author;

use Modules\Health\Entities\Author;
use Modules\Media\Contracts\StoringMedia;

class WasUpdated implements StoringMedia
{
    /**
     * @var Author
     */
    public $author;

    /**
     * @var array
     */
    public $data;

    public function __construct(Author $author, array $data)
    {
        $this->author = $author;
        $this->data = $data;
    }

    /**
     * Get the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->author;
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
