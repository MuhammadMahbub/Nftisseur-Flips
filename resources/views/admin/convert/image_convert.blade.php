@extends('layouts.dashboard')

@section('title')
    {{ config('app.name') }} | {{ __("Image Convert") }}
@endsection

@section('imageconvert')
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
                {{ __("Image Convert") }}
            </li>
        </ol>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 col-12 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{__("Image Convert") }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('imageconvert.update', $imageconvert->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                    @csrf
                    @method("PUT")
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label for=""> {{ __('Actual Image') }} </label>
                                <img src="{{ asset('uploads/convert') }}/{{ $imageconvert->actual_image }}" alt="not found" width="300" height="400">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for=""> {{ __('Converted Image') }} </label>
                                <img src="{{ asset('uploads/convert') }}/{{ $imageconvert->converted_image }}" alt="not found" width="300" height="400">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="actual_image"> {{ __('Select Actual Image') }} <span class="text-danger">*</span> (size: 350*438 px) </label>
                                <input type="file" id="actual_image" class="form-control" name="actual_image"/>
                            </div>
                            <div class="form-group">
                                <label for=""> {{ __('Preview Actual Image') }} </label>
                                <img width="500" id="actual_output">
                            </div>
                            @error('actual_image')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="converted_image"> {{ __('Select New Converted Image') }} <span class="text-danger">*</span> (size: 350*438 px) </label>
                                <input type="file" id="converted_image" class="form-control" name="converted_image"/>
                            </div>
                            <div class="form-group">
                                <label for=""> {{ __('Preview New Converted Image') }} </label>
                                <img width="500" id="output">
                            </div>
                            @error('converted_image')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1">{{ __('Convert') }}</button>
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
        document.getElementById('actual_image').onchange = function() {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('actual_output').src = src
        };
        document.getElementById('converted_image').onchange = function() {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('output').src = src
        }
    </script>
@endsection
