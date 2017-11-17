<?php

namespace Modules\Health\Repositories\Cache;

use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\Health\Repositories\PostRepository;

class CachePostDecorator extends BaseCacheDecorator implements PostRepository
{
    public function __construct(PostRepository $postRepository)
    {
        parent::__construct();
        $this->entityName = 'health.posts';
        $this->repository = $postRepository;
    }
}
