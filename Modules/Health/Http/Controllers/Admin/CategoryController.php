<?php
/**
 * Created by PhpStorm.
 * User: antoanpopoff
 * Date: 16.11.17
 * Time: 09:57
 */

namespace Modules\Health\Http\Controllers\Admin;

use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Health\Entities\Category;
use Modules\Health\Http\Requests;
use Modules\Health\Repositories\CategoryRepository;

class CategoryController extends AdminBaseController
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct();

        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->all();

        return view('health::admin.category.index', compact('categories'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('health::admin.category.create');
    }

    /**
     * @param Requests\Category\CreateRequest $request
     * @return mixed
     */
    public function store(Requests\Category\CreateRequest $request)
    {
        $this->categoryRepository->create($request->all());

        return redirect()->route('admin.health.categories.index')
            ->withSuccess(trans('health::messages.category created'));
    }


    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('health::admin.category.edit', compact('category'));
    }


    /**
     * @param Category $category
     * @param Requests\Category\UpdateRequest $request
     * @return mixed
     */
    public function update(Category $category, Requests\Category\UpdateRequest $request)
    {
        $this->categoryRepository->update($category, $request->all());

        if ($request->get('button') === 'index') {
            return redirect()->route('admin.health.categories.index')
                ->withSuccess(trans('health::messages.category updated'));
        }

        return redirect()->back()
            ->withSuccess(trans('health::messages.category updated'));
    }


    /**
     * @param Category $category
     * @return mixed
     */
    public function destroy(Category $category)
    {
        $this->categoryRepository->destroy($category);

        return redirect()->route('admin.health.categories.index')
            ->withSuccess(trans('health::messages.category deleted'));
    }

}