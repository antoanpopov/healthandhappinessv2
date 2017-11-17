<?php

namespace Modules\Health\Events\Post;

use Modules\Health\Entities\Post;
use Modules\Media\Contracts\DeletingMedia;


class WasDeleted implements DeletingMedia
{
    /**
     * @var Post $post
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->post->id;
    }
    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return get_class($this->post);
    }
}