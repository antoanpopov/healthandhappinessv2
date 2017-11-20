<div class="widget widget_tag_cloud">
    <h3 class="widget-title">{{ trans('frontend::labels.learn more about') }}</h3>
    <ul>
        @foreach($tags as $tag)
            <li>
                <a href="{{ route($route,['category'=> request('category'),'tag'=>$tag->slug]) }}"
                   title="{{ $tag->name }}">
                    {{ $tag->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>