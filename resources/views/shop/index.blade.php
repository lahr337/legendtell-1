{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <main class="page-wrapper">
      <div class="container">
        <section class="network-shops page">
          <div class="page-heading network-shops__page-heading">
            <h1 class="page-heading__title">Network <span>Shops</span></h1>
          </div>
          <div class="network-shops__items">
            @if($shops->count()>0)
                @foreach($shops as $shop)
                <article class="network-shops__item network-shop-item">
                <a class="network-shop-item__link" href="{{route('shop.view',$shop->id)}}"
                    ><div class="network-shop-item__img-wr">
                    <picture class="network-shop-item__pic-t"
                        ><img
                        class="network-shop-item__img"
                        src="{{$shop->picture_url}}"
                        alt="{{$shop->name}}"
                    /></picture>
                    </div>
                    <div class="network-shop-item__content-wr">
                    <h4 class="network-shop-item__title">{{$shop->name}}</h4>
                    <address class="network-shop-item__address">{{$shop->location}}</address>
                    <!-- 1(504)287-4421 -->
                    <a class="network-shop-item__tel" href="tel://{{$shop->telephone}}"> {{telephoneFormat($shop->telephone)}}</a>
                    </div>
                </a>
                </article>
                @endforeach
            @endif
          </div>
        </section>
      </div>
    </main>
@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('/assets/css/networkShops.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('/assets/js/networkShops.js') }}" type="text/javascript"></script>
@endsection