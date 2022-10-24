@extends('layouts.dashboard')

@section('title')
    {{ config('app.name') }} | {{ __("FAQ") }}
@endsection

@section('faqs')
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
                {{ __("FAQ") }}
            </li>
        </ol>
    </div>
@endsection

@section('content')

    @push('all_modals')
    <!-- Create Modal -->
    <div class="modal fade" id="faqCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> {{ __('FAQ Create') }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-footer">
                        @csrf
                        <div class="col-12">
                            <div class="form-group">
                                <label for="question"> {{ __('Question') }} (Fr) <span class="text-danger">*</span> </label>
                                <input type="text" id="question" class="form-control" name="question[fr]" value="{{ old('question[fr]') }}" />
                            </div>
                            <div class="form-group">
                                <label for="question"> {{ __('Question') }} (En) <span class="text-danger">*</span> </label>
                                <input type="text" id="question" class="form-control" name="question[en]" value="{{ old('question[en]') }}" />
                            </div>
                            @error('question')
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="answer"> {{ __('Answer') }} (Fr) <span class="text-danger">*</span> </label>
                                <textarea class="form-control" name="answer[fr]" id="answer" cols="30" rows="4">{{ old('answer[fr]') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="answer"> {{ __('Answer') }} (En) <span class="text-danger">*</span> </label>
                                <textarea class="form-control" name="answer[en]" id="answer" cols="30" rows="4">{{ old('answer[en]') }}</textarea>
                            </div>
                            @error('answer')
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1">{{ __('Create') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @endpush

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="button-group-spacing w-100 text-right">
                        {{-- <button class="btn btn-success waves-effect w-sm-auto" data-toggle="modal" data-target="#csvImportModal">
                            <i data-feather='download'></i>
                            <span class="pl-50">{{ __("Import") }}</span>
                        </button> --}}
                        <button class="btn btn-warning waves-effect w-sm-auto" data-toggle="modal" data-target="#faqCreate">
                            <i data-feather='plus'></i>
                            <span class="pl-50">{{ __("Create") }}</span>
                        </button>
                        <div id="all_actions" class="dropdown w-sm-auto d-none">
                            <button class="btn btn-info w-100 w-sm-auto dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                All Action
                            </button>
                            <div class="dropdown-menu dropdown-menu-right w-100">
                                <button data-toggle="modal" data-target="#deleteModal" type="button" class="dropdown-item">{{ __("Delete Selected") }}</button>
                                @push('all_modals')
                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" style="font-size: 100px" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                    </svg>
                                                    <h2 class="font-weight-normal mt-1">{{ __('Are you sure') }}?</h2>
                                                    <h4 class="font-weight-light mb-0">{{ __("You won't be able to revert this!") }}</h4>
                                                </div>
                                                <div class="modal-footer border-top-0 justify-content-center">
                                                    <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                        </svg>
                                                        {{ __('Close') }}
                                                    </button>
                                                    <button id="delete_all" class="btn btn-danger waves-effect waves-float waves-light">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                        {{ __('Delete') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endpush
                                {{-- <form action="#!" method="POST">
                                    @csrf
                                    <input type="hidden" id="export_all" name="id">
                                    <button type="submit" class="dropdown-item" >{{ __("Export") }}</button>
                                </form> --}}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <form action="#!"> --}}
                        <div class="row align-items-end">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>{{ __("From") }} <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control flatpickr-human-friendly" placeholder="dd-mm-yyyy" required id="from__date" name="from_date">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>{{ __("To") }} <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control flatpickr-human-friendly" placeholder="dd-mm-yyyy" required id="to_date" name="to__date">
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-group">
                                    <button id="filter__date" class="btn btn-primary">{{ __("Filter") }}</button>
                                    <button id="clear__filter__date" class="btn btn-danger d-none">{{ __("Clear") }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="errorPass"></div>
                    {{-- </form> --}}
                    <div class="input-group mb-2">
                        <input type="text" class="form-control table_search" id="search_faq" placeholder="Search Here">
                        <div class="input-group-append">
                          <button class="input-group-text" type="button">
                            <i data-feather='search'></i>
                          </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="all_select_checkbox">
                                            <label class="custom-control-label" for="all_select_checkbox"></label>
                                        </div>
                                    </th>
                                    <th>SL</th>
                                    <th>{{ __("Question") }}</th>
                                    <th>{{ __("Answer") }}</th>
                                    <th>{{ __("Created At") }}</th>
                                    <th>{{ __("Action") }}</th>
                                </tr>
                            </thead>
                            <tbody id="render_faq">

                                @include('admin.includes.faq.index')

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section("js")
<script>
    $(document).ready(function () {
        var ids = [];
        @if($errors->has('question'))
            $('#faqCreate').modal('show');
        @endif

        @if($errors->has('answer'))
            $('#faqCreate').modal('show');
        @endif

        @if($errors->has('question_edit'))
            $("#faqEdit{{ session('faq_id') }}").modal('show');
        @endif

        @if($errors->has('answer_edit'))
            $("#faqEdit{{ session('faq_id') }}").modal('show');
        @endif

        // @if($errors->has('subcategory_name'))
        //     $("#edit_category_{{ session('id')}}").modal('show');
        // @endif

        // Select All Checkbox Features
        $('#all_select_checkbox').change(function(){
            ids = [];
            // Get all the id
            if($(this).is(":checked")){
                $('.custom-control-input').prop('checked', true);


                $('.single_select_checkbox').each(function(){
                    ids.push($(this).attr('id').split('-')[1]);
                });

                if(ids.length == 0){
                    $('#all_actions').removeClass('d-inline-block');
                    $('#all_actions').addClass('d-none');
                }
                else
                {
                    $('#all_actions').removeClass(' d-none');
                    $('#all_actions').addClass('d-inline-block');
                    $('#export_all').val(ids);
                }
                // Delete all
                $("#delete_all").on('click', function(){

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ route('faq_multi_delete') }}",
                        type: 'POST',
                        data: {
                            ids: ids,
                        },
                        success: function(data){
                            if(data.success == 'done'){
                                window.location.reload();
                            }
                        }
                    });

                });



            }else{
                $('.custom-control-input').prop('checked', false);
                $('#all_actions').addClass('d-none');
                $('#all_actions').removeClass('d-inline-block');
            }
        });

        // Select Individual Checkbox Features
        $('.single_select_checkbox').change(function(){
            ids = [];
            $('.single_select_checkbox').each(function(){
                if($(this).is(":checked")){
                    ids.push($(this).attr('id').split('-')[1]);
                }
            });
            if(ids.length == 0){
                $('#all_actions').removeClass('d-inline-block');
                $('#all_actions').addClass('d-none');
            }
            else
            {
                $('#all_actions').removeClass(' d-none');
                $('#all_actions').addClass('d-inline-block');
                $('#export_all').val(ids);

                    // Delete trigger

                    $("#delete_all").on('click', function(){

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                                url: "{{ route('faq_single_delete') }}",
                                type: 'POST',
                                data: {
                                    ids: ids,
                                },
                                success: function(data){
                                    if(data.success == 'done'){
                                        window.location.reload();
                                    }
                                }
                        });

                    });
            }
        });

        // Category Import
        $('body').on('change','#importCategory',function(){
            var form_data = new FormData($('#importCategoryForm')[0]);

            $.ajax({
                url: "",
                type: "post",
                    data: form_data,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.data){
                        $('#importSubmitButton').removeClass('d-none');
                        $('#importError').addClass('d-none');
                        $('#categoryCsvHeader').html(response.data);
                    }
                    if(response.error){
                        $('#importSubmitButton').addClass('d-none');
                        $('#importError').removeClass('d-none');
                        $('#importError').text(response.error);
                    }
                },
            });
        });
        // Table Search
        $('.table_search').on('input', function(){
            var tableSearchValue = $(this).val();
            $(this).closest(".card").find(".table tbody tr").each(function(){
                if($(this).text().search(new RegExp(tableSearchValue, "i")) < 0){
                    $(this).hide();
                }
                else{
                    $(this).show();
                }
            });
        });

        // filter date
        $('#filter__date').on('click',function(){
            // alert('hi');
            let from_date = $('#from__date').val();
            let to_date   = $('#to__date').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('date_wise_search_faq') }}",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                },
                success: function(response) {
                    console.log(response);
                    if ((response.count)*1 <  1) {
                        $('#render_faq').html('<tr ><td colspan="1000" class="text-danger text-center py-3">No Data Found</td></tr>');
                    } else {
                        $('#render_faq').html(response.data);
                    }

                    $("#clear__filter__date").removeClass("d-none");
                },
                error: function(){
                    $('.errorPass').html('<p style="color:#fa3232">Please provide both date</p>');
                },
            })

        });

        // clear filter
        $("#clear__filter__date").on("click", function(){
            $(this).addClass("d-none");
            $("#from__date").val('');
            $("#to__date").val('');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('date_wise_clear_faq') }}",

                success: function(response) {
                    $('#render_faq').html(response.data);
                    window.location.reload();
                }
            })
        });

        // search filter
        $('#search_faq').on('keyup',function(){
            let search_value = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('search_wise_faq') }}",
                data: {
                    search_value: search_value,
                },
                success: function(response) {
                    console.log(response);
                    if ((response.count)*1 <  1) {
                        $('#render_faq').html('<tr ><td colspan="1000" class="text-center"><div class="alert alert-warning"><div class="alert-body">No Data Found</div></div></td></tr>');
                    } else {
                        $('#render_faq').html(response.data);
                    }
                }
            })

        });

    });
</script>
@endsection


