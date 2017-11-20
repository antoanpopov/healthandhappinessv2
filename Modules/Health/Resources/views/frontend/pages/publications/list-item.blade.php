<article class="blog-post col-md-6 col-xs-12"
         itemscope="" itemtype="http://schema.org/BlogPosting">
    <figure>
        <a href="http://forumzdrave.bg/dieti-i-hranene/klenoviyat-sirop/">
            <img itemprop="image"
                 src="http://forumzdrave.bg/wp-content/uploads/2013/11/syrup-bottles-350x231.jpg"
                 alt="">
            <div class="article-header" itemprop="headline">
                {{ $publication->title }}
            </div>
        </a>
    </figure>
    <div class="article-content">
        <div class="article-tags">
            @foreach($publication->categories as $category)
                <a href="{{ route('frontend.publications.index',['category'=>$category->slug]) }}"
                   title="{{ $category->title }}" class="label label-theme">
                    {{ $category->title }}
                </a>
            @endforeach
        </div>
        <div class="">
                            <span class="entry-author">от <a
                                        href="http://forumzdrave.bg/author/jiterziev/"
                                        title="Публикации от Екип Форум Здраве"
                                        rel="author">{{ $publication->author->name }}</a></span>
            Публикувано на
            <time class="entry-date" datetime="2017-09-27T23:11:56" itemprop="datePublished">
                {{ $publication->created_at->format('d/m/Y') }}
            </time>
        </div>
        <div class="article-summary"><p>{{ $publication->abstract }}</p>
        </div>

        <a class="read-more"
           href="{{ route('frontend.publications.detail',['slug'=> $publication->slug]) }}">{{ trans('frontend::buttons.read more') }}</a>
    </div>
</article>