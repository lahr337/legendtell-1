{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <main class="page-wrapper">
      <div class="container">
        <section class="reports-payment page">
          <div class="reports-payment__heading page-heading">
            <svg>
              <use
                xlink:href="/assets/svg/reportspayment-sprite.svg#check-in-circle"
              ></use>
            </svg>
            <h1 class="page-heading__title reports-payment__title">
              We found <span>12 history</span> on this vehicle
            </h1>
          </div>
          <div class="reports-payment__car-info reports-car">
            <div class="reports-car__img-side">
              <picture class="reports-car__picture"
                ><img
                  class="reports-car__img"
                  src="/assets/images/reports-payment-page/reports-car/reports-car.png"
                  alt="alt"
              /></picture>
            </div>
            <div class="reports-car__car-info-side">
              <ul class="reports-car__info-list">
                <li class="reports-car__info-item">
                  <span class="reports-car__info-title">MODEL:</span
                  ><span class="reports-car__info-val">{{$car->make}} {{$car->model}}</span>
                </li>
                <li class="reports-car__info-item">
                  <span class="reports-car__info-title">VIN:</span
                  ><span class="reports-car__info-val">{{$car->vin}}</span>
                </li>
              </ul>
            </div>
          </div>
          @include('payment.partials._select-package')
          @include('payment.partials._select-method')
        </section>
      </div>
    </main>
@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('/assets/css/reportsPayment.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('/assets/js/reportsPayment.js') }}" type="text/javascript"></script>
@endsection