<?php
namespace Modules\Health\Composers;
use Illuminate\View\View;
use Modules\Health\Entities\Category;

class FooterViewComposer
{
    protected $categories;
    /**
     * TagsViewComposer constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->categories = $category;
    }
    public function compose(View $view)
    {
        $view->with('data',['categories' => $this->categories::all()]);
    }
}