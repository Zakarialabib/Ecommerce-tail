@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">{{ __('Edit Product')}}</h5>
    <div class="card-body">
      <form method="post" action="{{route('product.update',$product->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">{{ __('Title')}} <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$product->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">{{ __('Summary')}} <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary">{{$product->summary}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">{{ __('Description')}}</label>
          <textarea class="form-control" id="description" name="description">{{$product->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


        <div class="form-group">
          <label for="is_featured">{{ __('Is Featured')}}</label><br>
          <input type="checkbox" name='is_featured' id='is_featured' value='{{$product->is_featured}}' {{(($product->is_featured) ? 'checked' : '')}}> Yes                        
        </div>
              {{-- {{$categories}} --}}

        <div class="form-group">
          <label for="cat_id">{{ __('Category')}} <span class="text-danger">*</span></label>
          <select name="cat_id" id="cat_id" class="form-control">
              <option value="">--{{ __('Select any category')}}--</option>
              @foreach($categories as $key=>$cat_data)
                  <option value='{{$cat_data->id}}' {{(($product->cat_id==$cat_data->id)? 'selected' : '')}}>{{$cat_data->title}}</option>
              @endforeach
          </select>
        </div>
        @php 
          $sub_cat_info=DB::table('categories')->select('title')->where('id',$product->child_cat_id)->get();
        // dd($sub_cat_info);

        @endphp
        {{-- {{$product->child_cat_id}} --}}
        <div class="form-group {{(($product->child_cat_id)? '' : 'd-none')}}" id="child_cat_div">
          <label for="child_cat_id">{{ __('Sub Category')}} </label>
          <select name="child_cat_id" id="child_cat_id" class="form-control">
              <option value="">--{{ __('Select any sub category')}}--</option>
              
          </select>
        </div>

        <div class="form-group">
          <label for="price" class="col-form-label">{{ __('Price')}} <span class="text-danger">*</span></label>
          <input id="price" type="number" name="price" placeholder="Enter price"  value="{{$product->price}}" class="form-control">
          @error('price')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="discount" class="col-form-label">{{ __('Discount')}}(%)</label>
          <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Enter discount"  value="{{$product->discount}}" class="form-control">
          @error('discount')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="size">{{ __('Size')}}</label>
          <select name="size[]" class="form-control selectpicker"  multiple data-live-search="true">
              <option value="">--{{ __('Select any size')}}--</option>
              @foreach($items as $item)              
                @php 
                $data=explode(',',$item->size);
                // dd($data);
                @endphp
              <option value="3XS" @if( in_array( "3XS",$data ) ) selected @endif>3XS</option>
              <option value="4XS" @if( in_array( "4XS",$data ) ) selected @endif>4XS</option>
              <option value="5XS" @if( in_array( "5XS",$data ) ) selected @endif>5XS</option>
              <option value="XL" @if( in_array( "XL",$data ) ) selected @endif>XL</option>
              <option value="2XL" @if( in_array( "2XL",$data ) ) selected @endif>2XL</option>
              <option value="3XL" @if( in_array( "3XL",$data ) ) selected @endif>3XL</option>
              <option value="4XL" @if( in_array( "4XL",$data ) ) selected @endif>4XL</option>
              <option value="8" @if( in_array( "8",$data ) ) selected @endif>8</option>
              <option value="8.5" @if( in_array( "8.5",$data ) ) selected @endif>8.5</option>
              <option value="9" @if( in_array( "9",$data ) ) selected @endif>9</option>
              <option value="9.5" @if( in_array( "9.5",$data ) ) selected @endif>9.5</option>
              <option value="10" @if( in_array( "10",$data ) ) selected @endif>10</option>
              <option value="10.5" @if( in_array( "10.5",$data ) ) selected @endif>10.5</option>
              <option value="11" @if( in_array( "11",$data ) ) selected @endif>11</option>
              <option value="11.5" @if( in_array( "11.5",$data ) ) selected @endif>11.5</option>
              <option value="12" @if( in_array( "12",$data ) ) selected @endif>12</option>
              <option value="13" @if( in_array( "13",$data ) ) selected @endif>13</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="brand_id">{{ __('Brand')}}</label>
          <select name="brand_id" class="form-control">
              <option value="">--{{ __('Select Brand')}}--</option>
             @foreach($brands as $brand)
              <option value="{{$brand->id}}" {{(($product->brand_id==$brand->id)? 'selected':'')}}>{{$brand->title}}</option>
             @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="condition">{{ __('Condition')}}</label>
          <select name="condition" class="form-control">
              <option value="">--{{ __('Select Condition')}}--</option>
              <option value="default" {{(($product->condition=='default')? 'selected':'')}}>{{ __('Default')}}</option>
              <option value="new" {{(($product->condition=='new')? 'selected':'')}}>{{ __('New')}}</option>
              <option value="hot" {{(($product->condition=='hot')? 'selected':'')}}>{{ __('Hot')}}</option>
              <option value="sale" {{(($product->condition=='sale')? 'selected':'')}}>{{ __('Sale')}}</option>
          </select>
        </div>

        <div class="form-group">
          <label for="stock">{{ __('Quantity')}}<span class="text-danger">*</span></label>
          <input id="quantity" type="number" name="stock" min="0" placeholder="Enter quantity"  value="{{$product->stock}}" class="form-control">
          @error('stock')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">{{ __('Photo')}} <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                  <i class="fas fa-image"></i> {{ __('Choose')}}
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$product->photo}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="status" class="col-form-label">{{ __('Status')}}<span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($product->status=='active')? 'selected' : '')}}>{{ __('Active')}}</option>
            <option value="inactive" {{(($product->status=='inactive')? 'selected' : '')}}>{{ __('Inactive')}}</option>
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
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail Description.....",
          tabsize: 2,
          height: 150
      });
    });
</script>

<script>
  var  child_cat_id='{{$product->child_cat_id}}';
        // alert(child_cat_id);
        $('#cat_id').change(function(){
            var cat_id=$(this).val();

            if(cat_id !=null){
                // ajax call
                $.ajax({
                    url:"/admin/category/"+cat_id+"/child",
                    type:"POST",
                    data:{
                        _token:"{{csrf_token()}}"
                    },
                    success:function(response){
                        if(typeof(response)!='object'){
                            response=$.parseJSON(response);
                        }
                        var html_option="<option value=''>--Select any one--</option>";
                        if(response.status){
                            var data=response.data;
                            if(response.data){
                                $('#child_cat_div').removeClass('d-none');
                                $.each(data,function(id,title){
                                    html_option += "<option value='"+id+"' "+(child_cat_id==id ? 'selected ' : '')+">"+title+"</option>";
                                });
                            }
                            else{
                                console.log('no response data');
                            }
                        }
                        else{
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);

                    }
                });
            }
            else{

            }

        });
        if(child_cat_id!=null){
            $('#cat_id').change();
        }
</script>
@endpush