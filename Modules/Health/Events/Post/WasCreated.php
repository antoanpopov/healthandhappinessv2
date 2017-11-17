<?php

namespace Modules\Health\Events\Post;

use Modules\Health\Entities\Post;
use Modules\Media\Contracts\StoringMedia;

class WasCreated implements StoringMedia
{
    /**
     * @var Post
     */
    public $post;

    /**
     * @var array
     */
    private $data;

    public function __construct(Post $post, array $data)
    {
        $this->post = $post;
        $this->data = $data;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->post;
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
