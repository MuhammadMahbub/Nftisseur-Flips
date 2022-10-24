@extends('layouts.dashboard')

@section('title')
    {{ config('app.name') }} | {{ __("Convert") }}
@endsection

@section('convert')
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
                {{ __("Convert") }}
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
                <form action="{{ route('convert.update', $convert->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="title"> {{ __('Convert Title') }} (FR)<span class="text-danger">*</span> </label>
                                <input type="text" id="title" class="form-control" name="title[fr]" value="{{ $convert_title->fr }}" />
                            </div>
                            <div class="form-group">
                                <label for="title"> {{ __('Convert Title') }} (EN)<span class="text-danger">*</span> </label>
                                <input type="text" id="title" class="form-control" name="title[en]" value="{{ $convert_title->en }}" />
                            </div>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="min_value"> {{ __('Min Value') }} <span class="text-danger">*</span> </label>
                                <input type="text" id="min_value" class="form-control" name="min_value" value="{{ $convert->min_value }}" />
                            </div>
                            @error('min_value')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="max_value"> {{ __('Max Value') }} <span class="text-danger">*</span> </label>
                                <input type="text" id="max_value" class="form-control" name="max_value" value="{{ $convert->max_value }}" />
                            </div>
                            @error('max_value')
                                <div class="text-danger">{{ $message }}</div>
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

