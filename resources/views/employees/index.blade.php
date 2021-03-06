@extends('adminlte::page')

@section('title', __('Employees'))

@section('content_header')
    <div class="d-sm-flex justify-content-between">
        <h1>{{ __('Employees') }}</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">{{ __('Add employee') }}</a>
    </div>

@stop

@section('content')
    <table id="employees-table" class="table table-bordered table-striped bg-white">
        <thead>
        <tr>
            <th>{{ __('Photo') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Position') }}</th>
            <th>{{ __('Date of employment') }}</th>
            <th>{{ __('Phone number') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Salary') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
        </thead>
    </table>

    @include('components.delete-modal', ['name' => 'employee'])
@stop

@section('js')
    <script>
        $(function() {
            $('#employees-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('employees.data') !!}',
                order: [1, 'asc'],
                columns: [
                    { data: 'photo', name: 'photo', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'position_id', name: 'position_id' },
                    { data: 'employment_date', name: 'employment_date' },
                    { data: 'phone_number', name: 'phone_number' },
                    { data: 'email', name: 'email' },
                    { data: 'salary', name: 'salary' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@stop

@section('plugins.Datatables', true)
