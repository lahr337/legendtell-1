{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <main class="page-wrapper">
      <div class="container">
        <section class="add-car page term-condition">
          <div class="page-heading add-car__heading">
            <h1 class="page-heading__title"><span>Terms and Condition</span></h1>
           
         
          </div>
        <div class="contentchk">
            <h3>BOOKING:</h3>
            <p>Bookings are deemed to be placed with Speed Car Wash booking portal. Bookings may also be made by calling the site phone and speaking to the supervisor. Payment is made using cash or Credit/Debit card (Subject to availability). Speed Car Wash reserves the right to cancel or restrict bookings subject to availability</p>

            <h3>PAYMENT:</h3>
            <p>You are required to make the payment for your car wash when you return to pick up your vehicle, at the price set out in our service menu.</p>
            <p>Any amount unpaid will result in us retaining your vehicle and not releasing it until you have made payment in full to us. Your vehicle will remain with us, at your risk, until any such late payment is received.</p>

            <h3>LIABILITY:</h3>
           <ul>
               <li>We will perform the services selected by you from our service menu with all reasonable skill and care.</li>
               <li>Whilst the Speed Car Wash shall take all reasonable steps to ensure that its servants or agents shall take reasonable care of the vehicle whilst in its custody (including without limitation where the vehicle is washed and cleaned), the company shall not be liable for:</li>
               <li>Where such liability is proved to arise, and only to the extent it is proven to arise, as a result of negligence, a criminal act or breach of statutory duty on the part of the company or its servants or agents.</li>
           </ul>

           
        </div>
        </section>
      </div>
    </main>
@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('/assets/css/addCar.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('/assets/js/addCar.js') }}" type="text/javascript"></script>
@endsection