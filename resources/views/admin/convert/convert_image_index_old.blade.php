@extends('layouts.dashboard')

@section('title')
    {{ config('app.name') }} | {{ __("Convert Image") }}
@endsection

@section('convertimage')
    active
@endsection

@section('breadcrumb')
     <h2 class="content-header-title float-left mb-0">{{ __("Admin Dashboard") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __("Convert Image") }}
            </li>
        </ol>
    </div>
@endsection

@section('content')

@push('all_modals')
<!-- Create Modal -->
<div class="modal fade" id="imageCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> {{ __('Create') }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('convertimage_create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="modal-footer">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="image"> {{ __('Choose Photo') }} <span class="text-danger">*</span> (size: 365*475px)</label>
                                <input type="file" id="image" class="form-control" name="image"/>
                            </div>
                            <div class="form-group">
                                <label for=""> {{ __('Preview Photo') }} </label>
                                <img width="500" id="output">
                            </div>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-info">{{ __("Create") }}</button>
                    </div>
                </form>

        </div>
    </div>
</div>
@endpush

<div class="text-right mb-2"><a data-toggle="modal" data-target="#imageCreate" class="btn btn-success">Create</a></div>
<div class="row">
    @foreach ($convertimages as $item)
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <img src="{{ asset('uploads/convert') }}/{{ $item->image }}" alt="not found" height="200px" width="100%">
            <div class="card-body">
                <a data-toggle="modal" data-target="#imageEdit{{ $item->id }}" class="btn btn-primary">Edit</a>
            <a data-toggle="modal" data-target="#imageDelete{{ $item->id }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>

    @push('all_modals')
    <!-- Edit Modal -->
        <div class="modal fade" id="imageEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> {{ __('Edit Image') }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('convertimage_update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="modal-footer">
                                {{-- <div class="col-12">
                                    <div class="form-group">
                                        <label for=""> {{ __('Previous Photo') }} </label>
                                        <img src="{{ asset('uploads/convert') }}/{{ $item->image }}" alt="not found" width="500" height="150">
                                    </div>
                                </div> --}}

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="image"> {{ __('Choose Photo') }} <span class="text-danger">*</span>(size: 365*475px) </label>
                                        <input type="file" id="image" class="form-control" name="image"/>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> {{ __('Preview Photo') }} </label>
                                        <img width="500" id="output">
                                    </div>
                                    @error('image')
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
        <div class="modal fade" id="imageDelete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> {{ __('Delete Image') }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        {{ __("Are You Sure Delete This Image !!!") }}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Close") }}</button>
                        <form action="{{ route('convertimage_destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
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
