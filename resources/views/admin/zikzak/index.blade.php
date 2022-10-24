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
                <h4 class="card-title">{{ __("Update Zikzak") }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('zikzak.update', zikzakImages()->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for=""> {{ __('Previous Title Border') }} </label>
                                <img src="{{ asset('uploads/zikzak') }}/{{ zikzakImages()->title_border }}" alt="not found" width="200" height="100">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="title_border"> {{ __('Choose Title Border') }} <span class="text-danger">*</span> </label>
                                <input type="file" id="title_border" class="form-control" name="title_border"/>
                            </div>
                            <div class="form-group">
                                <label for="title_border"> {{ __('Preview Photo') }} </label>
                                <img width="200" id="title_output">
                            </div>
                            @error('title_border')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for=""> {{ __('Previous Section Border') }} </label>
                                <img src="{{ asset('uploads/zikzak') }}/{{ zikzakImages()->section_border }}" alt="not found" width="200" height="100">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="section_border"> {{ __('Choose Section Border') }} <span class="text-danger">*</span> </label>
                                <input type="file" id="section_border" class="form-control" name="section_border"/>
                            </div>
                            <div class="form-group">
                                <label for="section_border"> {{ __('Preview Photo') }} </label>
                                <img width="200" id="section_output">
                            </div>
                            @error('section_border')
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
        document.getElementById('section_border').onchange = function() {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('section_output').src = src
        }

        document.getElementById('title_border').onchange = function() {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('title_output').src = src
        }
    </script>
@endsection
