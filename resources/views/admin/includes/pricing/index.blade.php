@foreach ($pricing as $item)
@php
    $locale = \App::getLocale();
@endphp
@php
$pricing_title     = App\Models\Pricing::find($item->id);
$price_title  = json_decode($pricing_title->title);
$price_text    = json_decode($pricing_title->text);
@endphp
    <tr>
        <td>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="check[]" class="custom-control-input single_select_checkbox" id="single_select_checkbox-{{ $item->id }}">
                <label class="custom-control-label" for="single_select_checkbox-{{ $item->id }}"></label>
            </div>
        </td>
        <td>{{ $loop->index + 1 }}</td>
        <td>{!! $item->icon !!}</td>
        @if ($locale == 'fr')
            <td>{{ $price_title->fr }}</td>
            <td>{!! $price_text->fr !!}</td>
        @else
            <td>{{ $price_title->en }}</td>
            <td>{!! $price_text->en !!}</td>
        @endif
        <td>{{ $item->created_at->format('d-M-Y') }}</td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown">
                    <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" data-toggle="modal" data-target="#pricingEdit{{ $item->id }}" title="Edit">
                        <i data-feather='edit'></i>
                        <span>{{ __('Edit') }}</span>
                    </a>

                    <a class="dropdown-item" data-toggle="modal" data-target="#pricingDelete{{ $item->id }}" title="Delete">
                        <i data-feather="trash" class="mr-50"></i>
                        <span>{{ __('Delete') }}</span>
                    </a>
                </div>
            </div>
        </td>
    </tr>

    @push('all_modals')
    @php
        $pricing_title     = App\Models\Pricing::find($item->id);
        $price_title  = json_decode($pricing_title->title);
        $price_text = json_decode($pricing_title->text);
    @endphp
        <!-- Single Edit Modal -->
        <div class="modal fade" id="pricingEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> {{ __('Update') }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('pricing.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="icon_edit"> {{ __('Icon') }} <span class="text-danger">*</span> <a href="https://icons.getbootstrap.com/">{{ __("icon search here:") }}</a> </label>
                                <input type="text" id="icon_edit" class="form-control" name="icon_edit" value="{{ $item->icon }}" />
                            </div>
                            @error('icon_edit')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="title_edit"> {{ __('Title') }} (FR)<span class="text-danger">*</span></label>
                                <input type="text" id="title_edit" class="form-control" name="title_edit[fr]" value="{{ $price_title->fr }}" />
                            </div>
                            <div class="form-group">
                                <label for="title_edit"> {{ __('Title') }} (EN)<span class="text-danger">*</span></label>
                                <input type="text" id="title_edit" class="form-control" name="title_edit[en]" value="{{ $price_title->en }}" />
                            </div>
                            @error('title_edit')
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="text_edit"> {{ __('Text') }} (FR)<span class="text-danger">*</span> </label>
                                <textarea class="form-control" name="text_edit[fr]" id="text_edit" cols="30" rows="4">{{ $price_text->fr }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="text_edit"> {{ __('Text') }} (EN)<span class="text-danger">*</span> </label>
                                <textarea class="form-control" name="text_edit[en]" id="text_edit" cols="30" rows="4">{{ $price_text->en }}</textarea>
                            </div>
                            @error('text_edit')
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
        <div class="modal fade" id="pricingDelete{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{ route('pricing.destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
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
