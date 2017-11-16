<?php

namespace Modules\Health\Repositories\Cache;

use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\Health\Repositories\CategoryRepository;

class CacheCategoryDecorator extends BaseCacheDecorator implements CategoryRepository
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->entityName = 'health.categories';
        $this->repository = $categoryRepository;
    }
}
