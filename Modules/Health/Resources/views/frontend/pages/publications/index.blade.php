@extends('health::frontend.layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                @include('health::frontend.widgets.search-filters')
                @each('health::frontend.pages.publications.list-item',$posts,'publication','health::frontend.search.no-results')
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="sidebar">
                    @include('health::frontend.widgets.search',['route'=>'health.publications.index'])
                    @include('health::frontend.widgets.categories',['route'=>'health.publications.index'])
                    @include('health::frontend.widgets.tags',['route'=>'health.publications.index'])
                </div>
            </div>
        </div>
    </div>
@endsection