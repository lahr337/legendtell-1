{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @php($appraisal = $car->appraisal ?? new App\Models\CarAppraisal)
    <main class="page-wrapper">
    <div class="container container--page">
        <section class="venhicle-general-info">
            <div class="page-heading">
                <h1 class="page-heading__title">{{$car->title}}</h1>
            </div>
            <div class="venhicle-general-info__vin vin vin--md vin--title-accent">
                <span class="vin__title">VIN:</span
                ><span class="vin__number">{{$car->vin}}</span>
                <!-- SBM11AAA4CW001448 -->
            </div>
            <div class="venhicle-general-info__content-wrapper">
                <div class="venhicle-general-info__slider-wrapper">
                <div class="venhicle-general-info__general-slider car-general-slider">
                    <div class="undefined swiper car-general-slider__slider" id="carGeneralSlider">
                        <div class="swiper-wrapper">
                            @foreach($car->medias as $media)
                            <picture class="swiper-slide car-general-slider__slide">
                                <img class="car-general-slider__img" src="{{$media->url}}" alt="{{$media->filename}}" />
                            </picture>
                            @endforeach
                        </div>
                    </div>
                    <button class="swiper-button-prev car-general-slider__arrow car-general-slider__arrow--prev slider-button slider-button--md" id="carGeneralSliderPrev" type="button">
                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 1L1 5L5 9" stroke="#0077C6" />
                        </svg>
                    </button>
                    <button class="swiper-button-next car-general-slider__arrow car-general-slider__arrow--next slider-button slider-button--md" id="carGeneralSliderNext" type="button">
                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L1 9" stroke="#0077C6" />
                        </svg>
                    </button>
                </div>
                <div class="swiper venhicle-general-info__thumbs-slider car-thambs-slider" id="carThumbsSlider" thumbsSlider="">
                    <div class="swiper-wrapper">
                        @foreach($car->medias as $media)
                        <picture class="swiper-slide car-thambs-slider__slide">
                            <img class="car-thambs-slider__img" src="{{$media->url}}" alt="{{$media->filename}}" />
                        </picture>
                        @endforeach
                    </div>
                </div>
                </div>
                <div class="venhicle-general-info__general-info general-car-props">
                <div class="general-car-props__heading block-heading">
                    <h3 class="general-car-props__title block-heading__title">
                        Overall Rating
                    </h3>
                    <span class="general-car-props__accent">98%</span>
                </div>
                <div class="general-car-props__props-list list list--props">
                    <li class="list__item">
                        <span class="list__item-prop">Miles</span
                            ><span class="list__item-val">{{$appraisal->mileage}}</span>
                    </li>
                    <li class="list__item">
                        <span class="list__item-prop">Location</span
                            ><span class="list__item-val">{{$car->location}}</span>
                    </li>
                    <li class="list__item">
                        <span class="list__item-prop">Color</span
                            ><span class="list__item-val">{{$appraisal->color}}</span>
                    </li>
                    <li class="list__item">
                        <span class="list__item-prop">Status</span
                            ><span class="list__item-val">PRIVATE OWNER</span>
                    </li>
                    <li class="list__item">
                        <span class="list__item-prop">Drive</span
                            ><span class="list__item-val">{{$car->drive}}</span>
                    </li>
                    <li class="list__item">
                        <span class="list__item-prop">Engine</span
                            ><span class="list__item-val">{{$car->model_engine}}</span>
                    </li>
                </div>
                </div>
                <div class="venhicle-general-info__appraised-value appraised-value">
                <span class="appraised-value__title">Appraised value</span
                    ><span class="appraised-value__price">${{$appraisal->appraisal_value}}</span
                    ><a
                    class="appraised-value__btn btn btn--accent btn--full-width"
                    href="{{route('vehicle.appraisal',$car->id)}}"
                    >View Appraisal</a
                    ><a class="appraised-value__get-link link link--def" href="{{route('shop.get-appraisal')}}"
                    >Get Appraisal</a
                    >
                </div>
                <div class="venhicle-general-info__window-sticker window-sticker">
                    <span class="window-sticker__title">Window Sticker</span>
                    @foreach($car->stickers as $sticker)
                    <picture class="window-sticker__picture-wr">
                        <img class="window-sticker__picture" width="170" src="{{$sticker->url}}" alt="{{$sticker->filename}}" loading="lazy" />
                    </picture>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="car-advantages">
            <div class="car-advantages__item car-advantage-item">
                <picture class="car-advantage-item__picture-wr"
                ><img
                class="car-advantage-item__img"
                src="/assets/pics/car-advantages/windshieldprotection.png"
                alt="alt"
                loading="lazy" /></picture
                >
                <span class="car-advantage-item__name">Windshield Protection</span>
            </div>
            <div class="car-advantages__item car-advantage-item">
                <picture class="car-advantage-item__picture-wr"
                ><img
                class="car-advantage-item__img"
                src="/assets/pics/car-advantages/ceramiccoatingjustcar.png"
                alt="alt"
                loading="lazy" /></picture
                >
                <span class="car-advantage-item__name">Ceramic Coating</span>
            </div>
            <div class="car-advantages__item car-advantage-item">
                <picture class="car-advantage-item__picture-wr"
                ><img
                class="car-advantage-item__img"
                src="/assets/pics/car-advantages/ppffrontcap.png"
                alt="alt"
                loading="lazy" /></picture
                >
                <span class="car-advantage-item__name"
                >Paint<br />Protection Film</span
                >
            </div>
        </div>
        <section class="venhicle-status">
            <div class="section-heading">
                <h2 class="section-heading__title">Vehicle <span>Status</span></h2>
            </div>
            <div class="venhicle-status__content-wr">
                <div class="venhicle-status__sale">
                <div class="block-heading venhicle-status__sale-heading">
                    <h3 class="block-heading__title">For Sale</h3>
                    <span class="venhicle-status__sale-price">${{$appraisal->market_value}}</span>
                </div>
                @if($car->has_submited === false)
                <a class="venhicle-status__submit-offer btn btn--accent btn--regular btn--full-width" href="javascript:void(0)" data-url="{{route('sale.submit-offer', $car->id)}}" id="SubmitOffer">Submit Offer</a>
                @else
                <span class="venhicle-status__submit-offer btn btn--accent btn--regular btn--full-width">Submited Offer</span>
                @endif
                </div>
                <div class="venhicle-status__chart venhicle-chart">
                <div class="venhicle-chart__heading">
                    <div class="venhicle-chart__heding-icon-wr">
                        <svg>
                            <use
                            xlink:href="/assets/svg/chart-sprite.svg#odometr"
                            ></use>
                        </svg>
                    </div>
                    <span class="venhicle-chart__heading-title">20731.1 miles</span>
                </div>
                <div class="venhicle-chart__chart chart" id="chart"></div>
                <div class="venhicle-chart__info venhicle-chart-info">
                    <div class="venhicle-chart-info__item">
                        <div class="venhicle-chart-info__icon">
                            <svg>
                            <use
                                xlink:href="/assets/svg/chart-sprite.svg#distance"
                                ></use>
                            </svg>
                        </div>
                        <span class="venhicle-chart-info__val">2616.32 ft</span
                            ><span class="venhicle-chart-info__title">Distance (FT)</span>
                    </div>
                    <div class="venhicle-chart-info__item">
                        <div class="venhicle-chart-info__icon">
                            <svg>
                            <use
                                xlink:href="/assets/svg/chart-sprite.svg#speed"
                                ></use>
                            </svg>
                        </div>
                        <span class="venhicle-chart-info__val">17.68s</span
                            ><span class="venhicle-chart-info__title">60-130 MPH</span>
                    </div>
                    <div class="venhicle-chart-info__item">
                        <div class="venhicle-chart-info__icon">
                            <svg>
                            <use
                                xlink:href="/assets/svg/chart-sprite.svg#slope"
                                ></use>
                            </svg>
                        </div>
                        <span class="venhicle-chart-info__val">-0.20%</span
                            ><span class="venhicle-chart-info__title">SLOPE</span>
                    </div>
                </div>
                <button
                    class="venhicle-chart__data-log-btn btn btn--accent"
                    id="openDataLog"
                    type="button"
                    >
                Data Log
                </button>
                </div>
                <div class="venhicle-status__conditions venhicle-conditions">
                <div
                    class="
                    venhicle-conditions__item
                    condition-assessed-item condition-assessed-item--with-bg
                    "
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/conditions-sprite.svg#color"
                            ></use>
                    </svg>
                    <div
                        class="
                        condition-assessed-item__progress-bar
                        progress-bar progress-bar--md
                        "
                        >
                        <div class="progress-bar__value" style="width: 90%"></div>
                    </div>
                    <span class="condition-assessed-item__value">90%</span>
                </div>
                <div
                    class="
                    venhicle-conditions__item
                    condition-assessed-item condition-assessed-item--with-bg
                    "
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/conditions-sprite.svg#battery"
                            ></use>
                    </svg>
                    <div
                        class="
                        condition-assessed-item__progress-bar
                        progress-bar progress-bar--md
                        "
                        >
                        <div class="progress-bar__value" style="width: 100%"></div>
                    </div>
                    <span class="condition-assessed-item__value">100%</span>
                </div>
                <div
                    class="
                    venhicle-conditions__item
                    condition-assessed-item condition-assessed-item--with-bg
                    "
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/conditions-sprite.svg#engine"
                            ></use>
                    </svg>
                    <div
                        class="
                        condition-assessed-item__progress-bar
                        progress-bar progress-bar--md
                        "
                        >
                        <div class="progress-bar__value" style="width: 100%"></div>
                    </div>
                    <span class="condition-assessed-item__value">100%</span>
                </div>
                <div
                    class="
                    venhicle-conditions__item
                    condition-assessed-item condition-assessed-item--with-bg
                    "
                    >
                    <svg>
                        <use xlink:href="/assets/svg/conditions-sprite.svg#oil"></use>
                    </svg>
                    <div
                        class="
                        condition-assessed-item__progress-bar
                        progress-bar progress-bar--md
                        "
                        >
                        <div class="progress-bar__value" style="width: 100%"></div>
                    </div>
                    <span class="condition-assessed-item__value">100%</span>
                </div>
                <div
                    class="
                    venhicle-conditions__item
                    condition-assessed-item condition-assessed-item--with-bg
                    "
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/conditions-sprite.svg#air-conditioning"
                            ></use>
                    </svg>
                    <div
                        class="
                        condition-assessed-item__progress-bar
                        progress-bar progress-bar--md
                        "
                        >
                        <div class="progress-bar__value" style="width: 100%"></div>
                    </div>
                    <span class="condition-assessed-item__value">100%</span>
                </div>
                <div
                    class="
                    venhicle-conditions__item
                    condition-assessed-item condition-assessed-item--with-bg
                    "
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/conditions-sprite.svg#brakes"
                            ></use>
                    </svg>
                    <div
                        class="
                        condition-assessed-item__progress-bar
                        progress-bar progress-bar--md
                        "
                        >
                        <div class="progress-bar__value" style="width: 90%"></div>
                    </div>
                    <span class="condition-assessed-item__value">90%</span>
                </div>
                <div
                    class="
                    venhicle-conditions__item
                    condition-assessed-item condition-assessed-item--with-bg
                    "
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/conditions-sprite.svg#tires"
                            ></use>
                    </svg>
                    <div
                        class="
                        condition-assessed-item__progress-bar
                        progress-bar progress-bar--md
                        "
                        >
                        <div class="progress-bar__value" style="width: 100%"></div>
                    </div>
                    <span class="condition-assessed-item__value">100%</span>
                </div>
                <div
                    class="
                    venhicle-conditions__item
                    condition-assessed-item condition-assessed-item--with-bg
                    "
                    >
                    <svg>
                        <use xlink:href="/assets/svg/conditions-sprite.svg#wd"></use>
                    </svg>
                    <div
                        class="
                        condition-assessed-item__progress-bar
                        progress-bar progress-bar--md
                        "
                        >
                        <div class="progress-bar__value" style="width: 100%"></div>
                    </div>
                    <span class="condition-assessed-item__value">100%</span>
                </div>
                <div
                    class="
                    venhicle-conditions__item
                    condition-assessed-item condition-assessed-item--with-bg
                    "
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/conditions-sprite.svg#interior"
                            ></use>
                    </svg>
                    <div
                        class="
                        condition-assessed-item__progress-bar
                        progress-bar progress-bar--md
                        "
                        >
                        <div class="progress-bar__value" style="width: 20%"></div>
                    </div>
                    <span class="condition-assessed-item__value">20%</span>
                </div>
                <div
                    class="
                    venhicle-conditions__item
                    condition-assessed-item condition-assessed-item--with-bg
                    "
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/conditions-sprite.svg#undercarriage"
                            ></use>
                    </svg>
                    <div
                        class="
                        condition-assessed-item__progress-bar
                        progress-bar progress-bar--md
                        "
                        >
                        <div class="progress-bar__value" style="width: 50%"></div>
                    </div>
                    <span class="condition-assessed-item__value">50%</span>
                </div>
                <div
                    class="
                    venhicle-conditions__item
                    condition-assessed-item condition-assessed-item--with-bg
                    "
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/conditions-sprite.svg#transmission"
                            ></use>
                    </svg>
                    <div
                        class="
                        condition-assessed-item__progress-bar
                        progress-bar progress-bar--md
                        "
                        >
                        <div class="progress-bar__value" style="width: 100%"></div>
                    </div>
                    <span class="condition-assessed-item__value">100%</span>
                </div>
                <div
                    class="
                    venhicle-conditions__item
                    condition-assessed-item condition-assessed-item--with-bg
                    "
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/conditions-sprite.svg#steel"
                            ></use>
                    </svg>
                    <div
                        class="
                        condition-assessed-item__progress-bar
                        progress-bar progress-bar--md
                        "
                        >
                        <div class="progress-bar__value" style="width: 70%"></div>
                    </div>
                    <span class="condition-assessed-item__value">70%</span>
                </div>
                </div>
            </div>
        </section>
        <section class="car-history">
            <div class="car-history__heading section-heading section-heading--justify-between">
                <h2 class="section-heading__title">Car <span>history</span></h2>
                <ul class="car-history__heading-links section-heading__linsk list list--inline-elements">
                <li class="list__item">
                    <a
                        class="
                        link
                        link--with-icon
                        link--full-accent
                        link--accent-underline
                        "
                        href="/"
                        >
                        <span class="link__name">Download PDF</span
                            >
                        <svg
                            width="23"
                            height="23"
                            viewBox="0 0 23 23"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <g clip-path="url(#clip0_100_335)">
                            <path
                                d="M18.576 23H4.4253C4.3737 22.985 4.32334 22.9664 4.27175 22.955C3.37221 22.7564 2.72258 22.0796 2.6256 21.1946C2.58768 20.8544 2.61131 20.507 2.61006 20.1626C2.61006 19.6635 2.61006 19.1637 2.61006 18.6429C2.4273 18.6429 2.26629 18.6429 2.10528 18.6429C0.924135 18.6279 0.00843642 17.7531 0.0059498 16.6155C-0.000681185 13.928 -0.000681185 11.2406 0.0059498 8.55345C0.0059498 7.40327 0.925378 6.52849 2.11958 6.51349C2.27934 6.51349 2.43973 6.51349 2.61193 6.51349V6.23989C2.61193 4.87712 2.61193 3.51474 2.61193 2.15276C2.61131 0.855585 3.49406 0 4.8387 0C7.85621 0 10.8739 0 13.8919 0C14.9487 0 15.8439 0.352794 16.5724 1.09258C17.5285 2.06456 18.4838 3.03695 19.4383 4.00973C19.8992 4.47128 20.2088 5.05376 20.3285 5.6843C20.3801 5.9531 20.3906 6.22909 20.4192 6.51469H20.7469C22.1257 6.51469 23.0004 7.35827 23.0004 8.68785C23.0004 10.1678 23.0004 11.65 23.0004 13.1344C23.0004 14.3026 23.0078 15.4701 23.0004 16.6377C23.0004 17.1103 22.8264 17.5674 22.5093 17.9275C22.1923 18.2876 21.7529 18.5271 21.2697 18.6033C20.9905 18.6477 20.7027 18.6435 20.3962 18.6633V18.9033C20.3962 19.6071 20.4037 20.3108 20.3931 21.0146C20.3867 21.4255 20.2498 21.8245 20.0011 22.158C19.7523 22.4914 19.4035 22.7432 19.0019 22.8794C18.8595 22.9286 18.7165 22.961 18.576 23ZM11.501 17.2953H20.74C21.3474 17.2953 21.6016 17.0505 21.6016 16.4655V8.69985C21.6016 8.10946 21.353 7.86466 20.7456 7.86466H2.2495C1.65707 7.86466 1.3997 8.11246 1.3997 8.68305C1.3997 11.2722 1.3997 13.8616 1.3997 16.4511C1.3997 17.0565 1.64836 17.2977 2.27002 17.2977L11.501 17.2953ZM4.0063 6.49909H18.9826C19.028 5.8991 18.8539 5.38311 18.4231 4.94331C17.4633 3.95533 16.498 2.97155 15.5274 1.99197C15.3257 1.78323 15.0805 1.61802 14.8079 1.50717C14.5354 1.39632 14.2416 1.34234 13.9459 1.34878H4.78026C4.28294 1.34878 4.00692 1.62297 4.0063 2.10536C4.0063 3.44574 4.0063 4.78572 4.0063 6.12529V6.49909ZM4.0063 18.6519C4.0063 19.4091 4.0063 20.1416 4.0063 20.8718C4.0063 21.383 4.27921 21.6518 4.80451 21.6518H18.2043C18.7153 21.6518 18.9938 21.3818 18.9944 20.888C18.9944 20.207 18.9944 19.5261 18.9944 18.8481C18.9944 18.7839 18.9857 18.7197 18.9813 18.6543L4.0063 18.6519Z"
                                fill="#0077C6"
                                />
                            <path
                                d="M9.3125 12.535C9.3125 11.7424 9.3125 10.9498 9.3125 10.1566C9.3125 9.65864 9.58665 9.39224 10.0983 9.38984C10.5558 9.38984 11.0127 9.38384 11.4703 9.38984C12.593 9.40724 13.4365 9.89264 13.8804 10.8862C14.4623 12.19 14.4206 13.4842 13.5509 14.6776C13.0841 15.3195 12.4133 15.6567 11.594 15.6849C11.0966 15.7023 10.6024 15.7071 10.1064 15.7053C9.59411 15.7053 9.3212 15.4329 9.31934 14.935C9.31561 14.1346 9.31934 13.3342 9.31934 12.535H9.3125ZM10.7205 14.3458C10.9729 14.3458 11.1961 14.3458 11.4199 14.3458C11.9987 14.3536 12.3959 14.083 12.6234 13.5868C12.9479 12.8788 12.9287 12.1606 12.6203 11.4538C12.4537 11.0722 12.1528 10.8088 11.7171 10.762C11.3907 10.7272 11.0581 10.7554 10.7224 10.7554L10.7205 14.3458Z"
                                fill="#0077C6"
                                />
                            <path
                                d="M4.75783 13.6198C4.75783 14.149 4.75783 14.6272 4.75783 15.1059C4.75783 15.5523 4.48368 15.8511 4.07401 15.8583C3.66434 15.8655 3.36098 15.5541 3.35973 15.1089C3.35559 13.4482 3.35352 11.7872 3.35352 10.126C3.35352 9.67062 3.63637 9.39043 4.10323 9.39343C4.70686 9.39643 5.31795 9.36283 5.91287 9.43903C7.0188 9.58062 7.81389 10.561 7.74551 11.6098C7.67526 12.7198 6.78008 13.5748 5.64059 13.6198C5.35649 13.6276 5.07115 13.6198 4.75783 13.6198ZM4.76467 12.2728C5.06245 12.2728 5.33411 12.2836 5.60391 12.2698C5.79125 12.259 5.96869 12.1849 6.1051 12.0605C6.24151 11.9361 6.32817 11.7693 6.34989 11.5894C6.39155 11.2348 6.16651 10.8694 5.7904 10.7908C5.45844 10.7248 5.10658 10.7428 4.76778 10.7236L4.76467 12.2728Z"
                                fill="#0077C6"
                                />
                            <path
                                d="M17.4115 13.1734C17.4115 13.8238 17.4159 14.4435 17.4115 15.0633C17.4065 15.5739 16.9192 15.9033 16.4542 15.7149C16.1794 15.6033 16.019 15.3933 16.019 15.1053C16.0132 13.407 16.0132 11.7088 16.019 10.0108C16.017 9.9223 16.0337 9.83432 16.068 9.7522C16.1023 9.67008 16.1536 9.59555 16.2186 9.53311C16.2836 9.47067 16.3611 9.42163 16.4464 9.38895C16.5317 9.35628 16.6229 9.34066 16.7146 9.34304C17.4192 9.33744 18.1237 9.33744 18.8283 9.34304C19.2317 9.34304 19.5326 9.62323 19.5463 9.99282C19.5478 10.0829 19.5309 10.1723 19.4964 10.256C19.4619 10.3397 19.4106 10.416 19.3454 10.4805C19.2802 10.5449 19.2024 10.5962 19.1165 10.6315C19.0306 10.6667 18.9384 10.6852 18.845 10.6858C18.4497 10.6972 18.0543 10.6858 17.6589 10.6894H17.4215V11.8294C17.8311 11.8294 18.2296 11.824 18.6318 11.8294C19.034 11.8348 19.3243 12.076 19.366 12.4168C19.3804 12.5117 19.3732 12.6084 19.3449 12.7003C19.3166 12.7922 19.2678 12.8771 19.2021 12.949C19.1364 13.0209 19.0552 13.0781 18.9642 13.1166C18.8732 13.1552 18.7747 13.1741 18.6753 13.1722C18.2669 13.18 17.8572 13.1734 17.4115 13.1734Z"
                                fill="#0077C6"
                                />
                            </g>
                            <defs>
                            <clipPath id="clip0_100_335">
                                <rect width="23" height="23" fill="white" />
                            </clipPath>
                            </defs>
                        </svg>
                    </a>
                </li>
                <li class="list__item">
                    <a
                        class="
                        link
                        link--with-icon
                        link--full-accent
                        link--accent-underline
                        "
                        href="/"
                        >
                        <span class="link__name">Print</span
                            >
                        <svg
                            width="23"
                            height="23"
                            viewBox="0 0 23 23"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <g clip-path="url(#clip0_49_595)">
                            <path
                                d="M0 16.9967C0 13.5977 0 10.2112 0 6.81222C0.0116103 6.79963 0.0232206 6.78704 0.0232206 6.77445C0.150934 5.94358 0.835941 5.26378 1.78799 5.30155C2.50782 5.32673 3.22766 5.30155 3.9475 5.30155C4.02877 5.30155 4.09843 5.30155 4.19132 5.30155C4.19132 5.16307 4.19132 5.06236 4.19132 4.97424C4.19132 3.62722 4.19132 2.2802 4.19132 0.933185C4.19132 0.253381 4.43513 -0.0109863 5.06209 -0.0109863C9.34629 -0.0109863 13.6305 -0.0109863 17.9031 -0.0109863C18.5416 -0.0109863 18.7855 0.240793 18.7855 0.933185C18.7855 2.29279 18.7855 3.63981 18.7855 4.99941C18.7855 5.08754 18.7855 5.18825 18.7855 5.28896C19.6098 5.28896 20.4109 5.28896 21.2004 5.28896C22.3034 5.28896 22.9884 6.01912 22.9884 7.21507C22.9884 10.3371 22.9884 13.4466 22.9884 16.5687C22.9884 17.752 22.3034 18.4948 21.2004 18.4948C20.4806 18.4948 19.7607 18.4948 19.0409 18.4948C18.9596 18.4948 18.8783 18.4948 18.7855 18.4948C18.7855 18.6207 18.7855 18.7214 18.7855 18.8095C18.7855 19.8921 18.7855 20.9748 18.7855 22.0448C18.7855 22.7121 18.5416 22.9764 17.9263 22.9764C13.6305 22.9764 9.33468 22.9764 5.03887 22.9764C4.43513 22.9764 4.19132 22.7121 4.19132 22.0448C4.19132 20.9622 4.19132 19.8795 4.19132 18.8095C4.19132 18.7088 4.19132 18.6207 4.19132 18.4948C4.08682 18.4948 4.00555 18.4948 3.92428 18.4948C3.18122 18.4948 2.43816 18.4948 1.70671 18.4948C1.2423 18.4948 0.824331 18.3437 0.487632 17.9786C0.220596 17.7268 0.104493 17.3618 0 16.9967ZM4.19132 16.9967C4.19132 16.8582 4.19132 16.7701 4.19132 16.6694C4.19132 15.5867 4.19132 14.5167 4.19132 13.434C4.19132 12.7794 4.43513 12.5024 5.05048 12.5024C9.34629 12.5024 13.6421 12.5024 17.9379 12.5024C18.5416 12.5024 18.7971 12.7668 18.7971 13.434C18.7971 14.5167 18.7971 15.6119 18.7971 16.6945C18.7971 16.7827 18.8087 16.8834 18.8087 16.9841C19.6214 16.9841 20.4225 16.9841 21.212 16.9841C21.5487 16.9841 21.6068 16.9211 21.6068 16.5561C21.6068 13.4466 21.6068 10.3371 21.6068 7.22766C21.6068 6.86258 21.5487 6.79963 21.2236 6.79963C14.7451 6.79963 8.26653 6.79963 1.77638 6.79963C1.45129 6.79963 1.39324 6.86258 1.39324 7.20248C1.39324 8.73833 1.39324 10.2868 1.39324 11.8226C1.39324 13.3962 1.39324 14.9699 1.39324 16.5435C1.39324 16.896 1.45129 16.9589 1.78799 16.9589C2.00858 16.9589 2.21757 16.9589 2.43816 16.9589C3.01868 16.9967 3.58758 16.9967 4.19132 16.9967ZM17.4038 14.0383C13.4563 14.0383 9.53205 14.0383 5.60777 14.0383C5.60777 16.5309 5.60777 18.9983 5.60777 21.4658C9.54366 21.4658 13.4679 21.4658 17.4038 21.4658C17.4038 18.9857 17.4038 16.5183 17.4038 14.0383ZM5.59616 5.30155C9.54366 5.30155 13.4679 5.30155 17.3806 5.30155C17.3806 4.03006 17.3806 2.78376 17.3806 1.52487C13.4447 1.52487 9.52044 1.52487 5.59616 1.52487C5.59616 2.78376 5.59616 4.03006 5.59616 5.30155Z"
                                fill="#0077C6"
                                />
                            <path
                                d="M18.1002 10.7257C17.5545 10.7257 17.1133 10.2473 17.1133 9.66822C17.1133 9.07654 17.5777 8.58557 18.1118 8.58557C18.6574 8.59816 19.087 9.07654 19.087 9.66822C19.087 10.2599 18.6458 10.7257 18.1002 10.7257Z"
                                fill="#0077C6"
                                />
                            <path
                                d="M11.4942 17.0076C10.4493 17.0076 9.40436 17.0076 8.34783 17.0076C7.82536 17.0076 7.48866 16.4663 7.68604 15.9627C7.81375 15.6354 8.06918 15.4969 8.38266 15.4969C9.32309 15.4969 10.2635 15.4969 11.2156 15.4969C12.3418 15.4969 13.4564 15.4969 14.5826 15.4969C15.1282 15.4969 15.4649 15.9879 15.3024 16.5041C15.1979 16.8188 14.9425 17.0076 14.6058 17.0076C13.5841 17.0076 12.5391 17.0076 11.4942 17.0076Z"
                                fill="#0077C6"
                                />
                            <path
                                d="M11.5169 18.4931C12.5618 18.4931 13.5951 18.4931 14.6401 18.4931C15.1625 18.4931 15.4992 19.0092 15.3134 19.5002C15.2206 19.752 15.058 19.9156 14.8026 19.966C14.7097 19.9911 14.6052 19.9911 14.5123 19.9911C12.5038 19.9911 10.4836 19.9911 8.47499 19.9911C8.34728 19.9911 8.21957 19.9786 8.10346 19.9408C7.8016 19.8401 7.61583 19.4876 7.65066 19.1603C7.68549 18.8078 7.94092 18.5182 8.26601 18.4931C8.50982 18.4805 8.74203 18.4805 8.98584 18.4805C9.82179 18.4931 10.6693 18.4931 11.5169 18.4931Z"
                                fill="#0077C6"
                                />
                            </g>
                            <defs>
                            <clipPath id="clip0_49_595">
                                <rect width="23" height="23" fill="white" />
                            </clipPath>
                            </defs>
                        </svg>
                    </a>
                </li>
                </ul>
            </div>
            <div class="car-history__general-info general-history">
                <div class="general-history__header general-history-header">
                <div
                    class="general-history-header__item-reported accident-reported"
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/carhistory-sprite.svg#detailed"
                            ></use>
                    </svg>
                    <div class="accident-reported__content-wr">
                        <span class="accident-reported__desc"
                            >Accident reported: minor damage</span
                            >
                        <div class="accident-reported__stage stage stage--first">
                            <div class="stage__line stage__line--first"></div>
                            <div class="stage__line stage__line--second"></div>
                            <div class="stage__circle stage__circle--first">
                            <span class="stage__circle-name">Minor</span>
                            </div>
                            <div class="stage__circle stage__circle--second">
                            <span class="stage__circle-name">Moderate</span>
                            </div>
                            <div class="stage__circle stage__circle--third">
                            <span class="stage__circle-name">Severve</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="general-history-header__item">
                    <svg>
                        <use
                            xlink:href="/assets/svg/carhistory-sprite.svg#owners"
                            ></use>
                    </svg>
                    <span class="general-history-header__item-name"
                        >4 previous owners</span
                        >
                </div>
                <div class="general-history-header__item">
                    <svg>
                        <use
                            xlink:href="/assets/svg/carhistory-sprite.svg#service-records"
                            ></use>
                    </svg>
                    <span class="general-history-header__item-name"
                        >{{$car->services->count()}} service history records</span
                        >
                </div>
                <div class="general-history-header__item">
                    <svg>
                        <use
                            xlink:href="/assets/svg/carhistory-sprite.svg#personal-venhicle"
                            ></use>
                    </svg>
                    <span class="general-history-header__item-name"
                        >Personal vehicle</span
                        >
                </div>
                <div class="general-history-header__item">
                    <svg>
                        <use
                            xlink:href="/assets/svg/carhistory-sprite.svg#odometr"
                            ></use>
                    </svg>
                    <span class="general-history-header__item-name"
                        >116,000 last reported odometer reading</span
                        >
                </div>
                </div>
                <div class="general-history__content">
                <div class="swiper car-history-slider" id="carHistorySlider">
                    <div class="swiper-wrapper car-history-slider__wrapper">
                        @foreach($car->services as $service)
                        <div class="swiper-slide car-history-slider__slide">
                            <div class="car-history-slider__slider-inner car-history-item car-history-item--normal">
                                <div class="car-history-item__year">{{$service->date->format('Y')}}</div>
                                <ul class="car-history-item__list">
                                    <li class="car-history-item__list-item">
                                        Personal Owner
                                    </li>
                                    <li class="car-history-item__list-item">
                                        New Orleans, LA
                                    </li>
                                    <li class="car-history-item__list-item">
                                        11.501 mi/year
                                    </li>
                                    <li class="car-history-item__list-item">{{$service->odometer}} mi</li>
                                    @if(count($service->completed)>0)
                                        @foreach($service->completed as $completed)
                                        <li class="car-history-item__list-item car-history-item__list-item--with-icon car-history-item__list-item--warning">
                                            <span>{{$completed}}</span>
                                            <svg><use xlink:href="/assets/svg/carhistory-sprite.svg#warning"></use></svg>
                                        </li>
                                        @endforeach
                                    @else
                                    <li class="car-history-item__list-item car-history-item__list-item--with-icon">
                                        <span>No Issues reported</span>
                                        <svg><use xlink:href="/assets/svg/carhistory-sprite.svg#check"></use></svg>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button
                        class="
                        swiper-button-prev
                        car-history-slider__arrow car-history-slider__arrow--prev
                        slider-button slider-button--accent slider-button--xl
                        "
                        id="carHistorySliderPrev"
                        type="button"
                        >
                        <svg
                            width="6"
                            height="10"
                            viewBox="0 0 6 10"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <path d="M5 1L1 5L5 9" stroke="#0077C6" />
                        </svg>
                    </button
                        >
                    <button
                        class="
                        swiper-button-next
                        car-history-slider__arrow car-history-slider__arrow--next
                        slider-button slider-button--accent slider-button--xl
                        "
                        id="carHistorySliderNext"
                        type="button"
                        >
                        <svg
                            width="6"
                            height="10"
                            viewBox="0 0 6 10"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <path d="M1 1L5 5L1 9" stroke="#0077C6" />
                        </svg>
                    </button>
                </div>
                </div>
            </div>
            <div class="car-history__toggles" id="toggles">
                <div class="car-history__toggle toggle">
                <div
                    class="toggle__header block-heading block-heading--with-icon"
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/carhistory-sprite.svg#ownership"
                            ></use>
                    </svg>
                    <h3 class="block-heading__title">Ownership History</h3>
                    <div class="toggle__header-arrow">
                        <svg>
                            <use
                            xlink:href="/assets/svg/carhistory-sprite.svg#arrow-down"
                            ></use>
                        </svg>
                    </div>
                </div>
                <div class="toggle__content">
                    <div
                        class="toggle__content-inner toggle__content-inner--ownership"
                        >
                        <table>
                            <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#ownership"
                                        ></use>
                                    </svg>
                                    Owner 1
                                </th>
                                <th>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#ownership"
                                        ></use>
                                    </svg>
                                    Owner 2
                                </th>
                                <th>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#ownership"
                                        ></use>
                                    </svg>
                                    Owner 3
                                </th>
                                <th>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#ownership"
                                        ></use>
                                    </svg>
                                    Owner 4
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Year purchased</th>
                                <td>2012</td>
                                <td>2016</td>
                                <td>2018</td>
                                <td>2020</td>
                            </tr>
                            <tr>
                                <th>Type of owner</th>
                                <td>Personal</td>
                                <td>Personal</td>
                                <td>Personal</td>
                                <td>Personal</td>
                            </tr>
                            <tr>
                                <th>Estimated lenght of ownership</th>
                                <td>4 yr. 2 mo.</td>
                                <td>2 yr. 3 mo.</td>
                                <td>1 yr. 10 mo.</td>
                                <td>1 yr. 6 mo.</td>
                            </tr>
                            <tr>
                                <th>Owned in the following states/provinces</th>
                                <td>New Orleans, LA</td>
                                <td>New Orleans, LA</td>
                                <td>New Orleans, LA</td>
                                <td>New Orleans, LA</td>
                            </tr>
                            <tr>
                                <th>Estimated miles driven per year</th>
                                <td>11.501 mi/year</td>
                                <td>5.501 mi/year</td>
                                <td>4.501 mi/year</td>
                                <td>6.501 mi/year</td>
                            </tr>
                            <tr>
                                <th>Last reported odometer reading</th>
                                <td>32.501 mi</td>
                                <td>68.501 mi</td>
                                <td>82.501 mi</td>
                                <td>112.501 mi</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <div class="car-history__toggle toggle">
                <div
                    class="toggle__header block-heading block-heading--with-icon"
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/carhistory-sprite.svg#additional"
                            ></use>
                    </svg>
                    <h3 class="block-heading__title">Additional History</h3>
                    <div class="toggle__header-arrow">
                        <svg>
                            <use
                            xlink:href="/assets/svg/carhistory-sprite.svg#arrow-down"
                            ></use>
                        </svg>
                    </div>
                </div>
                <div class="toggle__content">
                    <div
                        class="
                        toggle__content-inner toggle__content-inner--additional
                        "
                        >
                        <table>
                            <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#ownership"
                                        ></use>
                                    </svg
                                        >
                                    Owner 1
                                </th>
                                <th>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#ownership"
                                        ></use>
                                    </svg
                                        >
                                    Owner 2
                                </th>
                                <th>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#ownership"
                                        ></use>
                                    </svg
                                        >
                                    Owner 3
                                </th>
                                <th>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#ownership"
                                        ></use>
                                    </svg
                                        >
                                    Owner 4
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>
                                    <span>Total Loss</span
                                        ><span>No total loss reported </span>
                                </th>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <span>Structural Damage</span
                                        ><span
                                        >Recomended to inspect by a collision repair
                                    specialist</span
                                        >
                                </th>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <span>Airbag Deployment</span
                                        ><span>Airbag deployment reported: 06/24/2018</span>
                                </th>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#warning"
                                        ></use>
                                    </svg
                                        >
                                    <span class="warning">Airbag Deployment</span>
                                </td>
                                <td><span>No Issues reported </span></td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <span>Odometer Check</span
                                        ><span>DMV title problems reported</span>
                                </th>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span class="warning">Airbag Deployment</span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#warning"
                                        ></use>
                                    </svg
                                        >
                                    <span>Odometer problem</span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <span>DMV title problems reported.</span
                                        ><span>Accident reported: 06/24/2016</span>
                                </th>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span class="warning">Airbag Deployment</span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#warning"
                                        ></use>
                                    </svg
                                        >
                                    <span>Severe damage</span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <span>Manufacturer Recall</span
                                        ><span>No open recall reported</span>
                                </th>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported</span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported</span>
                                </td>
                                <td>
                                    <svg>
                                        <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#check"
                                        ></use>
                                    </svg
                                        >
                                    <span>No Issues reported </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <div class="car-history__toggle toggle">
                <div
                    class="toggle__header block-heading block-heading--with-icon"
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/carhistory-sprite.svg#detailed"
                            ></use>
                    </svg>
                    <h3 class="block-heading__title">Detailed History</h3>
                    <div class="toggle__header-arrow">
                        <svg>
                            <use
                            xlink:href="/assets/svg/carhistory-sprite.svg#arrow-down"
                            ></use>
                        </svg>
                    </div>
                </div>
                <div class="toggle__content">
                    <div class="toggle__content-inner">
                        <div class="detailed-history-block toggle__deteiled-history">
                            <div class="detailed-history-block__heading">
                            <div
                                class="
                                detailed-history-block__title--general
                                block-heading block-heading--with-icon
                                "
                                >
                                <svg>
                                    <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#ownership"
                                        ></use>
                                </svg>
                                <h3 class="block-heading__title">Owner 1</h3>
                            </div>
                            <div class="detailed-history-block__title--regular">
                                Purchased: 10/10/2012
                            </div>
                            <div class="detailed-history-block__title--regular">
                                Personal vehicle
                            </div>
                            <div class="detailed-history-block__title--regular">
                                11.501 mi/year
                            </div>
                            </div>
                            <table class="detailed-history-block__table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Mileage</th>
                                    <th>Source</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>03/11/2012</td>
                                    <td>845.5 mi</td>
                                    <td>
                                        <a
                                        class="
                                        link link--full-accent link--accent-underline
                                        "
                                        href="/"
                                        >New Orleans,</a
                                        ><a
                                        class="
                                        link link--full-accent link--accent-underline
                                        "
                                        href="/"
                                        >Motor Vehicle Dept.</a
                                        >
                                    </td>
                                    <td>
                                        <svg>
                                        <use
                                            xlink:href="/assets/svg/carhistory-sprite.svg#service"
                                            ></use>
                                        </svg>
                                        <div>
                                        <span>Vehicle serviced</span>
                                        <ul>
                                            <li>First owner reported</li>
                                            <li>
                                                Titled or registered as personal vehicle
                                            </li>
                                            <li>Loan or lien reported</li>
                                        </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>03/11/2012</td>
                                    <td>845.5 mi</td>
                                    <td>
                                        <a
                                        class="
                                        link link--full-accent link--accent-underline
                                        "
                                        href="/"
                                        >New Orleans,</a
                                        ><a
                                        class="
                                        link link--full-accent link--accent-underline
                                        "
                                        href="/"
                                        >Motor Vehicle Dept.</a
                                        >
                                    </td>
                                    <td>
                                        <svg>
                                        <use
                                            xlink:href="/assets/svg/carhistory-sprite.svg#service"
                                            ></use>
                                        </svg>
                                        <div>
                                        <span>Vehicle serviced</span>
                                        <ul>
                                            <li>First owner reported</li>
                                            <li>
                                                Titled or registered as personal vehicle
                                            </li>
                                            <li>Loan or lien reported</li>
                                        </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>03/11/2012</td>
                                    <td>845.5 mi</td>
                                    <td>
                                        <a
                                        class="
                                        link link--full-accent link--accent-underline
                                        "
                                        href="/"
                                        >New Orleans,</a
                                        ><a
                                        class="
                                        link link--full-accent link--accent-underline
                                        "
                                        href="/"
                                        >Motor Vehicle Dept.</a
                                        >
                                    </td>
                                    <td>
                                        <svg>
                                        <use
                                            xlink:href="/assets/svg/carhistory-sprite.svg#service"
                                            ></use>
                                        </svg>
                                        <div>
                                        <span>Vehicle serviced</span>
                                        <ul>
                                            <li>First owner reported</li>
                                            <li>
                                                Titled or registered as personal vehicle
                                            </li>
                                            <li>Loan or lien reported</li>
                                        </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        <div class="detailed-history-block toggle__deteiled-history">
                            <div class="detailed-history-block__heading">
                            <div
                                class="
                                detailed-history-block__title--general
                                block-heading block-heading--with-icon
                                "
                                >
                                <svg>
                                    <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#ownership"
                                        ></use>
                                </svg>
                                <h3 class="block-heading__title">Owner 2</h3>
                            </div>
                            <div class="detailed-history-block__title--regular">
                                Purchased: 10/10/2016
                            </div>
                            <div class="detailed-history-block__title--regular">
                                Personal vehicle
                            </div>
                            <div class="detailed-history-block__title--regular">
                                5.501 mi/year
                            </div>
                            </div>
                            <table class="detailed-history-block__table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Mileage</th>
                                    <th>Source</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>03/11/2012</td>
                                    <td>845.5 mi</td>
                                    <td>
                                        <a
                                        class="
                                        link link--full-accent link--accent-underline
                                        "
                                        href="/"
                                        >New Orleans,</a
                                        ><a
                                        class="
                                        link link--full-accent link--accent-underline
                                        "
                                        href="/"
                                        >Motor Vehicle Dept.</a
                                        >
                                    </td>
                                    <td>
                                        <svg>
                                        <use
                                            xlink:href="/assets/svg/carhistory-sprite.svg#service"
                                            ></use>
                                        </svg>
                                        <div>
                                        <span>Vehicle serviced</span>
                                        <ul>
                                            <li>First owner reported</li>
                                            <li>
                                                Titled or registered as personal vehicle
                                            </li>
                                            <li>Loan or lien reported</li>
                                        </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>03/11/2012</td>
                                    <td>845.5 mi</td>
                                    <td>
                                        <a
                                        class="
                                        link link--full-accent link--accent-underline
                                        "
                                        href="/"
                                        >New Orleans,</a
                                        ><a
                                        class="
                                        link link--full-accent link--accent-underline
                                        "
                                        href="/"
                                        >Motor Vehicle Dept.</a
                                        >
                                    </td>
                                    <td>
                                        <svg>
                                        <use
                                            xlink:href="/assets/svg/carhistory-sprite.svg#service"
                                            ></use>
                                        </svg>
                                        <div>
                                        <span>Vehicle serviced</span>
                                        <ul>
                                            <li>First owner reported</li>
                                            <li>
                                                Titled or registered as personal vehicle
                                            </li>
                                            <li>Loan or lien reported</li>
                                        </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>03/11/2012</td>
                                    <td>845.5 mi</td>
                                    <td>
                                        <a
                                        class="
                                        link link--full-accent link--accent-underline
                                        "
                                        href="/"
                                        >New Orleans,</a
                                        ><a
                                        class="
                                        link link--full-accent link--accent-underline
                                        "
                                        href="/"
                                        >Motor Vehicle Dept.</a
                                        >
                                    </td>
                                    <td>
                                        <svg>
                                        <use
                                            xlink:href="/assets/svg/carhistory-sprite.svg#danger"
                                            ></use>
                                        </svg>
                                        <div>
                                        <span>Accident reported: moderate damage</span>
                                        <ul>
                                            <li>
                                                Involving front or side impact with another
                                                motor vehicle
                                            </li>
                                            <li>Damage to front</li>
                                            <li>Damage to right side</li>
                                            <li>Damage to right front</li>
                                            <li>Airbag deployed</li>
                                        </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                            <div class="detailed-history-block__visual">
                            <div
                                class="
                                detailed-history-block__visual-demage
                                visual-demage
                                visual-demage--front-right
                                visual-demage--right-front
                                "
                                >
                                <span class="visual-demage__side-name">Right</span
                                    ><span class="visual-demage__side-name">Rear</span
                                    ><span class="visual-demage__side-name">Left</span
                                    ><span class="visual-demage__side-name">Front</span
                                    >
                                <svg
                                    width="279"
                                    height="140"
                                    viewBox="0 0 279 140"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    >
                                    <g clip-path="url(#clip0_49_1669)">
                                        <path
                                        d="M0 54.2813C1.0878 49.1686 1.84926 44.0015 3.37218 38.9976C7.72339 24.9106 17.296 16.045 31.6006 12.5641C34.9728 11.7482 38.5625 11.5307 42.0979 11.4763C60.2642 11.2043 78.4848 11.0412 96.6511 10.9324C98.3372 10.9324 99.1531 10.2797 100.078 8.97434C101.709 6.68995 103.45 4.51435 105.462 2.55631C107.964 0.163145 111.173 -0.326366 115.253 0.163145C113.784 3.80728 112.37 7.12507 110.901 10.6604C111.554 10.7148 112.261 10.8236 112.914 10.8236C121.235 10.8236 129.557 10.9324 137.879 10.7692C142.502 10.6604 147.234 9.1919 151.748 9.79019C167.793 11.9114 183.838 10.3341 199.883 10.6604C215.276 10.9868 230.614 10.6604 246.006 11.0412C250.521 11.1499 255.198 12.0746 259.495 13.4343C266.946 15.8275 270.427 22.2455 272.331 29.153C274.452 36.9308 276.247 44.9806 277.009 52.9759C278.477 68.8578 278.531 84.7941 275.159 100.513C274.126 105.462 272.657 110.303 270.808 115.035C267.49 123.683 260.8 128.197 251.663 128.578C240.078 129.013 228.493 129.013 216.908 129.068C197.545 129.176 178.182 129.068 158.873 129.231C153.706 129.285 148.376 130.862 143.372 130.101C133.473 128.524 123.574 129.666 113.675 129.176C112.805 129.122 111.88 129.176 110.793 129.176C112.261 132.766 113.675 136.084 115.144 139.728C109.324 140.707 104.918 138.749 102.525 134.507C99.8058 129.72 96.216 129.013 91.2665 129.122C75.711 129.394 60.1554 129.394 44.5998 128.959C38.4538 128.796 32.0357 128.034 26.216 126.022C14.3046 121.942 7.01632 112.859 3.2634 101.002C1.84926 96.2704 1.0878 91.2121 0 86.317C0 75.6022 0 64.9417 0 54.2813ZM164.53 70.0544C164.53 65.812 164.149 61.5151 164.639 57.3271C165.183 52.2144 163.333 48.5159 159.58 45.3613C157.786 43.8384 155.882 43.0769 153.543 42.8049C149.409 42.3698 145.221 41.9347 141.305 40.7381C134.507 38.6713 127.98 35.5167 121.127 33.7762C105.68 29.8057 90.0155 26.4335 74.5144 22.735C72.5563 22.2455 71.7949 23.3333 71.3054 24.7475C68.8578 32.0901 65.8664 39.324 64.1803 46.8842C61.1344 60.4273 61.1888 74.2968 63.31 87.8943C64.7242 96.8687 68.2051 105.571 70.8702 114.382C71.4685 116.395 72.6651 117.863 75.2758 117.265C95.7265 112.805 116.286 108.78 135.921 101.111C140.653 99.2618 145.82 97.9021 150.824 97.7389C156.208 97.5757 159.744 95.4545 162.844 91.4841C163.986 90.0699 164.693 88.8189 164.639 86.9153C164.476 81.2587 164.53 75.6566 164.53 70.0544ZM235.291 105.462C241.492 108.127 247.366 110.684 253.24 113.186C255.361 114.056 256.993 113.403 258.081 111.5C261.834 104.864 265.695 98.1196 266.511 90.505C267.599 80.6604 268.089 70.7071 268.034 60.8081C267.98 49.2774 264.227 38.6713 258.298 28.7723C257.319 27.1406 256.014 25.944 254.11 26.7055C247.855 29.2074 241.709 31.9269 235.346 34.5921C247.42 58.3605 247.475 81.7482 235.291 105.462ZM110.031 16.1538C111.772 18.7102 112.914 20.7226 114.382 22.5175C115.144 23.4421 116.395 24.5299 117.483 24.6387C132.005 26.0528 146.581 27.3582 161.103 28.6635C161.756 28.7179 162.409 28.446 163.442 28.2828C161.375 24.8562 159.417 21.8104 157.622 18.7102C156.752 17.1328 155.664 16.6977 153.924 16.6977C141.577 16.5889 129.176 16.3714 116.83 16.2082C114.817 16.1538 112.751 16.1538 110.031 16.1538ZM163.551 111.772C161.375 111.663 159.961 111.391 158.547 111.5C145.929 112.587 133.364 114.002 120.746 114.709C114.382 115.035 113.131 119.984 109.759 124.118C125.369 123.792 140.163 123.52 155.012 123.139C155.719 123.139 156.643 122.65 157.024 122.106C159.145 118.842 161.158 115.579 163.551 111.772ZM169.588 17.1872C171.111 20.5594 172.525 23.4965 173.776 26.4879C174.483 28.2284 175.571 28.8267 177.529 28.7723C187.7 28.3372 197.925 28.0652 208.096 27.6845C213.916 27.467 214.134 27.0862 213.263 21.3209C212.937 19.1453 212.121 18.1119 209.728 18.0575C197.164 17.7855 184.654 17.296 172.145 16.9697C171.437 16.9153 170.785 17.0785 169.588 17.1872ZM169.534 122.976C171.383 122.976 172.688 123.03 174.048 122.976C185.253 122.704 196.457 122.432 207.607 122.051C212.72 121.888 212.828 123.302 213.481 116.612C213.807 112.968 213.753 112.696 210.054 112.533C198.85 112.043 187.7 111.663 176.496 111.391C175.68 111.391 174.538 112.207 174.157 112.914C172.58 115.96 171.274 119.169 169.534 122.976ZM6.25486 42.1523C9.40948 42.805 11.0412 41.4996 12.7817 39.8679C15.7187 37.0396 18.7646 34.1025 22.1368 31.8725C28.1197 27.8477 34.4289 24.3123 40.6294 20.5594C41.7716 19.8523 42.805 18.8733 44.0559 17.8943C37.6379 14.7397 24.3667 16.1538 18.819 20.9401C12.4553 26.4879 6.63559 32.634 6.25486 42.1523ZM43.5664 122.758C43.6208 122.486 43.6752 122.214 43.784 121.942C43.1313 121.399 42.4786 120.855 41.7716 120.365C37.1484 117.428 32.4709 114.491 27.7933 111.554C21.9736 107.964 15.6643 105.027 11.7483 98.9899C11.5851 98.7179 11.2587 98.3372 10.9324 98.2828C9.73582 97.9565 8.43046 97.3582 7.34266 97.6845C6.79876 97.8477 6.41803 99.697 6.47242 100.73C6.5812 102.199 6.90754 103.831 7.669 105.082C9.51826 108.182 11.3675 111.336 13.7063 114.056C18.7646 119.984 24.8019 124.064 33.1235 123.411C35.7343 123.193 38.345 123.302 40.9557 123.193C41.8803 123.248 42.6962 122.922 43.5664 122.758ZM246.224 16.9153C247.148 17.3504 247.91 17.7311 248.726 18.0575C253.403 20.0699 257.483 22.8438 260.42 26.9774C262.541 29.9689 264.172 33.3411 266.131 36.4413C266.946 37.8011 267.98 38.9976 268.959 40.303C269.176 40.1942 269.394 40.0311 269.612 39.9223C269.503 38.9433 269.557 37.9098 269.231 37.0396C267.49 32.0901 265.967 27.0862 263.846 22.2999C260.963 15.9363 251.772 13.1624 246.224 16.9153ZM269.666 100.132C269.34 99.9689 269.013 99.8601 268.632 99.697C265.695 104.375 262.867 109.215 259.713 113.784C256.449 118.462 251.336 120.8 245.952 123.248C253.838 126.838 262.051 123.357 264.608 115.851C265.75 112.424 267.11 109.106 268.252 105.68C268.85 103.885 269.231 101.981 269.666 100.132ZM237.086 22.5175C237.032 22.1367 237.032 21.8104 236.977 21.4297C233.225 20.9401 229.526 20.3962 225.773 20.0699C223.38 19.8523 223.054 21.8104 223.054 23.6053C223.054 25.5633 224.685 25.3457 225.828 25.1282C229.58 24.3667 233.333 23.3877 237.086 22.5175ZM236.869 118.679C236.977 118.298 237.032 117.863 237.141 117.483C233.279 116.667 229.417 115.688 225.501 115.035C224.74 114.926 223.108 116.014 223.108 116.503C223.108 117.972 223.108 120.093 225.501 119.876C229.308 119.658 233.116 119.114 236.869 118.679Z"
                                        fill="#333333"
                                        />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_49_1669">
                                        <rect width="278.042" height="140" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div class="visual-demage__demaged">
                                    <div
                                        class="
                                        visual-demage__demaged-side
                                        visual-demage__demaged-side--front-left
                                        "
                                        ></div>
                                    <div
                                        class="
                                        visual-demage__demaged-side
                                        visual-demage__demaged-side--front-right
                                        "
                                        ></div>
                                    <div
                                        class="
                                        visual-demage__demaged-side
                                        visual-demage__demaged-side--right-front
                                        "
                                        ></div>
                                    <div
                                        class="
                                        visual-demage__demaged-side
                                        visual-demage__demaged-side--right-rear
                                        "
                                        ></div>
                                    <div
                                        class="
                                        visual-demage__demaged-side
                                        visual-demage__demaged-side--rear-right
                                        "
                                        ></div>
                                    <div
                                        class="
                                        visual-demage__demaged-side
                                        visual-demage__demaged-side--rear-left
                                        "
                                        ></div>
                                    <div
                                        class="
                                        visual-demage__demaged-side
                                        visual-demage__demaged-side--left-rear
                                        "
                                        ></div>
                                    <div
                                        class="
                                        visual-demage__demaged-side
                                        visual-demage__demaged-side--left-front
                                        "
                                        ></div>
                                </div>
                            </div>
                            <div
                                class="detailed-history-block__scale accident-reported"
                                >
                                <svg>
                                    <use
                                        xlink:href="/assets/svg/carhistory-sprite.svg#detailed"
                                        ></use>
                                </svg>
                                <div class="accident-reported__content-wr">
                                    <span class="accident-reported__desc"
                                        >Accident reported: minor damage</span
                                        >
                                    <div
                                        class="accident-reported__stage stage stage--second"
                                        >
                                        <div class="stage__line stage__line--first"></div>
                                        <div class="stage__line stage__line--second"></div>
                                        <div class="stage__circle stage__circle--first">
                                        <span class="stage__circle-name">Minor</span>
                                        </div>
                                        <div class="stage__circle stage__circle--second">
                                        <span class="stage__circle-name">Moderate</span>
                                        </div>
                                        <div class="stage__circle stage__circle--third">
                                        <span class="stage__circle-name">Severve</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="car-history__toggle toggle">
                <div
                    class="toggle__header block-heading block-heading--with-icon"
                    >
                    <svg>
                        <use
                            xlink:href="/assets/svg/carhistory-sprite.svg#fuel"
                            ></use>
                    </svg>
                    <h3 class="block-heading__title">Fuel History</h3>
                    <div class="toggle__header-arrow">
                        <svg>
                            <use
                            xlink:href="/assets/svg/carhistory-sprite.svg#arrow-down"
                            ></use>
                        </svg>
                    </div>
                </div>
                <div class="toggle__content">
                    <div class="toggle__content-inner toggle__content-inner--fuel">
                        <table>
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Gallons</th>
                                <th>Amount</th>
                                <th>Grade</th>
                                <th>Image</th>
                                <th>Location</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>03/17/2021</td>
                                <td>11.9</td>
                                <td>$34.67</td>
                                <td>93</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>03/17/2021</td>
                                <td>11.9</td>
                                <td>$34.67</td>
                                <td>93</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>03/17/2021</td>
                                <td>11.9</td>
                                <td>$34.67</td>
                                <td>93</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>03/17/2021</td>
                                <td>11.9</td>
                                <td>$34.67</td>
                                <td>93</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>03/17/2021</td>
                                <td>11.9</td>
                                <td>$34.67</td>
                                <td>93</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <div class="modal modal--venhicle-video" id="venhicleModal">
            <div class="modal__inner">
                <video
                class="modal__video"
                id="venhicleVideo"
                controls="controls"
                poster="/assets/pics/venhicle-video.jpg"
                >
                <source
                    src="https://vod-progressive.akamaized.net/exp=1638752223~acl=%2Fvimeo-prod-skyfire-std-us%2F01%2F2529%2F23%2F587646749%2F2772470317.mp4~hmac=a54607309f4ff1b7a9845be20a98fd9680ae045b7f41e4b926e83744302dc337/vimeo-prod-skyfire-std-us/01/2529/23/587646749/2772470317.mp4?filename=Road+-+84970.mp4"
                    type="video/mp4"
                    />
                Video not supported by browser<a
                    href="https://vod-progressive.akamaized.net/exp=1638752223~acl=%2Fvimeo-prod-skyfire-std-us%2F01%2F2529%2F23%2F587646749%2F2772470317.mp4~hmac=a54607309f4ff1b7a9845be20a98fd9680ae045b7f41e4b926e83744302dc337/vimeo-prod-skyfire-std-us/01/2529/23/587646749/2772470317.mp4?filename=Road+-+84970.mp4"
                    >Download video</a
                    >
                </video
                >
                <button
                class="modal__play-video play-video play-video--xl"
                id="playVenhicleVideo"
                type="button"
                >
                <svg
                    width="10"
                    height="13"
                    viewBox="0 0 10 13"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    >
                    <path
                        d="M10 6.5L0.249999 12.1292L0.25 0.870834L10 6.5Z"
                        fill="white"
                        />
                </svg>
                </button>
            </div>
        </div>
    </div>
    </main>
@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('/assets/css/venhicle.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('/assets/js/venhicle.js') }}" type="text/javascript"></script>
@endsection