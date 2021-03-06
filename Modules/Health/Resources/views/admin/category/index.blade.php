@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('health::pages.categories.index') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('health::pages.categories.index') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ URL::route('admin.health.categories.create') }}" class="btn btn-primary btn-flat"
                       style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('health::pages.categories.create') }}
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
                            <th>Id</th>
                            <th>{{ trans('core::core.table.thumbnail') }}</th>
                            <th>{{ trans('page::pages.table.name') }}</th>
                            <th>{{ trans('health::form.abstract') }}</th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                        <tr>
                            <td>
                                <a href="{{ URL::route('admin.health.categories.edit', [$category->id]) }}">
                                    {{ $category->id }}
                                </a>
                            </td>
                            <td>
                                @if($category->featured_image)
                                    <img src="@thumbnail($category->featured_image->path, 'smallThumb')" alt=""/>
                                @else
                                    -- / --
                                @endif
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.health.categories.edit', [$category->id]) }}">
                                    {{ $category->title }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.health.categories.edit', [$category->id]) }}">
                                    {!!   str_limit($category->abstract) !!}
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.health.categories.edit', [$category->id]) }}">
                                    {{ $category->created_at }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ URL::route('admin.health.categories.edit', [$category->id]) }}"
                                       class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button data-toggle="modal" data-target="#modal-delete-confirmation"
                                            data-action-target="{{ route('admin.health.categories.destroy', [$category->id]) }}"
                                            class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>{{ trans('core::core.table.thumbnail') }}</th>
                            <th>{{ trans('page::pages.table.name') }}</th>
                            <th>{{ trans('health::form.abstract') }}</th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th>{{ trans('core::core.table.actions') }}</th>
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
                    {key: 'c', route: "<?= route('admin.health.categories.create') ?>"}
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
