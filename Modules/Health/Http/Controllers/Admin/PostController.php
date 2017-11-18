<?php
/**
 * Created by PhpStorm.
 * User: antoanpopoff
 * Date: 16.11.17
 * Time: 09:57
 */

namespace Modules\Health\Http\Controllers\Admin;

use Illuminate\Support\Facades\App;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Health\Entities\Post;
use Modules\Health\Http\Requests;
use Modules\Health\Repositories\PostRepository;

class PostController extends AdminBaseController
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        parent::__construct();

        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->all();

        return view('health::admin.post.index', compact('posts'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('health::admin.post.create');
    }

    /**
     * @param Requests\Post\CreateRequest $request
     * @return mixed
     */
    public function store(Requests\Post\CreateRequest $request)
    {
        $this->postRepository->create($request->all());

        return redirect()->route('admin.health.posts.index')
            ->withSuccess(trans('health::messages.entity.created', ['entity' => $request[App::getLocale()]['title']]));
    }


    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('health::admin.post.edit', compact('post'));
    }


    /**
     * @param Post $post
     * @param Requests\Post\UpdateRequest $request
     * @return mixed
     */
    public function update(Post $post, Requests\Post\UpdateRequest $request)
    {
        $this->postRepository->update($post, $request->all());

        if ($request->get('button') === 'index') {
            return redirect()->route('admin.health.posts.index')
                ->withSuccess(trans('health::messages.entity.updated', ['entity' => $post->title]));
        }

        return redirect()->back()
            ->withSuccess(trans('health::messages.entity.updated', ['entity' => $post->title]));
    }


    /**
     * @param Post $post
     * @return mixed
     */
    public function destroy(Post $post)
    {
        $entityTitle = $post->title;
        $this->postRepository->destroy($post);

        return redirect()->route('admin.health.posts.index')
            ->withSuccess(trans('health::messages.entity.deleted', ['entity' => $entityTitle]));
    }

}