@extends('adminlte::page')

@section('title', __('Position - New'))

@section('content_header')
    <h1>{{ __('Add position') }}</h1>
@stop

@section('content')
    <form action="{{ route('positions.store') }}" method="POST">
        @csrf
        <div class="form-group js-length-input">
            <label for="name" class="col-form-label">{{ __('Name') }}</label>
            <input
                id="name"
                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                name="name"
                value="{{ old('name') }}"
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

        <div class="form-group d-flex justify-content-end">
            <a href="{{ route('positions.index') }}" class="btn btn-outline-secondary mr-2">{{ __('Cancel') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
@stop
