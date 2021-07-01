@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">{{ __('Add Currency') }}</h5>
    <div class="card-body">
        <form class="form-horizontal" action="{{ route('currency.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name" class="control-label">{{ __('Name') }}<span
                        class="text-red-600">*</span></label>

                <div class="sm:w-4/5 pr-4 pl-4">
                    <input type="text" class="form-control" name="name" placeholder="{{ __('Name') }}"
                        value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <p class="text-red-600"> {{ $errors->first('name') }} </p>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="sign" class="control-label">{{ __('Sign') }}<span
                        class="text-red-600">*</span></label>

                <div class="sm:w-4/5 pr-4 pl-4">
                    <input type="text" class="form-control" name="sign" placeholder="{{ __('Sign') }}"
                        value="{{ old('sign') }}">
                    @if($errors->has('sign'))
                        <p class="text-red-600"> {{ $errors->first('sign') }} </p>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="value" class="control-label">{{ __('Value') }}<span
                        class="text-red-600">*</span></label>

                <div class="sm:w-4/5 pr-4 pl-4">
                    <input type="text" min="0" step="0.1" class="form-control" name="value"
                        placeholder="{{ __('Value') }}" value="{{ old('value') }}">
                    @if($errors->has('value'))
                        <p class="text-red-600"> {{ $errors->first('value') }}
                        </p>
                    @endif
                </div>
            </div>


            <div class="form-group">
                <div class="sm:mx-1/5 sm:w-4/5 pr-4 pl-4">
                    <button type="submit"
                        class="btn btn-primary btn-sm mr-1">{{ __('Save') }}</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.row -->
</div>
@endsection
