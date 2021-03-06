@extends('adminlte::page')

@section('title', 'Positions')

@section('content_header')
    <div class="d-sm-flex justify-content-between">
        <h1>{{ __('Position list') }}</h1>
        <a href="{{ route('positions.create') }}" class="btn btn-primary">{{ __('Add position') }}</a>
    </div>

@stop

@section('content')
    <table id="positions-table" class="table table-bordered table-striped bg-white">
        <thead>
        <tr>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Last update') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
        </thead>
    </table>

    @include('components.delete-modal', ['name' => 'position'])
@stop

@section('js')
    <script>
        $(function() {
            $('#positions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('positions.data') !!}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@stop

@section('plugins.Datatables', true)
