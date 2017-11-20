<div class="widget widget_search">
    {!! Form::open(['url' => route($route,['search' => request('search'),'category'=> request('category'), 'tag' => request('tag')]), 'method' => 'GET','class'=>'search-form']) !!}
    <div class="input-group">
        {!! Form::text('search', old('search'), ['placeholder' => trans('frontend::labels.search placeholder'),'class'=> 'form-control']) !!}
        <span class="search_btn">
            <button class="btn btn-search" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </span>
        @if(request('category'))
            {!! Form::hidden('category', old('category')) !!}
        @endif
        @if(request('tag'))
            {!! Form::hidden('tag', old('tag')) !!}
        @endif
    </div>
    {!! Form::close() !!}
</div>