{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<?php

use App\Models\Car;
use Illuminate\Support\Facades\Auth;

?>
<main class="page-wrapper">
  <div class="container">
    <section class="add-car page">
      <div class="page-heading add-car__heading">
        <h1 class="page-heading__title">My <span>cars</span></h1>
        <button class="add-car__add-heading-btn btn btn--accent" id="openAddCarModal" type="button">
          Add car
        </button>
      </div>
      <div class="add-car__grid">
        <div class="add-car__cars">
          @if(count($cars)>0)
          @foreach($cars as $car)
          <?php



          $cars_img = Car::where('vin', $car->vin)->where('user_id', '!=', Auth::user()->id)->latest('service_date')->first();
          // echo "<pre>"; print_r($cars_img->userData); die;
          ?>
          <a class="add-car__car-item added-car-item" href="{{route('car.view',$car->id)}}">
            <div class="added-car-item__img-wr">
              @if($car->media && $car->media->filename)
              <picture>
                <img class="added-car-item__img" src="{{$car->media->filename}}" loading="lazy" alt="alt" />
              </picture>
              @else
              @if($cars_img && $cars_img->userData)
              <picture>
                <img class="added-car-item__img" src="{{$cars_img->userData->shop_photo ? $cars_img->userData->shop_photo : asset('/no-image.png') }}" loading="lazy" alt="alt" />
              </picture>
              @else
              <picture>
                <img class="added-car-item__img" src="asset('/no-image.png')" loading="lazy" alt="alt" />
              </picture>
              @endif
              @endif
            </div>
            <h5 class="added-car-item__name">{{$car->vin}}</h5>

            <div class="added-car-item__arrow">
              <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 9L5 5L1 1" stroke="#272727" />
              </svg>
            </div>
          </a>
          @endforeach
          @else
          <div class="add-car__not-car-yeat not-car-yeat">
            <div class="not-car-yeat__icon-wr">
              <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.0204 10.2109C17.4413 9.81863 17.4645 9.1595 17.0722 8.73866C16.68 8.3178 16.0208 8.29461 15.6 8.68685L12.552 11.5277L9.71111 8.47967C9.31886 8.05882 8.65972 8.03564 8.23888 8.42787C7.81802 8.82011 7.79484 9.47925 8.18707 9.9001L11.0279 12.9481L7.97989 15.7891C7.55904 16.1812 7.53586 16.8404 7.9281 17.2612C8.32034 17.6821 8.97947 17.7053 9.40033 17.313L12.4483 14.4722L15.2893 17.5202C15.6815 17.941 16.3406 17.9643 16.7615 17.572C17.1823 17.1798 17.2055 16.5206 16.8132 16.0998L13.9724 13.0518L17.0204 10.2109Z" fill="#272727" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.04102 13C1.04102 6.67174 6.17109 1.54166 12.4993 1.54166C18.8276 1.54166 23.9577 6.67174 23.9577 13C23.9577 19.3282 18.8276 24.4583 12.4993 24.4583C6.17109 24.4583 1.04102 19.3282 1.04102 13ZM12.4993 22.375C7.32168 22.375 3.12435 18.1777 3.12435 13C3.12435 7.82233 7.32168 3.625 12.4993 3.625C17.6771 3.625 21.8743 7.82233 21.8743 13C21.8743 18.1777 17.6771 22.375 12.4993 22.375Z" fill="#272727" />
              </svg>
            </div>
            <span class="not-car-yeat__text">You haven't added a car yet</span>
          </div>
          @endif
        </div>
        <div class="add-car__adding-wr" id="carAddingWrapper">
          <div class="add-car__adding car-adding" id="carAddingModal">
            <button class="car-adding__close" id="carEddingClose" type="button">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.4099 12L17.7099 7.71C17.8982 7.5217 18.004 7.2663 18.004 7C18.004 6.7337 17.8982 6.47831 17.7099 6.29C17.5216 6.1017 17.2662 5.99591 16.9999 5.99591C16.7336 5.99591 16.4782 6.1017 16.2899 6.29L11.9999 10.59L7.70994 6.29C7.52164 6.1017 7.26624 5.99591 6.99994 5.99591C6.73364 5.99591 6.47824 6.1017 6.28994 6.29C6.10164 6.47831 5.99585 6.7337 5.99585 7C5.99585 7.2663 6.10164 7.5217 6.28994 7.71L10.5899 12L6.28994 16.29C6.19621 16.383 6.12182 16.4936 6.07105 16.6154C6.02028 16.7373 5.99414 16.868 5.99414 17C5.99414 17.132 6.02028 17.2627 6.07105 17.3846C6.12182 17.5064 6.19621 17.617 6.28994 17.71C6.3829 17.8037 6.4935 17.8781 6.61536 17.9289C6.73722 17.9797 6.86793 18.0058 6.99994 18.0058C7.13195 18.0058 7.26266 17.9797 7.38452 17.9289C7.50638 17.8781 7.61698 17.8037 7.70994 17.71L11.9999 13.41L16.2899 17.71C16.3829 17.8037 16.4935 17.8781 16.6154 17.9289C16.7372 17.9797 16.8679 18.0058 16.9999 18.0058C17.132 18.0058 17.2627 17.9797 17.3845 17.9289C17.5064 17.8781 17.617 17.8037 17.7099 17.71C17.8037 17.617 17.8781 17.5064 17.9288 17.3846C17.9796 17.2627 18.0057 17.132 18.0057 17C18.0057 16.868 17.9796 16.7373 17.9288 16.6154C17.8781 16.4936 17.8037 16.383 17.7099 16.29L13.4099 12Z" fill="#272727" />
              </svg>
            </button>

            <form id="carAddForm" method="POST" action="{{ route('car.add') }}">
              @csrf
              <div class="block-heading">
                <h4 class="block-heading__title">Add car</h4>
              </div>
              <div class="car-adding__by-win">
                <div class="
                        car-adding__field
                        custom-input
                        custom-input--with-label-above
                        custom-input--white-bg
                        custom-input--sm
                      ">
                  <label class="custom-input__label" for="vin">VIN</label>
                  <div class="custom-input__field-wr">
                    <input class="custom-input__field" id="vin" name="vin" type="text" placeholder="Enter VIN Code" />
                  </div>
                </div>
              </div>
              <!-- <span class="car-adding__or">OR</span> -->
              <!-- <div class="car-adding__by-license-and-state">
                    <div
                      class="
                        car-adding__field
                        custom-input
                        custom-input--with-label-above
                        custom-input--white-bg
                        custom-input--sm
                      "
                    >
                      <label class="custom-input__label" for="Year"
                        >Year</label
                      >
                      <div class="custom-input__field-wr">
                          <select class="custom-input__field" id="year" name="year">
                            <option value selected>Year</option>
                          </select>
                        </div>
                    </div>
                    <div
                      class="
                        car-adding__field
                        custom-input
                        custom-input--with-label-above
                        custom-input--white-bg
                        custom-input--sm
                      "
                    >
                      <label class="custom-input__label" for="make"
                        >Make</label
                      >
                      <div class="custom-input__field-wr">
                        <select class="custom-input__field" id="make" name="make">
                            <option value selected>Make</option>
                        </select>
                      </div>
                    </div>
                    <div class="car-adding__field custom-input custom-input--with-label-above custom-input--white-bg custom-input--sm">
                      <label class="custom-input__label" for="model">Model</label>
                      <div class="custom-input__field-wr">
                        <select class="custom-input__field" id="model" name="model">
                            <option value selected>Model</option>
                        </select>
                      </div>
                    </div>
                  </div> -->
              @if($errors->any())
              <h6 style="color:red">{{$errors->first()}}</h6>
              @endif
              <button class="car-adding__btn btn btn--accent" type="submit">
                Add Car
              </button>
            </form>

          </div>
        </div>
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