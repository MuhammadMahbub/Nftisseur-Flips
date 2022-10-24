@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }} | {{ __("Subscribers") }}
@endsection

{{-- Active Menu --}}
@section('subscribers')
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
                {{ __("Subscribers") }}
            </li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row" id="basic-table">
    <div class="col-md-8 col-12 m-auto">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data_table">
                        <thead>
                            <tr>
                                <th>{{ __("SL") }}</th>
                                <th>{{ __("Email") }}</th>
                                <th>{{ __("Action") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscribers as $subscriber)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $subscriber->email }}</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('subscribers.destroy', $subscriber->id) }}" method="POST">
                                                {{-- Initiate Delete method --}}
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <a class="dropdown-item" href="{{ route('subscribers.destroy', $subscriber->id) }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    <i data-feather="trash" class="mr-50"></i>
                                                    <span>{{ __("Delete") }}</span>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
