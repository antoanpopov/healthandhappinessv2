<?php

namespace Modules\Health\Repositories\Eloquent;

use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Health\Repositories\CategoryRepository;
use Modules\Health\Events\Category;

class EloquentCategoryRepository extends EloquentBaseRepository implements CategoryRepository
{

    public function create($data)
    {
        $category = $this->model->create($data);

        event(new Category\WasCreated($category, $data));

        return $category;
    }

    public function update($category, $data)
    {
        $category->update($data);

        event(new Category\WasUpdated($category, $data));

        return $category;
    }

    public function destroy($category)
    {
        event(new Category\WasDeleted($category));
        return $category->delete();
    }
}
