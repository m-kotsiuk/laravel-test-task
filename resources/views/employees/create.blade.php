@extends('adminlte::page')

@section('title',  __('Employee - New'))

@section('content_header')
    <h1>{{ __('Add Employee') }}</h1>
@stop

@section('content')
    <div class="row no-gutters">
        <div class="col-md-6">
            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="employeeImage">{{ __('Photo') }}</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="photo_file" class="custom-file-input" id="employeeImage">
                            <label class="custom-file-label" for="employeeImage">{{ __('Choose a file') }}</label>
                        </div>
                    </div>
                    <div class="d-flex small justify-content-between pt-1">
                        <div class="text-secondary">{{ __('File format jpg,png up to 5MB, the minumun size of 300x300px') }}</div>
                    </div>
                    <div class="text-danger">
                        @if ($errors->has('photo_file'))
                            <strong>{{ $errors->first('photo_file') }}</strong>
                        @endif
                    </div>
                </div>


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

                <div class="form-group">
                    <label for="phone" class="col-form-label">{{ __('Phone') }}</label>
                    <input
                        id="phone"
                        class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                        name="phone_number"
                        value="{{ old('phone_number') }}"
                        data-inputmask='"mask": "+380 (99) 999 99 99"'
                        data-mask
                        required
                    />
                    <div class="d-flex small justify-content-between pt-1">
                        <div class="text-danger">
                            @if ($errors->has('phone_number'))
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            @endif
                        </div>
                        <div class="ml-auto">{{ __('Required format +380 (xx) XXX XX XX') }}</div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-form-label">{{ __('Email') }}</label>
                    <input
                        id="email"
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        name="email"
                        value="{{ old('email') }}"
                        required
                    />
                    <div class="text-danger">
                        @if ($errors->has('email'))
                            <strong>{{ $errors->first('email') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="position_id">{{ __('Position') }}</label>
                    <select
                        class="form-control js-autocomplete"
                        data-url="{{ route('positions.autocomplete') }}"
                        style="width: 100%;"
                        name="position_id"
                        id="position_id"
                    >
                        @if(old('position_id'))
                            <option value="{{ old('position_id') }}" selected>{{ App\Models\Position::find(old('position_id'))->name }}</option>
                        @endif
                    </select>
                    <div class="text-danger">
                        @if ($errors->has('position_id'))
                            <strong>{{ $errors->first('position_id') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="salary" class="col-form-label">{{ __('Salary, $') }}</label>
                    <input
                        id="salary"
                        class="form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}"
                        name="salary"
                        value="{{ old('salary') }}"
                        required
                    />
                    <div class="text-danger">
                        @if ($errors->has('salary'))
                            <strong>{{ $errors->first('salary') }}</strong>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <label>{{ __('Supervisor') }}</label>
                    <select
                        class="form-control js-autocomplete"
                        data-url="{{ route('employees.autocomplete') }}"
                        data-clear="true"
                        style="width: 100%;"
                        name="parent_id"
                    >
                        @if(old('parent_id'))
                            <option value="{{ old('parent_id') }}" selected>{{ App\Models\Employee::find(old('parent_id'))->name }}</option>
                        @endif
                    </select>
                    <div class="text-danger">
                        @if ($errors->has('parent_id'))
                            <strong>{{ $errors->first('parent_id') }}</strong>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <label for="employment_date">{{ __('Date of employment') }}</label>
                    <div class="input-group date" id="employmentdate" data-target-input="nearest">
                        <input
                            id="employment_date"
                            type="text"
                            name="employment_date"
                            class="form-control datetimepicker-input"
                            data-target="#employmentdate"
                            value="{{ old('employment_date') }}"
                        />
                        <div class="input-group-append" data-target="#employmentdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <div class="text-danger">
                        @if ($errors->has('employment_date'))
                            <strong>{{ $errors->first('employment_date') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="form-group d-flex justify-content-end">
                    <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary mr-2">{{ __('Cancel') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>

@stop
