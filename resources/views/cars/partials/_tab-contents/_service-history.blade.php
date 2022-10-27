    <div class="content-tab content-tab--active" id="serviceHistory">
        <link href="{{ asset('/assets/css/web_service.css') }}" rel="stylesheet" type="text/css" />
      {{-- <section class="service-history"> --}}
        <section class="">
          @if(count($SelectServices)>0)
        <div class="account-settings__grid manclass">
          {{-- <div class="account-settings__nav-wr">
              <ul class="account-settings__nav-wr nav-tabs" id="settingsTabs">
                @foreach($SelectServices as $service)
                  <li class="nav-tabs__item">
                      <a class="nav-tabs__link nav-tabs-item nav-tabs-item--choose servicetab" href="#{{$service->service_page}}" data-tab="{{$service->service_page}}" id="{{$service->service_page}}">
                          <span class="nav-tabs-item__name">{{$service->service_name}}</span>
                      </a>
                  </li>
                  @endforeach
                 
              </ul>
          </div> --}}
          <div class="account-settings__content-wr ">
              <!-- Edit Profile -->
              @include('cars.partials._tab-contents.partial-services.ac-services')
              @include('cars.partials._tab-contents.partial-services.carwash-services')
          </div>
          </div>
        
      
        @else
        <span class="service-history__text">No service history are available at this time</span>
      @endif  </section>
    </div>


    <style>
      

.account-settings__grid {
    align-items: flex-start;
}

.account-settings__grid {
    align-items: flex-start;
}

.account-settings__grid {
    margin-top: 5rem;
    display: flex;
    justify-content: space-between;
}
.account-settings__content-wr {
    width: calc(100% - 27rem);
    display: flex;
}
.account-settings__content {
    opacity: 0;
    visibility: hidden;
    display: none;
}
.account-settings__content--active {
    opacity: 1;
    visibility: visible;
    display: block;
}
    </style>

