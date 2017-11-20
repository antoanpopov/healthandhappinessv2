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
});

$router->group(['prefix' => 'publications'], function (Router $router) {

    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $router->bind('health__category', function ($id) {
        return app(\Modules\Health\Repositories\CategoryRepository::class)->find($id);
    });
    $router->bind('health__post', function ($id) {
        return app(\Modules\Health\Repositories\PostRepository::class)->find($id);
    });

    $router->get('/', [
        'as' => 'frontend.publications.index',
        'uses' => 'PublicationsController@index',
    ]);

    $router->get('/{slug}', [
        'as' => $locale . 'frontend.publications.detail',
        'uses' => 'PublicationsController@show',
    ]);
});

$router->get(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::transRoute('routes.about'));