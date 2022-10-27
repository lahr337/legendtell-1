{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @php($appraisal = $car->appraisal ?? new App\Models\CarAppraisal)
    <main class="page-wrapper">
        <div class="container">
            <div class="view-appraisal page">
                <div class="page-heading">
                    <h1 class="page-heading__title">Appraisal Offer</h1>
                </div>
                <div class="section-heading view-appraisal__car-name">
                    <h2 class="section-heading__title">{{$car->title}}</h2>
                </div>
                <div class="view-appraisal__content-wrapper">
                    <div class="view-appraisal__vin vin vin--md vin--title-accent">
                    <span class="vin__title">VIN:</span
                        ><span class="vin__number">{{$car->vin}}</span>
                        <!-- SBM11AAA4CW001448 -->
                    </div>
                    <div
                    class="
                    view-appraisal__appraisal-val
                    vin vin--md vin--title-accent
                    "
                    >
                    <span class="vin__title">Appraisal Value</span
                        ><span class="vin__number">${{$appraisal->appraisal_value}}</span>
                    </div>
                    <div class="view-appraisal__slider-wrapper">
                    <div class="view-appraisal__general-slider car-general-slider">
                        <div
                            class="
                            view-appraisal__general-slider
                            swiper
                            car-general-slider__slider
                            "
                            id="carGeneralSlider"
                            >
                            <div class="swiper-wrapper">
                                @foreach($car->medias as $media)
                                <picture class="swiper-slide car-general-slider__slide">
                                    <img class="car-general-slider__img" src="{{$media->url}}" alt="{{$media->filename}}" />
                                </picture>
                                @endforeach
                            </div>
                        </div>
                        <button
                            class="
                            swiper-button-prev
                            car-general-slider__arrow car-general-slider__arrow--prev
                            slider-button slider-button--md
                            "
                            id="carGeneralSliderPrev"
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
                            car-general-slider__arrow car-general-slider__arrow--next
                            slider-button slider-button--md
                            "
                            id="carGeneralSliderNext"
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
                    <div
                        class="swiper view-appraisal__thumbs-slider car-thambs-slider"
                        id="carThumbsSlider"
                        thumbsSlider=""
                        >
                        <div class="swiper-wrapper">
                            @foreach($car->medias as $media)
                            <picture class="swiper-slide car-thambs-slider__slide">
                                <img class="car-thambs-slider__img" src="{{$media->url}}" alt="{{$media->filename}}" />
                            </picture>
                            @endforeach
                        </div>
                    </div>
                    </div>
                    <div class="view-appraisal__general-info general-car-props">
                    <div class="general-car-props__heading block-heading">
                        <h3 class="general-car-props__title block-heading__title">
                            Overall Rating
                        </h3>
                        <span class="general-car-props__accent">98%</span>
                    </div>
                    <ul class="general-car-props__props-list list list--props list--props-sm-margins">
                        <li class="list__item">
                            <span class="list__item-prop">Color</span
                                ><span class="list__item-val">{{$appraisal->color}}</span>
                        </li>
                        <li class="list__item">
                            <span class="list__item-prop">Mileage</span
                                ><span class="list__item-val">{{$appraisal->mileage}} mi</span>
                        </li>
                        <li class="list__item">
                            <span class="list__item-prop">Engine</span
                                ><span class="list__item-val">{{$appraisal->engine}}L</span>
                        </li>
                        <li class="list__item">
                            <span class="list__item-prop">Appraisal Date</span
                                ><span class="list__item-val">{{$appraisal->appraisal_date ? $appraisal->appraisal_date->format('d/m/Y') : '-'}}</span>
                        </li>
                        <li class="list__item">
                            <span class="list__item-prop">Appraiser</span
                                ><span class="list__item-val"
                                ><a href="/">{{$appraisal->appraiser}}</a></span
                                >
                        </li>
                        <li class="list__item">
                            <span class="list__item-prop">Market Value</span
                                ><span class="list__item-val">${{$appraisal->market_value}}</span>
                        </li>
                    </ul>
                    <a
                        class="
                        general-car-props__download
                        link link--with-icon link--full-accent link--accent-underline
                        "
                        href="/"
                        >
                        <span class="link__name">Download a report as PDF</span
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
                        </svg
                            >
                    </a>
                    </div>
                    <div class="view-appraisal__condition conditions-assessed">
                    <div class="block-heading">
                        <h3 class="conditions-assessed__title block-heading__title">
                            Conditions assessed
                        </h3>
                    </div>
                    <ul class="conditions-assessed__list">
                        <li
                            class="
                            conditions-assessed__item
                            condition-assessed-item condition-assessed-item--appraisal
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
                        </li>
                        <li
                            class="
                            conditions-assessed__item
                            condition-assessed-item condition-assessed-item--appraisal
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
                        </li>
                        <li
                            class="
                            conditions-assessed__item
                            condition-assessed-item condition-assessed-item--appraisal
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
                        </li>
                        <li
                            class="
                            conditions-assessed__item
                            condition-assessed-item condition-assessed-item--appraisal
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
                        </li>
                        <li
                            class="
                            conditions-assessed__item
                            condition-assessed-item condition-assessed-item--appraisal
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
                        </li>
                        <li
                            class="
                            conditions-assessed__item
                            condition-assessed-item condition-assessed-item--appraisal
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
                        </li>
                        <li
                            class="
                            conditions-assessed__item
                            condition-assessed-item condition-assessed-item--appraisal
                            "
                            >
                            <svg>
                                <use
                                xlink:href="/assets/svg/conditions-sprite.svg#wd"
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
                        </li>
                        <li
                            class="
                            conditions-assessed__item
                            condition-assessed-item condition-assessed-item--appraisal
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
                        </li>
                        <li
                            class="
                            conditions-assessed__item
                            condition-assessed-item condition-assessed-item--appraisal
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
                        </li>
                    </ul>
                    <table class="conditions-assessed__report report-table">
                        <thead>
                            <tr>
                                <th>Known Vehicle Issues</th>
                                <th>Known Issues Repairs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A/C OLED units</td>
                                <td>
                                <a class="link link--def" href="/"
                                    >Fixed (See Repair Here)</a
                                    >
                                </td>
                            </tr>
                            <tr>
                                <td>Windshield Wiper Motor</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="view-appraisal__features-wr">
                    <div class="view-appraisal__features features-list-block">
                        <div class="block-heading">
                            <h3 class="features-list-block__title block-heading__title">
                                Feautures considered
                            </h3>
                        </div>
                        <ul
                            class="
                            features-list-block__list
                            list list--with-checks list--three-column
                            "
                            >
                            <li class="list__item">Power Locks</li>
                            <li class="list__item">Power Locks</li>
                            <li class="list__item">Sunroof (S)</li>
                            <li class="list__item">Sunroof (S)</li>
                            <li class="list__item">Sunroof (S)</li>
                            <li class="list__item">Power Locks</li>
                            <li class="list__item">Power Locks</li>
                            <li class="list__item">Power Locks</li>
                            <li class="list__item">Sunroof (S)</li>
                            <li class="list__item">Sunroof (S)</li>
                            <li class="list__item">Sunroof (S)</li>
                            <li class="list__item">Power Locks</li>
                            <li class="list__item">Power Locks</li>
                            <li class="list__item">Sunroof (S)</li>
                            <li class="list__item">Sunroof (S)</li>
                            <li class="list__item">Sunroof (S)</li>
                            <li class="list__item">Power Locks</li>
                            <li class="list__item">Power Locks</li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('/assets/css/viewAppraisal.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('/assets/js/viewAppraisal.js') }}" type="text/javascript"></script>
@endsection