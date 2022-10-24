@extends('layouts.dashboard')

@section('title')
    {{ config('app.name') }} | {{ __("Service Banner") }}
@endsection

@section('service_banner')
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
                {{ __("Service Banner") }}
            </li>
        </ol>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 col-12 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __("Update") }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('service_banner_update', $service->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for=""> {{ __('Previous Photo') }} </label>
                                <img src="{{ asset('uploads/services') }}/{{ $service->image }}" alt="not found" width="500" height="200">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="image"> {{ __('Choose Photo') }}  </label>
                                <input type="file" id="image" class="form-control" name="image"/>
                            </div>
                            <div class="form-group">
                                <label for=""> {{ __('Preview Photo') }} </label>
                                <img width="500" id="output">
                            </div>
                            @error('image')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1">{{ __('Update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
