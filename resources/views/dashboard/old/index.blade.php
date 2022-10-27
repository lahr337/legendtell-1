{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <main class="page-wrapper page-wrapper--home">
      <div class="container">
        <section class="search-vin-home">
          <div class="search-vin-home__search-side search-by-vin">
            <div class="search-by-vin__title page-heading">
              <h1 class="page-heading__title">
                Search for a vehicle by <span>VIN</span>
              </h1>
            </div>
            <p class="search-by-vin__desc">
              You can check for a report <span>for free</span>
            </p>
            <form class="search-by-vin__form">
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
                  <button class="custom-input__btn" id="VinSearchButton" type="button">Search</button>
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
          <div class="search-vin-home__image-side main-car-img">
            <picture
              ><img
                class="main-car-img__picture"
                src="/assets/images/home-page/main-car.png"
                alt="main car alt"
            /></picture>
          </div>
        </section>
        <div class="found-results" id="resultContainer"></div>
        <section class="home-check-vin">
          <div class="home-check-vin__side-general-info">
            <div class="home-check-vin__heading section-heading">
              <h2 class="section-heading__title">
                Run a <span>VIN</span> nubmer lookup before you buy a Used Car
              </h2>
              <div class="home-check-vin__desc section-heading__desc">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Feugiat dictum aenean tellus amet id convallis. Aliquet
                  commodo fermentum, fermentum vitae, eget consectetur
                  vestibulum in. Egestas mauris enim, vitae magna neque molestie
                  dignissim. Ultricies convallis pretium tortor lacus auctor sem
                  vitae pharetra, urna. Tempor, ut ante quis volutpat neque
                  congue aenean eget. Nisi pharetra quisque sollicitudin
                  elementum vitae duis.
                </p>
              </div>
            </div>
          </div>
          <div class="home-check-vin__side-advantages advantages-block">
            <article class="advantages-block__item">
              <svg>
                <use xlink:href="/assets/svg/home-sprite.svg#saveMoney"></use>
              </svg>
              <h4 class="advantages-block__item-title">Save Money</h4>
              <div class="advantages-block__item-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Feugiat
                dictum aenean tellus amet id convallis.
              </div>
            </article>
            <article class="advantages-block__item">
              <svg>
                <use xlink:href="/assets/svg/home-sprite.svg#saveWheels"></use>
              </svg>
              <h4 class="advantages-block__item-title">
                Stay safe on the wheels
              </h4>
              <div class="advantages-block__item-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Feugiat
                dictum aenean tellus amet id convallis.
              </div>
            </article>
            <article class="advantages-block__item">
              <svg>
                <use xlink:href="/assets/svg/home-sprite.svg#goodBargain"></use>
              </svg>
              <h4 class="advantages-block__item-title">Good vehicle bargin</h4>
              <div class="advantages-block__item-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Feugiat
                dictum aenean tellus amet id convallis.
              </div>
            </article>
          </div>
        </section>
        <section class="home-find-vin">
          <div class="home-find-vin__content-side section-heading">
            <h2 class="section-heading__title">
              How to find a <span>VIN</span> code?
            </h2>
            <div class="home-check-vin__desc section-heading__desc">
              <p>
                Depending on the vehicle, the VIN on your vehicle can be found
                in several parts. On most passenger cars, you can find the VIN
                on the interior of the driver’s side dashboard.
              </p>
              <p>
                If you can’t find the VIN on the vehicle, the easiest way is to
                use your vehicle’s title document or insurance documents (if
                any).
              </p>
            </div>
            <ul class="home-find-vin__list list list--with-checks">
              <li class="list__item">
                Interior of the driver’s side dashboard
              </li>
              <li class="list__item">Under the hood</li>
              <li class="list__item">Driver’s side door pillar</li>
              <li class="list__item">Front end of the frame over the wheels</li>
            </ul>
          </div>
          <div class="home-find-vin__visual-side search-vin-visual">
            <picture class="search-vin-visual__pictureT"
              ><img
                class="search-vin-visual__image"
                src="/assets/images/home-page/search-vin/car.png"
                alt="alt"
            /></picture>
            <div class="search-vin-visual__places">
              <div
                class="
                  search-vin-visual__show-place-item
                  search-vin-visual__show-place-item--front-end
                  show-place-item show-place-item--front-end
                "
              >
                <span class="show-place-item__desc">Front end of frame</span>
              </div>
              <div
                class="
                  search-vin-visual__show-place-item
                  search-vin-visual__show-place-item--door
                  show-place-item show-place-item--door
                "
              >
                <span class="show-place-item__desc"
                  >Driver’s side door pillar</span
                >
              </div>
              <div
                class="
                  search-vin-visual__show-place-item
                  search-vin-visual__show-place-item--under-hood
                  show-place-item show-place-item--under-hood
                "
              >
                <span class="show-place-item__desc">Under hood</span>
              </div>
              <div
                class="
                  search-vin-visual__show-place-item
                  search-vin-visual__show-place-item--interior
                  show-place-item show-place-item--interior
                "
              >
                <span class="show-place-item__desc"
                  >Driver’s side interior dash</span
                >
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('/assets/css/home.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('/assets/js/home.js') }}" type="text/javascript"></script>
@endsection