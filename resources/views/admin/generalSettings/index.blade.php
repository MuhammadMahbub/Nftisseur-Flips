@extends('layouts.dashboard')

@section('title')
    {{ config('app.name') }} | {{ __("General Setting") }}
@endsection

@section('generalSettings')
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
                {{ __("Gerneral Setting") }}
            </li>
        </ol>
    </div>
@endsection

@section('content')
    <section id="basic-vertical-layouts">
        <div class="row">
            <div class="col-md-12 col-12 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __("General Setting") }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('generalSettings.update', $generalSettings->id) }}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="logo">{{ __("Logo") }}</label>
                                                <div class="custom-file">
                                                    <input type="file" name="logo" class="custom-file-input" id="logo">
                                                    <label class="custom-file-label" for="logo">{{ __("Choose Photo") }}</label>
                                                </div>
                                                @error('logo')
                                                <div class="alert alert-danger" role="alert">
                                                    <div class="alert-body">
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="logo">{{ __("Previous Photo") }} <span class="text-danger">*</span></label>
                                            <img src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->logo }}" style="max-height: 100px" alt="Not Found">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="favicon">{{ __("Favicon") }}</label>
                                                <div class="custom-file">
                                                    <input type="file" name="favicon" class="custom-file-input" id="favicon">
                                                    <label class="custom-file-label" for="favicon">{{ __("Choose Photo") }}</label>
                                                </div>
                                                @error('favicon')
                                                <div class="alert alert-danger" role="alert">
                                                    <div class="alert-body">
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="favicon">{{ __("Previous Photo") }} <span class="text-danger">*</span></label>
                                            <img src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->favicon ?? ''}}" style="max-height: 100px" alt="Not Found">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="meta_keywords">{{ __("Meta Keyword") }} <span class="text-danger">*</span></label>
                                        <input type="text" name="meta_keywords" value="{{ generalSettings()->meta_keywords }}" id="meta_keywords" class="form-control" placeholder="Enter meta keywords"/>
                                        @error('meta_keywords')
                                        <div class="alert alert-danger" role="alert">
                                            <div class="alert-body">
                                                {{ $message }}
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="meta_title">{{ __("Meta Title") }} <span class="text-danger">*</span></label>
                                        <input type="text" name="meta_title" value="{{ generalSettings()->meta_title }}" id="meta_title" class="form-control" placeholder="Enter meta title"/>
                                        @error('meta_title')
                                        <div class="alert alert-danger" role="alert">
                                            <div class="alert-body">
                                                {{ $message }}
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="meta_description">{{ __("Meta Description") }} <span class="text-danger">*</span></label>
                                        <input type="text" name="meta_description" value="{{ generalSettings()->meta_description }}" id="meta_description" class="form-control" placeholder="Enter meta description"/>
                                        @error('meta_description')
                                        <div class="alert alert-danger" role="alert">
                                            <div class="alert-body">
                                                {{ $message }}
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="meta_description">{{ __("Meta Author") }} <span class="text-danger">*</span></label>
                                        <input type="text" name="meta_author" value="{{ generalSettings()->meta_author }}" id="meta_author" class="form-control" placeholder="Enter meta author"/>
                                        @error('meta_author')
                                        <div class="alert alert-danger" role="alert">
                                            <div class="alert-body">
                                                {{ $message }}
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="copyright_name">{{ __("Copyright Name") }} <span class="text-danger">*</span></label>
                                        <input type="text" name="copyright_name" value="{{ generalSettings()->copyright_name }}" id="copyright_name" class="form-control" placeholder="Enter Copyright Name "/>
                                        @error('copyright_name')
                                        <div class="alert alert-danger" role="alert">
                                            <div class="alert-body">
                                                {{ $message }}
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="copyright_link">{{ __("Copyright Link") }}  <span class="text-danger">*</span></label>
                                        <input type="text" name="copyright_link" value="{{ generalSettings()->copyright_link }}" id="copyright_link" class="form-control" placeholder="Enter meta description"/>
                                        @error('copyright_link')
                                        <div class="alert alert-danger" role="alert">
                                            <div class="alert-body">
                                                {{ $message }}
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">{{ __("Submit") }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
