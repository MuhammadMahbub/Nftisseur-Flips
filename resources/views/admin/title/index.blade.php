@extends('layouts.dashboard')

@section('title')
    {{ config('app.name') }} | {{ __("Title") }}
@endsection

@section('titles')
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
                {{ __("Title") }}
            </li>
        </ol>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 col-12 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __("Update") }} {{ __("Title") }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('title.update', $title->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="pricing_title"> {{ __('Quick Flip Title') }} (Fr) <span class="text-danger">*</span> </label>
                                <input type="text" id="pricing_title" class="form-control" name="pricing_title[fr]" value="{{ $title_pr->fr }}" />
                            </div>

                            <div class="form-group">
                                <label for="pricing_title"> {{ __('Quick Flip Title') }} (En)<span class="text-danger">*</span> </label>
                                <input type="text" id="pricing_title" class="form-control" name="pricing_title[en]" value="{{ $title_pr->en }}" />
                            </div>
                            @error('pricing_title')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="faq_title"> {{ __('FAQ Title') }} (Fr)<span class="text-danger">*</span> </label>
                                <input type="text" id="faq_title" class="form-control" name="faq_title[fr]" value="{{ $title_faq->fr }}" />
                            </div>

                            <div class="form-group">
                                <label for="faq_title"> {{ __('FAQ Title') }} (En)<span class="text-danger">*</span> </label>
                                <input type="text" id="faq_title" class="form-control" name="faq_title[en]" value="{{ $title_faq->en }}" />
                            </div>
                            @error('faq_title')
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

