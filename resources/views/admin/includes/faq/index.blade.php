@foreach ($faqs as $faq)
@php
    $locale = \App::getLocale();
@endphp
@php
$faq_title     = App\Models\FAQ::find($faq->id);
$faq_question  = json_decode($faq_title->question);
$faq_answer    = json_decode($faq_title->answer);
@endphp
    <tr>
        <td>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="check[]" class="custom-control-input single_select_checkbox" id="single_select_checkbox-{{ $faq->id }}">
                <label class="custom-control-label" for="single_select_checkbox-{{ $faq->id }}"></label>
            </div>
        </td>
        <td>{{ $loop->index + 1 }}</td>
        @if ($locale == 'fr')
            <td>{{ $faq_question->fr }}</td>
            <td>{{ $faq_answer->fr }}</td>
        @else
            <td>{{ $faq_question->en }}</td>
            <td>{{ $faq_answer->en }}</td>
        @endif
        <td>{{ $faq->created_at->format('d-M-Y') }}</td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown">
                    <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" data-toggle="modal" data-target="#faqEdit{{ $faq->id }}" title="Edit">
                        <i data-feather='edit'></i>
                        <span>{{ __('Edit') }}</span>
                    </a>

                    <a class="dropdown-item" data-toggle="modal" data-target="#faqDelete{{ $faq->id }}" title="Delete">
                        <i data-feather="trash" class="mr-50"></i>
                        <span>{{ __('Delete') }}</span>
                    </a>
                </div>
            </div>
        </td>
    </tr>

    @push('all_modals')
        <!-- Single Edit Modal -->
        <div class="modal fade" id="faqEdit{{ $faq->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> {{ __('FAQ Update') }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('faq.update', $faq->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="question_edit"> {{ __('Question') }} (Fr) <span class="text-danger">*</span> </label>
                                <input type="text" id="question_edit" class="form-control" name="question_edit[fr]" value="{{ $faq_question->fr }}" />
                            </div>
                            <div class="form-group">
                                <label for="question_edit"> {{ __('Question') }} (En) <span class="text-danger">*</span> </label>
                                <input type="text" id="question_edit" class="form-control" name="question_edit[en]" value="{{ $faq_question->en }}" />
                            </div>
                            @error('question_edit')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="answer_edit"> {{ __('Answer') }} (Fr)<span class="text-danger">*</span> </label>
                                <textarea class="form-control" name="answer_edit[fr]" id="answer_edit" cols="30" rows="4">{{ $faq_answer->fr }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="answer_edit"> {{ __('Answer') }} (En) <span class="text-danger">*</span> </label>
                                <textarea class="form-control" name="answer_edit[en]" id="answer_edit" cols="30" rows="4">{{ $faq_answer->en }}</textarea>
                            </div>
                            @error('answer_edit')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary mr-1">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Single Delete Modal -->
        <div class="modal fade" id="faqDelete{{ $faq->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('delete')
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
                            <button class="btn btn-danger waves-effect waves-float waves-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                                {{ __('Delete') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endpush

@endforeach
