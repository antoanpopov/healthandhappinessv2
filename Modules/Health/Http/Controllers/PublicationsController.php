<?php
namespace Modules\Health\Http\Controllers;
use Illuminate\Support\Facades\App;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Health\Repositories\PostRepository;

class PublicationsController extends BasePublicController
{
    /**
     * @var PostRepository
     */
    private $postRepository
    ;
    public function __construct(PostRepository $postRepository)
    {
        parent::__construct();
        $this->postRepository = $postRepository;
    }
    public function index()
    {
        $posts = $this->postRepository->allTranslatedIn(App::getLocale());
        return view('health::frontend.pages.publications.index', compact('posts'));
    }
    public function show($slug)
    {
        $post = $this->postRepository->findBySlug($slug);
        return view('health::frontend.pages.publications.show', compact('post'));
    }
}