@extends('user.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
  <h5 class="card-header">{{ __('Order Edit')}}</h5>
  <div class="card-body">
    <form action="{{route('order.update',$order->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="status">{{ __('Status')}} :</label>
        <select name="status" id="" class="form-control">
          <option value="">--{{('Select Status')}}--</option>
          <option value="Pending" {{(($order->status=='Pending')? 'selected' : '')}}>{{ __('Pending')}}</option>
          <option value="Processing" {{(($order->status=='Processing')? 'selected' : '')}}>{{ __('Processing')}}</option>
          <option value="delivered" {{(($order->status=='delivered')? 'selected' : '')}}>{{ __('Delivered')}}</option>
          <option value="Canceled" {{(($order->status=='Canceled')? 'selected' : '')}}>{{ __('Canceled')}}</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">{{ __('Update')}}</button>
    </form>
  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush