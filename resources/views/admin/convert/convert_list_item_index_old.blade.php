@extends('layouts.dashboard')

@section('title')
    {{ config('app.name') }} | Convert List Item
@endsection

@section('convertlistitem')
    active
@endsection

@section('breadcrumb')
     <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                Convert List item
            </li>
        </ol>
    </div>
@endsection

@section('content')

    @push('all_modals')
    <!-- Create Modal -->
    <div class="modal fade" id="itemCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> {{ __('Create List') }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('convertlistitem_create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-footer">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name"> {{ __('Item name') }} <span class="text-danger">*</span> </label>
                                    <input type="text" id="name" class="form-control" name="name"/>
                                </div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-info">{{ __("Create") }}</button>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>
    @endpush

    <div class="text-right mb-2"><a data-toggle="modal" data-target="#itemCreate" class="btn btn-success">Create</a></div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($convertitems as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->created_at->format('d-M-Y') }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#itemEdit{{ $item->id }}" title="Edit">
                                            <i data-feather='edit'></i>
                                            <span>{{ __('Edit') }}</span>
                                        </a>

                                        <a class="dropdown-item" data-toggle="modal" data-target="#itemDelete{{ $item->id }}" title="Delete">
                                            <i data-feather="trash" class="mr-50"></i>
                                            <span>{{ __('Delete') }}</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @push('all_modals')
                        <!-- Edit Modal -->
                            <div class="modal fade" id="itemEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> {{ __('Edit Image') }} </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('convertlistitem_update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                            <div class="modal-footer">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="name"> {{ __('Item name') }} <span class="text-danger">*</span> </label>
                                                        <input type="text" id="name" class="form-control" name="name" value="{{ $item->name }}"/>
                                                    </div>
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <button type="submit" class="btn btn-info">{{ __("Update") }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <!-- Delete Modal -->
                            <div class="modal fade" id="itemDelete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> {{ __('Delete Item') }} </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            {{ __("Are You Sure Delete This Item !!!") }}
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Close") }}</button>
                                            <form action="{{ route('convertlistitem_destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">{{ __("Delete") }}</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endpush

                    @endforeach
                </tbody>
            </table>
        </div>



    </div>
@endsection

@section('js')
    <script>
        document.getElementById('image').onchange = function() {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('output').src = src
        }
    </script>
@endsection
