<!DOCTYPE html>
<html>
<head lang="{{ LaravelLocalization::setLocale() }}">
    <meta charset="UTF-8">
    @section('meta')
        <meta name="description" content="@setting('core::site-description')"/>
    @show
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @section('title')@setting('core::site-name')@show
    </title>
    <link rel="shortcut icon" href="{{ Theme::url('favicon.ico') }}">

    {!! Theme::style('css/all.css') !!}
</head>
<body>
<div>
    {{ Date::setLocale(App::getLocale()) }}
    @include('partials._header')
    @if(Breadcrumbs::exists(Route::currentRouteName()))
        @yield('breadcrumbs',Breadcrumbs::render(Route::currentRouteName()))
    @endif
    <div class="container">
        @yield('content')
    </div>
    @include('partials._footer')
</div>
{!! Theme::script('js/all.js') !!}
@yield('scripts')

<?php if (Setting::has('core::analytics-script')): ?>
{!! Setting::get('core::analytics-script') !!}
<?php endif; ?>
</body>
</html>
