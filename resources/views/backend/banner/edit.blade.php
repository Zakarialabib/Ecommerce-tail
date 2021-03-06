@extends('backend.layouts.master')
@section('title','leMotoShop || Banner Edit')
@section('main-content')

<div class="card">
    <h5 class="card-header">{{ __('Edit Banner')}}</h5>
    <div class="card-body">
      <form method="post" action="{{route('banner.update',$banner->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">{{ __('Title')}} <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="title"  value="{{$banner->title}}" class="form-control">
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>


        <div class="form-group">
          <label for="featured_title" class="col-form-label">{{ __('Featured title')}} <span class="text-danger">*</span></label>
        <input id="featured_title" type="text" name="featured_title"  value="{{$banner->featured_title}}" class="form-control">
        @error('featured_title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        
        <div class="form-group">
          <label for="button" class="col-form-label">{{ __('Button Text')}}</label>
          <input class="form-control" id="button" name="button" value="{{$banner->button}}">
          @error('button')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


        <div class="form-group">
          <label for="button_link" class="col-form-label">{{ __('Button Link')}}</label>
          <input class="form-control" id="button_link" name="button_link" value="{{$banner->button_link}}">
          @error('button_link')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


        <div class="form-group">
          <label for="inputDesc" class="col-form-label">{{ __('Description')}}</label>
          <textarea class="form-control" id="description" name="description">{{$banner->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
        <label for="inputPhoto" class="col-form-label">{{ __('Photo')}} <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                <i class="fa fa-picture-o"></i> {{ __('Choose')}}
                </a>
            </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$banner->photo}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="status" class="col-form-label">{{ __('Status')}}<span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($banner->status=='active') ? 'selected' : '')}}>{{ __('Active')}}</option>
            <option value="inactive" {{(($banner->status=='inactive') ? 'selected' : '')}}>{{ __('Inactive')}}</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">{{ __('Update')}}</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')

@endpush
@push('scripts')

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush