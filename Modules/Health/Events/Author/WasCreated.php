<?php

namespace Modules\Health\Events\Author;

use Modules\Health\Entities\Author;
use Modules\Media\Contracts\StoringMedia;

class WasCreated implements StoringMedia
{
    /**
     * @var Author
     */
    public $author;

    /**
     * @var array
     */
    private $data;

    public function __construct(Author $author, array $data)
    {
        $this->author = $author;
        $this->data = $data;
    }

    /**
     * Return the entity
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
