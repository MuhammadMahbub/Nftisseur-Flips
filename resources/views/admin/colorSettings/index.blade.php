@extends('layouts.dashboard')

@section('title')
    {{ config('app.name') }} | {{ __("Color Setting") }}
@endsection

@section('colorSettings')
    active
@endsection


{{-- Breadcrumb --}}
@section('breadcrumb')
     <h2 class="content-header-title float-left mb-0">{{ __("Admin Dashboard") }}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __("Home") }}</a>
            </li>
            <li class="breadcrumb-item active">
                {{ __("Color Setting") }}
            </li>
        </ol>
    </div>
@endsection

{{-- Page Content --}}
@section('content')
    <section id="basic-vertical-layouts">
        <div class="row">
            <div class="col-md-7 col-12 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __("Color Setting") }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('colorSettings.update', $colorSettings->id) }}" method="POST" class="form form-vertical">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="theme_color">{{ __("Theme Color") }}</label>
                                        <input type="color" name="theme_color" value="{{ colorSettings()->theme_color }}" id="theme_color" class="form-control"/>
                                        @error('theme_color')
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
                                        <label for="menu_text_color">{{ __("Menu Text Color") }}</label>
                                        <input type="color" name="menu_text_color" value="{{ colorSettings()->hover_color }}" id="menu_text_color" class="form-control"/>
                                        @error('menu_text_color')
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
                                        <label for="background_color">{{ __("Background Color") }}</label>
                                        <input type="color" name="background_color" value="{{ colorSettings()->background_color }}" id="background_color" class="form-control"/>
                                        @error('background_color')
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
