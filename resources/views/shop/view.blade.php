{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <main class="page-wrapper">
      <div class="container">
        <section class="shop-page page">
          <div class="page-heading">
            <h1 class="page-heading__title">{{$shop->name}}</h1>
            <div class="page-heading__desc">
              <p>{{$shop->location}}</p>
            </div>
          </div>
          <div class="shop-page__wr">
            <div class="shop-page__slider-block">
              <div class="shop-page__general-slider car-general-slider">
                <div
                  class="
                    shop-page__general-slider-inner
                    swiper
                    car-general-slider__slider
                  "
                  id="carGeneralSlider"
                >
                  <div class="swiper-wrapper">
                    <picture class="swiper-slide car-general-slider__slide"
                      ><img
                        class="car-general-slider__img"
                        src="{{$shop->picture_url}}"
                        alt="{{$shop->name}}" />
                  </div>
                </div>
              </div>
              <div
                class="swiper shop-page__thumbs-slider car-thambs-slider"
                id="carThumbsSlider"
                thumbsSlider=""
              >
                <div class="swiper-wrapper">
                  <picture class="swiper-slide car-thambs-slider__slide"
                    ><img
                      class="car-thambs-slider__img"
                      src="{{$shop->picture_url}}"
                      alt="{{$shop->name}}" />
                </div>
              </div>
            </div>
            <div class="shop-page__content">
              <div class="shop-page__desc">
                <div class="block-heading">
                  <h3 class="block-heading__title">Shop Description</h3>
                </div>
                <div class="shop-page__desc-content">
                  <p>{{$shop->description}}</p>
                </div>
              </div>
              <div class="shop-page__services">
                <div class="block-heading">
                  <h3 class="block-heading__title">Shop Services</h3>
                </div>
                @if(count($shop->services)>0)
                <ul class="shop-page__services-list list list--with-checks">
                    @foreach($shop->services as $service)
                    <li class="list__item">{{$service}}</li>
                    @endforeach
                </ul>
                @endif
              </div>
            </div>
            <div class="shop-page__contacts-and-partners">
              <div class="shop-page__contacts">
                <div class="block-heading">
                  <h3 class="block-heading__title">Contact Shop</h3>
                </div>
                <div class="shop-page__contact-items">
                  <a class="shop-page__contact-item link--dark" href="/">{{telephoneFormat($shop->telephone)}}</a><a class="shop-page__contact-item link--dark" href="/">{{$shop->email}}</a>
                </div>
              </div>
              <div class="shop-page__partners">
                <a class="shop-page__partner-item" href="/"
                  ><img
                    class="shop-page__partner-img"
                    src="/assets/pics/shop-partners/1.jpg" /></a
                ><a class="shop-page__partner-item" href="/"
                  ><img
                    class="shop-page__partner-img"
                    src="/assets/pics/shop-partners/2.jpg" /></a
                ><a class="shop-page__partner-item" href="/"
                  ><img
                    class="shop-page__partner-img"
                    src="/assets/pics/shop-partners/3.jpg"
                /></a>
              </div>
            </div>
            <div class="shop-page__location">
              <div class="block-heading">
                <h3 class="block-heading__title">Shop Location</h3>
                <div class="block-heading__desc">
                  <p>{{$shop->location}}</p>
                </div>
              </div>
              <div class="shop-page__map-wr">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2542.3602983443675!2d30.622062315882655!3d50.415758397744845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xab9afadef8cbbded!2zNTDCsDI0JzU2LjciTiAzMMKwMzcnMjcuMyJF!5e0!3m2!1sru!2sua!4v1638260756350!5m2!1sru!2sua"
                  style="border: 0"
                  allowfullscreen=""
                  loading="lazy"
                ></iframe>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('/assets/css/shopPage.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('/assets/js/shopPage.js') }}" type="text/javascript"></script>
@endsection