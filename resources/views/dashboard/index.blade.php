{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')


<!-- 
<div style="position: absolute; z-index: -99; width: 100%; height: 100%; opacity: 55%">

  <iframe frameborder="0" height="100%" width="100%"
    src="https://youtube.com/embed/A-j9zyGNBeQ?&autoplay=1&mute=1&loop=1&playsinline=1" 
      frameborder="0" 
      allow="accelerometer; loop; autoplay; encrypted-media; gyroscope" allowfullscreen
    >
  </iframe>
</div> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

  // 2. This code loads the IFrame Player API code asynchronously.
  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  // 3. This function creates an <iframe> (and YouTube player)
  //    after the API code downloads.
  var player;
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
      width: '100%',
      videoId: 'A-j9zyGNBeQ',
      playerVars: { 'autoplay': 1, 'playsinline': 1 },
      events: {
        'onReady': onPlayerReady
      }
    });
  }
  // https://youtu.be/A-j9zyGNBeQ
  // 4. The API will call this function when the video player is ready.
  function onPlayerReady(event) {
     event.target.mute();
    event.target.playVideo();
  }
</script>

<style>
/* Make the youtube video responsive */
  .iframe-container, .video-frame{
    position: relative;
    width: 100%;
    padding-bottom: 56.25%;
    height:0;    
  }
  .iframe-container iframe, .video-frame iframe{
    position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
    
  }
  .banner-text {
    position: absolute;
    left: 0px;
    right: 0px;
    top: 0px;
    z-index: 1;
    background: rgb(0 0 0 / 61%);
    height: 100%;
  }
</style>

  <main class="page-wrapper page-wrapper--home">

    <section class="video-frame">
      <!-- <iframe frameborder="0" height="100%" width="100%" src="https://youtube.com/embed/A-j9zyGNBeQ?&autoplay=1&mute=1&loop=1&playsinline=1" frameborder="0" allow="accelerometer; loop; autoplay; encrypted-media; gyroscope" allowfullscreen>
      </iframe> -->

      <video autoplay muted loop style="width:100%;">
        <source src="/assets/images/intro.mp4" type="video/mp4">
      </video>

      <div class="banner-text">
      <div class="container">
        
        <section class="search-vin-home">
          <div class="search-vin-home__search-side search-by-vin">
            <div class="search-by-vin__title page-heading">
              <h1 class="page-heading__title">
                <span>Every legend has a story</span>
                <h2>Log and share yours</h2>
              </h1>
              <!-- <h2>
                Search <span>legends</span>
              </h2> -->
            </div>
            <p class="search-by-vin__desc">
              You can pull basic information <span>for free</span>
            </p>
            <form class="search-by-vin__form">
              <input type="hidden" id="chkauth" value="@if(auth()->check()) chekc @else nochk @endif ">
              <div class="search-by-vin__input-controls">
                <span class="search-by-vin__controls-heading">Search by:</span>
                <div
                  class="search-by-vin__controls-items"
                  id="searchTypeSelectWrapper"
                >
                  <div
                    class="
                      search-by-vin__radio
                      custom-radio custom-radio--with-label
                    "
                  >
                    <div class="custom-radio__field-wr">
                      <input
                        class="custom-radio__field"
                        id="searchByVinRadio"
                        type="radio"
                        name="searchby"
                        checked
                      />
                      <div class="custom-radio__customize"></div>
                    </div>
                    <label class="custom-radio__label" for="searchByVinRadio"
                      >VIN</label
                    >
                  </div>
                  <div
                    class="
                      search-by-vin__radio
                      custom-radio custom-radio--with-label
                    "
                  >
                    <div class="custom-radio__field-wr">
                      <input
                        class="custom-radio__field"
                        id="searchByYearRadio"
                        type="radio"
                        name="searchby"
                      />
                      <div class="custom-radio__customize"></div>
                    </div>
                    <label class="custom-radio__label" for="searchByYearRadio"
                      >Year, make, model</label
                    >
                  </div>
                </div>
              </div>
              <div class="search-by-vin__search-type-wr">
                <div
                  class="
                    search-by-vin__search-type
                    search-by-vin__search-type--active
                    search-by-vin__input-wr
                    custom-input custom-input--with-btn custom-input--xxxl
                  "
                  id="searchByVin"
                >
                  <div class="custom-input__field-wr">
                    <input
                      class="custom-input__field"
                      id="vin"
                      name="vin"
                      type="text"
                      placeholder="Enter your VIN code"
                      require
                    />
                  </div>
                  <button class="custom-input__btn btnscroll" id="VinSearchButton" type="button">Search</button>
                </div>
                <div class="search-by-vin__search-type search-by-vin__year search-by-year" id="searchByYear">
                  <div class="search-by-year__selects-wr">
                    <select class="search-by-year__select" id="year" name="year">
                      <option value selected>Year</option>
                    </select>
                    <select class="search-by-year__select" id="make" name="make">
                      <option value selected>Make</option>
                    </select>
                    <select class="search-by-year__select" id="model" name="model">
                      <option value selected>Model</option>
                    </select>
                  </div>
                  <button class="search-by-year__search-btn btn btn--accent" id="SearchButton" type="button">Search</button>
                </div>
              </div>
              <div class="search-by-vin__preferences preferences-block" id="preferencesBlock">
                <div class="preferences-block__hiding-checks">
                  <div class="preferences-block__hiding-checks-inner">
                    <div class="preferences-block__check custom-check custom-check--with-label custom-check--md">
                      <div class="custom-check__field-wr">
                        <input class="custom-check__field" id="damageReport" type="checkbox" name="preferences" />
                        <div class="custom-check__customize">
                          <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                          </svg>
                        </div>
                      </div>
                      <label class="custom-check__label" for="damageReport">No Accidents or Damage Repoted</label>
                    </div>
                    <div
                      class="
                        preferences-block__check
                        custom-check custom-check--with-label custom-check--md
                      "
                    >
                      <div class="custom-check__field-wr">
                        <input
                          class="custom-check__field"
                          id="personalUse"
                          type="checkbox"
                          name="preferences"
                        />
                        <div class="custom-check__customize">
                          <svg
                            width="13"
                            height="14"
                            viewBox="0 0 13 14"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              d="M1 7.66667L7 12.3333L12.3333 1"
                              stroke="white"
                            />
                          </svg>
                        </div>
                      </div>
                      <label class="custom-check__label" for="personalUse"
                        >Personal Use</label
                      >
                    </div>
                    <div
                      class="
                        preferences-block__check
                        custom-check custom-check--with-label custom-check--md
                      "
                    >
                      <div class="custom-check__field-wr">
                        <input
                          class="custom-check__field"
                          id="serviceHistory"
                          type="checkbox"
                          name="preferences"
                        />
                        <div class="custom-check__customize">
                          <svg
                            width="13"
                            height="14"
                            viewBox="0 0 13 14"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              d="M1 7.66667L7 12.3333L12.3333 1"
                              stroke="white"
                            />
                          </svg>
                        </div>
                      </div>
                      <label class="custom-check__label" for="serviceHistory"
                        >Service History</label
                      >
                    </div>
                  </div>
                  <div class="preferences-block__control">
                    <button
                      class="preferences-block__hiding-btn btn btn--text-arrow"
                      id="togglePreferences"
                      type="button"
                    >
                      <span class="btn__name">Preferences</span
                      ><svg>
                        <use
                          xlink:href="/assets/svg/home-sprite.svg#preferencesArrow"
                        ></use>
                      </svg>
                    </button>
                    <div class="preferences-block__links">
                      <a
                        class="
                          preferences-block__link-item
                          link link--accent-underline
                        "
                        href="/"
                        >Example of a complete report</a
                      ><a
                        class="
                          preferences-block__link-item
                          link link--accent-underline
                        "
                        href="/"
                        >Where to find VIN</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          
        </section>

      </div>
      </div>
    </section>
   

    </main>

    <div class="search-vin-home__image-side">           
      <div class="container">
        <div class="found-results p-0" id="resultContainer"></div>
      </div>
    </div>

@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('/assets/css/home.css') }}" rel="stylesheet" type="text/css" />

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
$(document).ready(function(){
  $(document).on('click','.btnscroll',function(){
    $('html,body').animate({
     scrollTop: $("#resultContainer").offset().top},
     'slow');
})
})
  </script>
    <script src="{{ asset('/assets/js/home.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/js/frontmain.js') }}" type="text/javascript"></script>
@endsection