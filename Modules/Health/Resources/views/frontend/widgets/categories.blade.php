<div class="widget widget_categories">
    <h3 class="widget-title">{{ trans('frontend::labels.categories') }}:</h3>
    <ul>
        @foreach($categories as $category)
            <li>
                <a href="{{ route($route,['search' => request('search'), 'category'=>$category->slug, 'tag' => request('tag')]) }}"
                   title="{{ $category->title }}"
                   @if(request()->fullUrl() == route('frontend.publications.index',['category'=>$category->slug]))class="active"@endif>
                    {{ $category->title }}
                </a>
            </li>
        @endforeach
    </ul>
</div>