@extends('adminlte::page')

@section('title', __('Position - Edit'))

@section('content_header')
    <h1>{{ __('Edit position') }}</h1>
@stop

@section('content')
    <form action="{{ route('positions.update', compact('position')) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group js-length-input">
            <label for="name" class="col-form-label">{{ __('Name') }}</label>
            <input
                id="name"
                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                name="name"
                value="{{ old('name', $position->name) }}"
                required
                minlength="6"
                maxlength="256"
            />
            <div class="d-flex small justify-content-between pt-1">
                <div class="text-danger">
                    @if ($errors->has('name'))
                        <strong>{{ $errors->first('name') }}</strong>
                    @endif
                </div>
                <div class="ml-auto"><span class="js-length-input-count">{{ mb_strlen(old('name')) }}</span> / 256</div>
            </div>
        </div>
        <div class="row no-gutters px-2">
            <div class="col-md-6">
                <p><strong>{{ __('Created at') }}:</strong> {{ $position->created_at->format('d.m.y') }}</p>
                <p><strong>{{ __('Updated at') }}:</strong> {{ $position->updated_at->format('d.m.y') }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>{{ __('Admin created ID') }}:</strong> {{ $position->admin_created_id }}</p>
                <p><strong>{{ __('Admin updated ID') }}:</strong> {{ $position->admin_updated_id }}</p>
            </div>
        </div>
        <div class="form-group d-flex justify-content-end">
            <a href="{{ route('positions.index') }}" class="btn btn-outline-secondary mr-2">{{ __('Cancel') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
@stop
