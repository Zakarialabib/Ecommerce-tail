@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">{{ __('Add Shipping')}}</h5>
    <div class="card-body">
      <form method="post" action="{{route('shipping.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">{{ __('Type')}} <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="type" placeholder="Enter title"  value="{{old('type')}}" class="form-control">
        @error('type')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="price" class="col-form-label">{{ __('Price ')}} <span class="text-danger">*</span></label>
        <input id="price" type="number" name="price" placeholder="Enter price"  value="{{old('price')}}" class="form-control">
        @error('price')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        
        <div class="form-group">
          <label for="status" class="col-form-label">{{ __('Status')}}<span class="text-danger">*</span></label>
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