@extends('layouts.app')

@section('content')

@php
    $locale = \App::getLocale();
@endphp

<!-- Banner Section -->

<section class="banner" style="background-image: url('{{ asset('uploads/banner') }}/{{ $banner->image }}">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                @if ($locale == 'fr')
                <h1 class="banner__title">{{ $banner_title->fr }}</h1>
                <p class="banner__text">{{ $banner_text->fr }}</p>
                <a href="{{ route('subscribe') }}" class="primary-btn rounded-pill">
                    {{ $button_text->fr }} <i class="bi bi-chevron-right"></i>
                </a>
                @else
                <h1 class="banner__title">{{ $banner_title->en }}</h1>
                <p class="banner__text">{{ $banner_text->en }}</p>
                <a href="{{ route('subscribe') }}" class="primary-btn rounded-pill">
                    {{ $button_text->en }} <i class="bi bi-chevron-right"></i>
                </a>
                @endif

            </div>
        </div>
    </div>
</section>

<!-- How to Convert Section -->
<section class="convert section-gap section-border">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 section-header mx-auto">
                @if ($locale == 'fr')
                <h1 class="section-header__title text-center zikzak-title">{{ $convert_title->fr }} <br><span class="color-blue">{{ $convert->min_value }}$</span> EN <span class="color-pink">{{ $convert->max_value }}$</span></h1>
                @else
                <h1 class="section-header__title text-center zikzak-title">{{ $convert_title->en }} <br><span class="color-blue">{{ $convert->min_value }}$</span> EN <span class="color-pink">{{ $convert->max_value }}$</span></h1>
                @endif
            </div>
            <div class="col-md-8 mx-auto">
                <div class="slider">
                    @foreach ($convertimages as $item)
                        <div class="slider__slide">
                            <a href="{{ asset('uploads/convert') }}/{{ $item->image }}" class="slider__item" data-fancybox="slider" data-caption="Slider 1 caption goes here">
                                <img src="{{ asset('uploads/convert') }}/{{ $item->image }}" alt="Slider Image" class="slider__item__image" width="365px" height="475px">
                            </a>
                        </div>
                    @endforeach
                    {{-- <div class="slider__slide">
                        <a href="{{ asset('frontend_assets') }}/images/slider/slide-1.webp" class="slider__item" data-fancybox="slider" data-caption="Slider 1 caption goes here">
                            <img src="{{ asset('frontend_assets') }}/images/slider/slide-1.webp" alt="Slider Image" class="slider__item__image">
                        </a>
                    </div>
                    <div class="slider__slide">
                        <a href="{{ asset('frontend_assets') }}/images/slider/slide-2.webp" class="slider__item" data-fancybox="slider" data-caption="Slider 2 caption goes here">
                            <img src="{{ asset('frontend_assets') }}/images/slider/slide-2.webp" alt="Slider Image" class="slider__item__image">
                        </a>
                    </div>
                    <div class="slider__slide">
                        <a href="{{ asset('frontend_assets') }}/images/slider/slide-3.webp" class="slider__item" data-fancybox="slider" data-caption="Slider 3 caption goes here">
                            <img src="{{ asset('frontend_assets') }}/images/slider/slide-3.webp" alt="Slider Image" class="slider__item__image">
                        </a>
                    </div> --}}
                </div>
                <ul class="style-list align-items-md-center">
                    @foreach ($convertitems as $item)
                    @php
                        $convert_name      = App\Models\ConvertListItem::find($item->id);
                        $conv_name         = json_decode($convert_name->name);
                    @endphp
                    @if ($locale == 'fr')
                        <li class="style-list__item">{{ $conv_name->fr }}</li>
                    @else
                        <li class="style-list__item">{{ $conv_name->en }}</li>
                    @endif

                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-4 d-flex align-items-center justify-content-center">
                <a href="{{ asset('uploads/convert') }}/{{ $imageconvert->actual_image }}" data-fancybox="convert-gallery" data-caption="Discord Screenshort" class="d-inline-block">
                    <img src="{{ asset('uploads/convert') }}/{{ $imageconvert->actual_image }}" alt="Discord Screenshort" class="img-fluid" style="height: 440px; width: 350px">
                </a>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-center">
                <img src="{{ asset('frontend_assets') }}/images/convert-section/convert_2.png" alt="Discord Screenshort" class="img-fluid">
            </div>
            <div class="col-4 d-flex align-items-center justify-content-center">
                <a href="{{ asset('uploads/convert') }}/{{ $imageconvert->converted_image }}" data-fancybox="convert-gallery" data-caption="Discord Screenshort" class="d-inline-block">
                    <img src="{{ asset('uploads/convert') }}/{{ $imageconvert->converted_image }}" alt="Discord Screenshort" class="img-fluid" style="height: 440px; width: 350px">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing section-gap section-border">
    <div class="container">
        <div class="row">

            <div class="col-lg-7 section-header mx-auto">
                @if ($locale == 'fr')
                <h1 class="section-header__title text-center zikzak-title">{{ $title_pr->fr }}</h1>
                @else
                <h1 class="section-header__title text-center zikzak-title">{{ $title_pr->en }}</h1>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($pricing as $item)
            @php
                $pricing_title      = App\Models\Pricing::find($item->id);
                $price_title        = json_decode($pricing_title->title);
                $price_text         = json_decode($pricing_title->text);
            @endphp
                <div class="col-lg-4 col-md-6">
                    <div class="pricing__card {{ (($loop->index + 1) % 2 == 0) ? 'pricing__card--even' : '' }}">
                        <div class="pricing__card__header text-center">
                            <div class="pricing__card__header__icon">
                                {!! $item->icon !!}
                            </div>
                            @if ($locale == 'fr')
                            <h3 class="pricing__card__header__title">{{ $price_title->fr }}</h3>
                            <p class="pricing__card__header__text">{!! $price_text->fr !!}</p>
                            @else
                            <h3 class="pricing__card__header__title">{{ $price_title->en }}</h3>
                            <p class="pricing__card__header__text">{!! $price_text->en !!}</p>
                            @endif
                        </div>
                        <div class="pricing__card__body">
                            <ul class="pricing__card__body__list">
                                @php
                                    $p_list = App\Models\PricingList::where('pricing_id', $item->id)->get();
                                @endphp
                                @foreach ($p_list as $list)
                                @php
                                    $pricing_list      = App\Models\PricingList::find($list->id);
                                    $price_name        = json_decode($pricing_list->name);
                                @endphp
                                    <li class="pricing__card__body__list__item">
                                        <span class="pricing__card__body__list__item__icon">
                                            <i class="bi bi-check2"></i>
                                        </span>
                                        @if ($locale == 'fr')
                                            {{ $price_name->fr }}
                                        @else
                                            {{ $price_name->en }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="col-lg-4 col-md-6">
                <div class="pricing__card pricing__card--even">
                    <div class="pricing__card__header text-center">
                        <div class="pricing__card__header__icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h3 class="pricing__card__header__title">DÉBUTANTS</h3>
                        <p class="pricing__card__header__text">Si vous débutez, nous vous expliquerons comment commencer vos premiers investissements !</p>
                    </div>
                    <div class="pricing__card__body">
                        <ul class="pricing__card__body__list">
                            <li class="pricing__card__body__list__item">
                                <span class="pricing__card__body__list__item__icon">
                                    <i class="bi bi-check2"></i>
                                </span>
                                Pas le temps de grind des whitelist ?
                            </li>
                            <li class="pricing__card__body__list__item">
                                <span class="pricing__card__body__list__item__icon">
                                    <i class="bi bi-check2"></i>
                                </span>
                                vous voulez du profit rapidement ?
                            </li>
                            <li class="pricing__card__body__list__item">
                                <span class="pricing__card__body__list__item__icon">
                                    <i class="bi bi-check2"></i>
                                </span>
                                Ici vous êtes accompagné par les meilleures experts Flip de France. L’objectif est
                            </li>
                            <li class="pricing__card__body__list__item">
                                <span class="pricing__card__body__list__item__icon">
                                    <i class="bi bi-check2"></i>
                                </span>
                                de viser un smic en seulement 15 jours !
                            </li>
                            <li class="pricing__card__body__list__item">
                                <span class="pricing__card__body__list__item__icon">
                                    <i class="bi bi-check2"></i>
                                </span>
                                alors pourquoi pas vous ?
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pricing__card">
                    <div class="pricing__card__header text-center">
                        <div class="pricing__card__header__icon">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <h3 class="pricing__card__header__title">DÉBUTANTS</h3>
                        <p class="pricing__card__header__text">Si vous débutez, nous vous expliquerons comment commencer vos premiers investissements !</p>
                    </div>
                    <div class="pricing__card__body">
                        <ul class="pricing__card__body__list">
                            <li class="pricing__card__body__list__item">
                                <span class="pricing__card__body__list__item__icon">
                                    <i class="bi bi-check2"></i>
                                </span>
                                Pas le temps de grind des whitelist ?
                            </li>
                            <li class="pricing__card__body__list__item">
                                <span class="pricing__card__body__list__item__icon">
                                    <i class="bi bi-check2"></i>
                                </span>
                                vous voulez du profit rapidement ?
                            </li>
                            <li class="pricing__card__body__list__item">
                                <span class="pricing__card__body__list__item__icon">
                                    <i class="bi bi-check2"></i>
                                </span>
                                Ici vous êtes accompagné par les meilleures experts Flip de France. L’objectif est
                            </li>
                            <li class="pricing__card__body__list__item">
                                <span class="pricing__card__body__list__item__icon">
                                    <i class="bi bi-check2"></i>
                                </span>
                                de viser un smic en seulement 15 jours !
                            </li>
                            <li class="pricing__card__body__list__item">
                                <span class="pricing__card__body__list__item__icon">
                                    <i class="bi bi-check2"></i>
                                </span>
                                alors pourquoi pas vous ?
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>

<!-- Service Section -->
<section class="service section-gap section-border">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <a href="{{ asset('uploads/services') }}/{{ $service_banner->image }}" class="d-inline-block" data-fancybox="" data-caption="Services banner caption goes here">
                    <img src="{{ asset('uploads/services') }}/{{ $service_banner->image }}" alt="services image" class="img-fluid">
                </a>
            </div>
        </div>
        <div class="row match-height justify-content-center">
            @foreach ($services as $item)
            @php
                $service_title     = App\Models\Service::find($item->id);
                $serv_title        = json_decode($service_title->title);
                $serv_text         = json_decode($service_title->text);
            @endphp
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <article class="card">
                        <div class="card__icon">
                            {!! $item->icon !!}
                        </div>
                        @if ($locale == 'fr')
                            <h3 class="card__title">{{ $serv_title->fr }}</h3>
                            <p class="card__text">{!! $serv_text->fr !!}</p>
                        @else
                            <h3 class="card__title">{{ $serv_title->en }}</h3>
                            <p class="card__text">{!! $serv_text->en !!}</p>
                        @endif
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 section-header mx-auto">
                @if ($locale == 'fr')
                    <h1 class="section-header__title text-center zikzak-title">{{ $title_faq->fr }}</h1>
                @else
                    <h1 class="section-header__title text-center zikzak-title">{{ $title_faq->en }}</h1>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="accordionParent">
                    @foreach ($faqs as $faq)
                    @php
                        $faq_title     = App\Models\FAQ::find($faq->id);
                        $faq_question  = json_decode($faq_title->question);
                        $faq_answer = json_decode($faq_title->answer);
                    @endphp
                     @if ($locale == 'fr')
                        <div class="accordion__card">
                            <button data-target="#faq__{{ $faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" class="accordion__card__header" type="button" data-toggle="collapse" >
                                <div class="accordion__card__header__indicator">
                                    <span class="accordion__card__header__indicator__icon">
                                        <i class="bi bi-plus-lg"></i>
                                    </span>
                                </div>
                                <h3 class="accordion__card__header__title">{{ $faq_question->fr }}</h3>
                            </button>
                            <div id="faq__{{ $faq->id }}" class="collapse {{ $loop->first ? 'show' : '' }}" data-parent="#accordionParent">
                                <div class="accordion__card__body">
                                    <p class="accordion__card__body__text">{{ $faq_answer->fr }}</p>
                                </div>
                            </div>
                        </div>
                     @else
                        <div class="accordion__card">
                            <button data-target="#faq__{{ $faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" class="accordion__card__header" type="button" data-toggle="collapse" >
                                <div class="accordion__card__header__indicator">
                                    <span class="accordion__card__header__indicator__icon">
                                        <i class="bi bi-plus-lg"></i>
                                    </span>
                                </div>
                                <h3 class="accordion__card__header__title">{{ $faq_question->en }}</h3>
                            </button>
                            <div id="faq__{{ $faq->id }}" class="collapse {{ $loop->first ? 'show' : '' }}" data-parent="#accordionParent">
                                <div class="accordion__card__body">
                                    <p class="accordion__card__body__text">{{ $faq_answer->en }}</p>
                                </div>
                            </div>
                        </div>
                     @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
