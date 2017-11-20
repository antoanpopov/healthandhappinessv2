<footer id="footer">
    <div class="footer-widgets">
        <div class="container">
            <aside class="footer-widget col-xs-12 col-md-3">
                <h2 class="widget-title">{{ trans('frontend::labels.contact me') }}</h2>
                <p>{{ trans('frontend::labels.contact me description') }}</p>
                <nav>
                    <ul>
                        <li>
                            <a href="#" target="_blank" Title="Facebook page"><i class="fa fa-facebook"></i></a>
                        </li>
                    </ul>
                </nav>
            </aside><!-- #secondary -->
            <aside class="footer-widget widget-gallery col-xs-12 col-md-3">
                <h2 class="widget-title">{{ trans('frontend::labels.gallery') }}</h2>
                <nav>
                    <ul class="row">
                        <li class="col-xs-6 col-md-4">
                            <a href="//instagram.com/p/BaRGTIyHg3N/"
                               title="">
                                <img src="//scontent-lga3-1.cdninstagram.com/t51.2885-15/s160x160/sh0.08/e35/c0.135.1080.1080/22430538_401696530244869_5495015831773380608_n.jpg"
                                     alt="">
                            </a>
                        </li>
                        <li class="col-xs-6 col-md-4">
                            <a href="//instagram.com/p/BaRGTIyHg3N/"
                               title="">
                                <img src="//scontent-lga3-1.cdninstagram.com/t51.2885-15/s160x160/sh0.08/e35/c0.135.1080.1080/22430538_401696530244869_5495015831773380608_n.jpg"
                                     alt="">
                            </a>
                        </li>
                        <li class="col-xs-6 col-md-4">
                            <a href="//instagram.com/p/BaRGTIyHg3N/"
                               title="">
                                <img src="//scontent-lga3-1.cdninstagram.com/t51.2885-15/s160x160/sh0.08/e35/c0.135.1080.1080/22430538_401696530244869_5495015831773380608_n.jpg"
                                     alt="">
                            </a>
                        </li>
                        <li class="col-xs-6 col-md-4">
                            <a href="//instagram.com/p/BaRGTIyHg3N/"
                               title="">
                                <img src="//scontent-lga3-1.cdninstagram.com/t51.2885-15/s160x160/sh0.08/e35/c0.135.1080.1080/22430538_401696530244869_5495015831773380608_n.jpg"
                                     alt="">
                            </a>
                        </li>
                        <li class="col-xs-6 col-md-4">
                            <a href="//instagram.com/p/BaRGTIyHg3N/"
                               title="">
                                <img src="//scontent-lga3-1.cdninstagram.com/t51.2885-15/s160x160/sh0.08/e35/c0.135.1080.1080/22430538_401696530244869_5495015831773380608_n.jpg"
                                     alt="">
                            </a>
                        </li>
                        <li class="col-xs-6 col-md-4">
                            <a href="//instagram.com/p/BaRGTIyHg3N/"
                               title="">
                                <img src="//scontent-lga3-1.cdninstagram.com/t51.2885-15/s160x160/sh0.08/e35/c0.135.1080.1080/22430538_401696530244869_5495015831773380608_n.jpg"
                                     alt="">
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside><!-- #secondary -->
            <aside class="footer-widget widget-categories col-xs-12 col-md-3">
                <h2 class="widget-title">{{ trans('frontend::labels.categories') }}</h2>
                <nav>

                    <ul>
                        @foreach($data['categories'] as $category)
                            <li>
                                <a href="{{ route('frontend.publications.index',['category'=>$category->slug]) }}"
                                   title="{{ $category->title }}"
                                   @if(request()->fullUrl() == route('frontend.publications.index',['category'=>$category->slug]))class="active"@endif>
                                    {{ $category->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </aside><!-- #secondary -->
            <aside class="footer-widget widget-newsletter col-xs-12 col-md-3">
                <h2 class="widget-title">
                    {{ trans('frontend::labels.subscription') }}</h2>
                <p>{{ trans('frontend::labels.subscription description') }}</p>
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="email@example.com">
                        <span class="input-group-btn">
                            <button class="btn btn-theme"
                                    type="button">{{ trans('frontend::buttons.sign up') }}</button>
                        </span>
                    </div>
                    <!-
                </form>
            </aside><!-- #secondary -->
        </div><!-- .container -->

    </div>
    <!-- #footer-sidebar -->


    <div class="footer-bottom">

        <div class="container">
            <div class="pull-left">
                <p class="copyright-text">
                    Development and design by <a href="//antoanpopov.com" target="_blank">Antoan Popov</a>.
                </p><!-- .copyright-text -->
            </div><!-- .footer-left -->

            <div class="pull-right">
                <nav class="navbar">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="http://hellen.withemes.com/">{{ trans('frontend::pages.home.index') }}</a></li>
                        <li id="menu-item-233"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-233"><a
                                    href="http://hellen.withemes.com/about/">About</a></li>
                        <li id="menu-item-234"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-234"><a
                                    href="http://hellen.withemes.com/blog/">Blog</a></li>
                        <li id="menu-item-235"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-235"><a
                                    href="https://themeforest.net/item/hellen-responsive-multipurpose-theme/18225458/?ref=withemes">Purchase</a>
                        </li>
                        <li id="menu-item-559"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-559"><a
                                    href="#top">Back to top <i class="fa fa-angle-up"></i></a></li>
                    </ul>
                </nav><!-- #footernav -->
            </div><!-- .footer-right -->
        </div><!-- .container -->
    </div><!-- #footer-bottom -->
</footer>