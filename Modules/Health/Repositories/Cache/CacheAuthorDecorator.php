<?php

namespace Modules\Health\Repositories\Cache;

use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\Health\Repositories\AuthorRepository;

class CacheAuthorDecorator extends BaseCacheDecorator implements AuthorRepository
{
    public function __construct(AuthorRepository $authorRepository)
    {
        parent::__construct();
        $this->entityName = 'health.authors';
        $this->repository = $authorRepository;
    }
}
