@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Settings</h5>
    <div class="card-body">
    <form method="post" action="{{route('settings.update')}}">
        @csrf 
        <div class="form-group">
          <label for="short_des" class="col-form-label">Short Description <span class="text-danger">*</span></label>
          <textarea class="form-control" id="quote" name="short_des">{{$data->short_des}}</textarea>
          @error('short_des')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="description" class="col-form-label">Description <span class="text-danger">*</span></label>
          <textarea class="form-control" id="description" name="description">{{$data->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Logo <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> {{ __('Choose')}}
                  </a>
              </span>
          <input id="thumbnail1" class="form-control" type="text" name="logo" value="{{$data->logo}}">
        </div>
        <div id="holder1" style="margin-top:15px;max-height:100px;"></div>

          @error('logo')
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
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$data->photo}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>

          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="address" class="col-form-label">Address <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="address" required value="{{$data->address}}">
          @error('address')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
          <input type="email" class="form-control" name="email" required value="{{$data->email}}">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="phone" class="col-form-label">Phone Number <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="phone" required value="{{$data->phone}}">
          @error('phone')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="ganalytics" class="col-form-label">Google Analytics Code 1</label>
          <textarea type="text" class="form-control" name="ganalytics">{{$data->ganalytics}}</textarea>
          @error('ganalytics')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="pixel" class="col-form-label">Facebook Analytics Code 2</label>
          <textarea type="text" class="form-control" name="pixel">{{$data->pixel}}</textarea>
          @error('pixel')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="klaviyo" class="col-form-label">Klaviyo Analytics Code 3</label>
          <textarea type="text" class="form-control" name="klaviyo" >{{$data->klaviyo}}</textarea>
          @error('klaviyo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
         <div class="form-group">
          <label for="body_tag" class="col-form-label">Analytics Body Tag</label>
          <textarea type="text" class="form-control" name="body_tag" >{{$data->body_tag}}</textarea>
          @error('body_tag')
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
    $('#lfm1').filemanager('image');
    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });

    $(document).ready(function() {
      $('#quote').summernote({
        placeholder: "Write short Quote.....",
          tabsize: 2,
          height: 100
      });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
</script>
@endpush