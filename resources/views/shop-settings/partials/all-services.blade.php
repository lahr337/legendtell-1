@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
    <div class="account-settings__content-wr">
        <div class="account-settings__content-form">
            <div class="grid-view-shop">
                <div class="common-wrap">
                    <div class="cmn-content">
                          {{-- code start --}}
      <div class="block-heading">
        <h2 class="block-heading__title">SHOP/LOCATION TYPE</h2>
        <p>select the services your shop offers</p>
    </div>
    <div class="alert alert-danger myserviceerr" style="display:none">
       Please Select Services
      </div>
  <div class="manage-notifications__items-wr">
      <form id="SaveServicesForm" action="{{route('shop-settings.save-shop-service')}}" method="PUT" accept-charset="multipart/form-data">
      @csrf
      @method('put')
    
      {{-- {{count($allShopSerives)}} --}}
      @foreach($allShopSerives as $listshop)
      @if($listshop->service_id != 5)
      <div id="mm-{{$listshop->service_id}}" class="manage-notifications__item custom-check custom-check--with-label custom-check--with-label-xl @if (in_array($listshop->service_id, explode(',',auth()->user()->shop_services))) mychkcls @endif">
          <div class="custom-check__field-wr">
              <input class="custom-check__field notifications myallservices" id="{{$listshop->service_id}}" type="checkbox" value="{{$listshop->service_id}}" name="serviceCheck[]" @if (in_array($listshop->service_id, explode(',',auth()->user()->shop_services))) checked @endif/>
              <div class="custom-check__customize">
                  <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                  </svg>
              </div>
          </div>
          <label for="{{$listshop->service_id}}" class="custom-check__label"  >{{$listshop->service_name}}</label>
      </div>
      @endif
      @endforeach

   
</form>
<div class="text-center">
      <button class="settings-form__submit-btn btn btn--accent" id="SaveServicesnew" type="button">Save</button>
</div>
  </div>
  {{-- end code start --}}
                    </div>
                </div>
                    {{-- @include('shop-settings.partials.rightvinnumber') --}}
            </div>
        </div>
    </div>
</main>
@endsection
