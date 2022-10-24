
@foreach ($datas->get_list as $list)
@php
    $locale = \App::getLocale();
@endphp
@php
$list     = App\Models\PricingList::find($list->id);
$l_name   = json_decode($list->name);
@endphp
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        @if ($locale == 'fr')
            <td>{{ $l_name->fr }}</td>
        @else
            <td>{{ $l_name->en }}</td>
        @endif
        <td>{{ $list->created_at->format('d-M-Y') }}</td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown">
                    <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" data-toggle="modal" data-target="#pricinglistEdit{{ $list->id }}" title="Edit">
                        <i data-feather='edit'></i>
                        <span>{{ __('Edit') }}</span>
                    </a>

                    <a class="dropdown-item" data-toggle="modal" data-target="#pricinglistDelete{{ $list->id }}" title="Delete">
                        <i data-feather="trash" class="mr-50"></i>
                        <span>{{ __('Delete') }}</span>
                    </a>
                </div>
            </div>
        </td>
    </tr>

    @push('all_modals')
    @php
        $pricing_title     = App\Models\PricingList::find($list->id);
        $price_name        = json_decode($pricing_title->name);
    @endphp
    <!-- Edit Modal -->
        <div class="modal fade" id="pricinglistEdit{{ $list->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> {{ __('Edit Pricing List') }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('pricinglist.update', $list->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="modal-footer">
                            <div class="col-12">
                                {{-- <div class="form-group">
                                    <label for="pricing_id"> {{ __('Pricing Title') }}</label>
                                    <input type="text" id="" class="form-control" disabled value="{{ $list->title }}"/>
                                </div> --}}
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name_edit"> {{ __('Name') }} (FR)<span class="text-danger">*</span> </label>
                                    <input type="text" id="name_edit" class="form-control" name="name_edit[fr]" value="{{ $price_name->fr }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="name_edit"> {{ __('Name') }} (EN)<span class="text-danger">*</span> </label>
                                    <input type="text" id="name_edit" class="form-control" name="name_edit[en]" value="{{ $price_name->en }}"/>
                                </div>
                                @error('name_edit')
                                    <div class="alert alert-danger" role="alert">
                                        <div class="alert-body">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info">{{ __("Update") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <!-- Delete Modal -->
        <div class="modal fade" id="pricinglistDelete{{ $list->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> {{ __('Delete ') }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        {{ __("Are You Sure Delete This List !!!") }}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Close") }}</button>
                        <form action="{{ route('pricinglist.destroy', $list->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">{{ __("Delete") }}</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endpush

@endforeach
