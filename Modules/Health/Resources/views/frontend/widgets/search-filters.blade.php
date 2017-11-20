<div class="row">
    @if(request('search'))
        <a href="{{ route('frontend.publications.index',['category'=> request('category'),'tag'=> request('tag')]) }}"
           title="SEARCH_TEXT">
            {{ request('search') }}
        </a>
    @endif
    @if(request('tag'))
        <a href="{{ route('frontend.publications.index',['search'=> request('search'), 'category'=> request('category')]) }}"
           title="SEARCH_TEXT">
            {{ request('tag') }}
        </a>
    @endif
    @if(request('category'))
        <a href="{{ route('frontend.publications.index',['search'=> request('search'), 'tag'=> request('tag')]) }}"
           title="SEARCH_TEXT">
            {{ request('category') }}
        </a>
    @endif
</div>