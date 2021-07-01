@extends('backend.layouts.master')

@section('main-content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">{{ __('Currency List') }}</h6>
        <a href="{{ route('currency.add') }}" class="btn btn-primary btn-sm float-right"
            data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i>
            {{ __('Add Currency') }}</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="idtable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('#') }}</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Sign') }}</th>
                        <th scope="col">{{ __('Value') }}</th>
                        <th scope="col">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($currency as $id=>$curr)
                        <tr>
                            <td>{{ ++$id }}</td>
                            <td> {{ $curr->name }}
                            </td>

                            <td> {{ $curr->sign }}
                            </td>

                            <td> {{ $curr->value }}
                            </td>

                            <td> @if($curr->is_default == 1)
                                <a href="javascript:;"
                                    class="btn btn-danger btn-sm float-left mr-1 ">{{ __('Default') }}</a>
                                <a href="{{ route('currency.edit', $curr->id) }}"
                                    class="btn btn-primary btn-sm float-left mr-1"><i
                                        class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>

                            @else
                                <a href="{{ route('currency.status', $curr->id ) }}"
                                    class="btn btn-danger btn-sm float-left mr-1">{{ __('Set Default') }}</a>
                                <a href="{{ route('currency.edit', $curr->id) }}"
                                    class="btn btn-primary btn-sm float-left mr-1"><i
                                        class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>

                                <form id="deleteform" class="inline-block"
                                    action="{{ route('currency.delete', $curr->id ) }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $curr->id }}">
                                    <button type="submit"
                                        class="btn btn-danger btn-sm float-left mr-1"
                                        id="delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                    @endif
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
</div>

<!-- /.row -->
</div>
<div class="modal deleteModel" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __("Confirm Delete") }}</h5>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">{{ __("Are you sure") }}</p>
                <p class="text-center">{{ __("Do you want to proceed?") }}</p>
            </div>
            <div class="modal-footer">
                <a href="javascript:;"
                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-600 text-white hover:bg-gray-700"
                    data-dismiss="modal">{{ __("Cancel") }}</a>
                <a href="javascript:;"
                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700 btn-delete">{{ __("Delete") }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
