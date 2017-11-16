<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => 'health'], function (Router $router) {
    $router->bind('health__category', function ($id) {
        return app(\Modules\Health\Repositories\CategoryRepository::class)->find($id);
    });
    $router->bind('health__post', function ($id) {
        return app(\Modules\Health\Repositories\PostRepository::class)->find($id);
    });
    $router->get('categories', [
        'as' => 'admin.health.categories.index',
        'uses' => 'CategoryController@index',
        'middleware' => 'can:health.categories.index',
    ]);
    $router->get('categories/create', [
        'as' => 'admin.health.categories.create',
        'uses' => 'CategoryController@create',
        'middleware' => 'can:health.categories.create',
    ]);
    $router->post('categories', [
        'as' => 'admin.health.categories.store',
        'uses' => 'CategoryController@store',
        'middleware' => 'can:health.categories.create',
    ]);
    $router->get('categories/{health__category}/edit', [
        'as' => 'admin.health.categories.edit',
        'uses' => 'CategoryController@edit',
        'middleware' => 'can:health.categories.edit',
    ]);
    $router->put('categories/{health__category}', [
        'as' => 'admin.health.categories.update',
        'uses' => 'CategoryController@update',
        'middleware' => 'can:health.categories.edit',
    ]);
    $router->delete('categories/{health__category}', [
        'as' => 'admin.health.categories.destroy',
        'uses' => 'CategoryController@destroy',
        'middleware' => 'can:health.categories.destroy',
    ]);
    /**
     * POSTS ROUTES
     */
    $router->get('posts', [
        'as' => 'admin.health.posts.index',
        'uses' => 'PostsController@index',
        'middleware' => 'can:health.posts.index',
    ]);
    $router->get('posts/create', [
        'as' => 'admin.health.posts.create',
        'uses' => 'PostsController@create',
        'middleware' => 'can:health.posts.create',
    ]);
    $router->post('posts', [
        'as' => 'admin.health.posts.store',
        'uses' => 'PostsController@store',
        'middleware' => 'can:health.posts.create',
    ]);
    $router->get('posts/{health__post}/edit', [
        'as' => 'admin.health.posts.edit',
        'uses' => 'PostsController@edit',
        'middleware' => 'can:health.posts.edit',
    ]);
    $router->put('posts/{health__post}', [
        'as' => 'admin.health.posts.update',
        'uses' => 'PostsController@update',
        'middleware' => 'can:health.posts.edit',
    ]);
    $router->delete('posts/{health__post}', [
        'as' => 'admin.health.posts.destroy',
        'uses' => 'PostsController@destroy',
        'middleware' => 'can:health.posts.destroy',
    ]);
});
