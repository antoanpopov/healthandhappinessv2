@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('health::pages.posts.index') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('health::pages.posts.index') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ URL::route('admin.health.posts.create') }}" class="btn btn-primary btn-flat"
                       style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('health::pages.posts.create') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="width:20px;" data-sortable="false">{{ trans('health::form.public') }}</th>
                            <th>{{ trans('health::form.featured image') }}</th>
                            <th>{{ trans('health::form.title') }}</th>
                            <th>{{ trans('health::form.author') }}</th>
                            <th>{{ trans('health::form.published at') }}</th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($posts)): ?>
                        <?php foreach ($posts as $post): ?>
                        <tr>
                            <td style="text-align:center; vertical-align: middle;">
                                @if($post->is_public)
                                    <i class="fa fa-circle" style="color: lawngreen;"/>
                                @else
                                    <i class="fa fa-circle" style="color: red;"/>
                                @endif
                            </td>
                            <td>
                                @if($post->featured_image)
                                    <img src="@thumbnail($post->featured_image->path, 'smallThumb')" alt=""/>
                                @else
                                    -- / --
                                @endif
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.health.posts.edit', [$post->id]) }}">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.health.posts.edit', [$post->id]) }}">
                                    {{ $post->author_names }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.health.posts.edit', [$post->id]) }}">
                                    {{ $post->published_at->format('d/m/Y H:i') }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.health.posts.edit', [$post->id]) }}">
                                    {{ $post->created_at->format('d/m/Y H:i') }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ URL::route('admin.health.posts.edit', [$post->id]) }}"
                                       class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button data-toggle="modal" data-target="#modal-delete-confirmation"
                                            data-action-target="{{ route('admin.health.posts.destroy', [$post->id]) }}"
                                            class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('health::form.public') }}</th>
                            <th>{{ trans('health::form.featured image') }}</th>
                            <th>{{ trans('health::form.title') }}</th>
                            <th>{{ trans('health::form.author') }}</th>
                            <th>{{ trans('health::form.published at') }}</th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('page::pages.title.create page') }}</dd>
    </dl>
@stop

@push('js-stack')
    <?php $locale = App::getLocale(); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'c', route: "<?= route('admin.health.posts.create') ?>"}
                ]
            });
        });
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[0, "desc"]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
