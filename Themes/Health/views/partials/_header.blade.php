<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('/') }}">@setting('core::site-name')</a>
            </div>
            @menu('main')
        </div>
    </nav>
</header>