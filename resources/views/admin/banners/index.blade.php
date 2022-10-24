@extends('layouts.dashboard')

@section('title')
    {{ config('app.name') }} | {{ __("Banner") }}
@endsection

@section('banner')
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
                {{ __("Banner") }}
            </li>
        </ol>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 col-12 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __("Update Banner") }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="banner_title"> {{ __('Banner Title') }} (FR)<span class="text-danger">*</span> </label>
                                <input type="text" id="banner_title" class="form-control" name="banner_title[fr]" value="{{ $banner_title->fr }}" />
                            </div>
                            <div class="form-group">
                                <label for="banner_title"> {{ __('Banner Title') }} (EN)<span class="text-danger">*</span> </label>
                                <input type="text" id="banner_title" class="form-control" name="banner_title[en]" value="{{ $banner_title->en }}" />
                            </div>
                            @error('banner_title')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="banner_text"> {{ __('Banner Text') }} (FR)<span class="text-danger">*</span> </label>
                                <input type="text" id="banner_text" class="form-control" name="banner_text[fr]" value="{{ $banner_text->fr }}" />
                            </div>
                            <div class="form-group">
                                <label for="banner_text"> {{ __('Banner Text') }} (EN)<span class="text-danger">*</span> </label>
                                <input type="text" id="banner_text" class="form-control" name="banner_text[en]" value="{{ $banner_text->en }}" />
                            </div>
                            @error('title')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for=""> {{ __('Previous Photo') }} </label>
                                <img src="{{ asset('uploads/banner') }}/{{ $banner->image }}" alt="not found" width="500" height="200">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="image"> {{ __('Choose Photo') }} <span class="text-danger">*</span> </label>
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
                            <div class="form-group">
                                <label for="button_text"> {{ __('Button Text') }} (FR)<span class="text-danger">*</span> </label>
                                <input type="text" id="button_text" class="form-control" name="button_text[fr]" value="{{ $button_text->fr }}" />
                            </div>
                            <div class="form-group">
                                <label for="button_text"> {{ __('Button Text') }} (EN)<span class="text-danger">*</span> </label>
                                <input type="text" id="button_text" class="form-control" name="button_text[en]" value="{{ $button_text->en }}" />
                            </div>
                            @error('button_text')
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
