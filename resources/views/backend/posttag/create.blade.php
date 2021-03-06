@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">{{ __('Add Post Category')}}</h5>
    <div class="card-body">
      <form method="post" action="{{route('post-tag.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">{{ __('Title')}}</label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">{{ __('Status')}}</label>
          <select name="status" class="form-control">
              <option value="active">{{ __('Active')}}</option>
              <option value="inactive">{{ __('Inactive')}}</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">{{ __('Reset')}}</button>
           <button class="btn btn-success" type="submit">{{ __('Submit')}}</button>
        </div>
      </form>
    </div>
</div>

@endsection
