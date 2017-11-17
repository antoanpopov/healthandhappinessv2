@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('health::pages.common.edit',['entity'=> $category->title]) }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ URL::route('admin.health.categories.index') }}">{{ trans('health::pages.categories.index') }}</a></li>
        <li class="active">{{ trans('health::pages.common.edit',['entity'=> $category->title]) }}</li>
    </ol>
@stop

@push('css-stack')
    <style>
        .checkbox label {
            padding-left: 0;
        }
    </style>
@endpush

@section('content')
    {!! Form::open(['route' => ['admin.health.categories.update', $category->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-8">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers', ['fields' => ['title', 'body']])
                <div class="tab-content">
                    <?php $i = 0; ?>
                    <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                    <?php ++$i; ?>
                    <div class="tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                        @include('health::admin.category.partials.edit-fields', ['lang' => $locale])
                    </div>
                    <?php endforeach; ?>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat" name="button" value="index" >
                            <i class="fa fa-angle-left"></i>
                            {{ trans('core::core.button.update and back') }}
                        </button>
                        <button type="submit" class="btn btn-primary btn-flat">
                            {{ trans('core::core.button.update') }}
                        </button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ URL::route('admin.health.categories.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">
                    @mediaSingle('featured_image', $category)
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('health::pages.common.back',['page'=> route('admin.health.categories.index')]) }}</dd>
    </dl>
@stop

@push('js-stack')
    <script>
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.health.categories.index') ?>" }
                ]
            });
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush
