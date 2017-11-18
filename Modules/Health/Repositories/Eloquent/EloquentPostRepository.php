<?php

namespace Modules\Health\Repositories\Eloquent;

use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Health\Repositories\PostRepository;
use Modules\Health\Events\Post;

class EloquentPostRepository extends EloquentBaseRepository implements PostRepository
{

    public function create($data)
    {
        $post = $this->model->create($data);

        $post->setTags(array_get($data, 'tags',[]));

        event(new Post\WasCreated($post, $data));


        return $post;
    }

    public function update($post, $data)
    {
        $post->update($data);

        $post->setTags(array_get($data, 'tags',[]));

        event(new Post\WasUpdated($post, $data));


        return $post;
    }

    public function destroy($post)
    {
        $post->untag();
        event(new Post\WasDeleted($post));

        return $post->delete();
    }
}
