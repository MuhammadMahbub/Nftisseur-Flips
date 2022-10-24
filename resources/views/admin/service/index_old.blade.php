@extends('layouts.dashboard')

@section('title')
    {{ config('app.name') }} | Service
@endsection

@section('service')
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
                Service
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
                    <h5 class="modal-title" id="exampleModalLabel"> {{ __('Create Service') }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-footer">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title"> {{ __('Title') }} <span class="text-danger">*</span> </label>
                                    <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}"/>
                                </div>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="icon"> {{ __('Icon') }} <span class="text-danger">*</span> (<a href="https://icons.getbootstrap.com/">search icon here:</a>)</label>
                                    <input type="text" id="icon" class="form-control" name="icon"/>
                                </div>
                                @error('icon')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="text"> {{ __('Text') }} <span class="text-danger">*</span> </label>
                                    <textarea class="form-control" name="text" id="text" cols="30" rows="4">{{ old('text') }}</textarea>
                                </div>
                                @error('text')
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
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Text</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{!! $item->icon !!}</td>
                            <td>{{ $item->title }}</td>
                            <td>{!! $item->text !!}</td>
                            <td>{{ $item->created_at->format('d-M-Y') }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#serviceEdit{{ $item->id }}" title="Edit">
                                            <i data-feather='edit'></i>
                                            <span>{{ __('Edit') }}</span>
                                        </a>

                                        <a class="dropdown-item" data-toggle="modal" data-target="#serviceDelete{{ $item->id }}" title="Delete">
                                            <i data-feather="trash" class="mr-50"></i>
                                            <span>{{ __('Delete') }}</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @push('all_modals')
                        <!-- Edit Modal -->
                            <div class="modal fade" id="serviceEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> {{ __('Edit Service') }} </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('service.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                            <div class="modal-footer">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="title"> {{ __('Title') }} <span class="text-danger">*</span> </label>
                                                        <input type="text" id="title" class="form-control" name="title" value="{{ $item->title }}"/>
                                                    </div>
                                                    @error('title')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="icon"> {{ __('Icon') }} <span class="text-danger">*</span> (<a href="https://icons.getbootstrap.com/">search icon here:</a>)</label>
                                                        <input type="text" id="icon" class="form-control" name="icon" value="{{ $item->icon }}"/>
                                                    </div>
                                                    @error('icon')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="text"> {{ __('Text') }} <span class="text-danger">*</span> </label>
                                                        <textarea class="form-control" name="text" id="text" cols="30" rows="4">{{ $item->text }}</textarea>
                                                    </div>
                                                    @error('text')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-info">{{ __("Update") }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <!-- Delete Modal -->
                            <div class="modal fade" id="serviceDelete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> {{ __('Delete Service') }} </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            {{ __("Are You Sure Delete This Service !!!") }}
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Close") }}</button>
                                            <form action="{{ route('service.destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
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

