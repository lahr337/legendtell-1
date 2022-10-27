
    <div class="content-tab " id="dashboard">
      <section class="dashboard-tab">
        <div class="dashboard-tab__asside">
          <div class="dashboard-tab__car dashboard-car">
            <div class="dashboard-car__img-wr">
              <picture><img class="dashboar-car__img" src="{{$car->picture_url}}" loading="lazy" alt="alt" />
              </picture>
            </div>
            <div class="dashboard-car__info">
              <h5 class="dashboard-car__name">{{$car->title}}</h5>
              <div class="dashboard-car__miled-wr">
                <span class="dashboard-car__miles">52.014 miles</span>
                <a class="dashboard-car__edit link--dark" href="/">Edit</a>
                <a class="dashboard-car__edit link--dark" href="#" id="RemoveCarId" style="color:red;">Remove</a>
              </div>
            </div>
          </div>
          <ul class="dashboard-tab__asside-tabs dashboard-asside-tab" id="dashboardGeneralTabs">
            <li class="
                  dashboard-asside-tab__item
                  dashboard-asside-tab__item--active
                ">
              <a class="dashboard-asside-tab__link" href="/" data-tab="tabDashboardReg">
                <div class="dashboard-asside-tab__icon-wr">
                  <svg>
                    <use xlink:href="/assets/svg/dashboardasside-sprite.svg#registration"></use>
                  </svg>
                </div>
                <div class="dashboard-asside-tab__name">Registration</div>
                <div class="
                      dashboard-asside-tab__right-side
                      dashboard-asside-tab__right-side--time-left
                    ">
                  16 months left
                </div>
              </a>
            </li>
            <li class="dashboard-asside-tab__item">
              <a class="dashboard-asside-tab__link" href="/" data-tab="tabDashboardOil">
                <div class="dashboard-asside-tab__icon-wr">
                  <svg>
                    <use xlink:href="/assets/svg/dashboardasside-sprite.svg#oil"></use>
                  </svg>
                </div>
                <div class="dashboard-asside-tab__name">Oil Change</div>
                <div class="
                      dashboard-asside-tab__right-side
                      dashboard-asside-tab__right-side--with-icon
                    ">
                  <svg>
                    <use xlink:href="/assets/svg/dashboardasside-sprite.svg#warning"></use>
                  </svg><span>Overdue</span>
                </div>
              </a>
            </li>
            <li class="dashboard-asside-tab__item">
              <a class="dashboard-asside-tab__link" href="/" data-tab="tabDashboardRotation">
                <div class="dashboard-asside-tab__icon-wr">
                  <svg>
                    <use xlink:href="/assets/svg/dashboardasside-sprite.svg#rotation"></use>
                  </svg>
                </div>
                <div class="dashboard-asside-tab__name">The Rotation</div>
                <div class="
                      dashboard-asside-tab__right-side
                      dashboard-asside-tab__right-side--with-icon
                    ">
                  <svg>
                    <use xlink:href="/assets/svg/dashboardasside-sprite.svg#add"></use>
                  </svg><span>Start Tracking</span>
                </div>
              </a>
            </li>
            <li class="dashboard-asside-tab__item">
              <a class="dashboard-asside-tab__link" href="/" data-tab="tabDashboardTread">
                <div class="dashboard-asside-tab__icon-wr">
                  <svg>
                    <use xlink:href="/assets/svg/dashboardasside-sprite.svg#rotation"></use>
                  </svg>
                </div>
                <div class="dashboard-asside-tab__name">Tread Life</div>
                <div class="
                      dashboard-asside-tab__right-side
                      dashboard-asside-tab__right-side--with-icon
                    ">
                  <svg>
                    <use xlink:href="/assets/svg/dashboardasside-sprite.svg#add"></use>
                  </svg><span>Add Tires</span>
                </div>
              </a>
            </li>
            <li class="dashboard-asside-tab__item">
              <a class="dashboard-asside-tab__link" href="/" data-tab="tabDashboardSafety">
                <div class="dashboard-asside-tab__icon-wr">
                  <svg>
                    <use xlink:href="/assets/svg/dashboardasside-sprite.svg#safety"></use>
                  </svg>
                </div>
                <div class="dashboard-asside-tab__name">
                  Safety Inspector
                </div>
                <div class="
                      dashboard-asside-tab__right-side
                      dashboard-asside-tab__right-side--with-icon
                    ">
                  <svg>
                    <use xlink:href="/assets/svg/dashboardasside-sprite.svg#add"></use>
                  </svg><span>Start Tracking</span>
                </div>
              </a>
            </li>
          </ul>
          <div class="dashboard-tab__get-help get-help">
            <span class="get-help__question">Something wrong?</span><a class="get-help__link link--full-accent"
              href="/">Get Help</a>
          </div>
        </div>
        <div class="dashboard-tab__general dashboard-tab__general--active" id="tabDashboardReg">
          <span class="dashboard-tab__tab-name">Registration</span>
          <div class="dashboard-tab__items">
            <div class="dashboard-tab__next-item dashboard-next-item">
              <div class="block-heading">
                <h4 class="block-heading__title">Registration Expires</h4>
              </div>
              <div class="dashboard-next-item__metrics">
                <div class="dashbord-next-item__metric-item metric-item">
                  <span class="metric-item__name">Date</span><span class="metric-item__val">03/15/2023</span>
                </div>
              </div>
              <div class="
                    dashboard-next-item__location
                    dashboard-next-location dashboard-next-location--lg
                  ">
                <span class="dashboard-next-location__name">Louisiana</span><span>Monte Vehicle Dept.</span>
              </div>
              <a class="dashboard-next-item__btn btn btn--accent" href="/">Renew registration</a>
            </div>
            <div class="dashboard-tab__since-item dashboard-since-item">
              <div class="block-heading">
                <h4 class="block-heading__title">
                  Since Last Registration
                </h4>
              </div>
              <div class="dashboard-since-item__range-items">
                <div class="dashboard-since-item__range-item small-range">
                  <div class="small-range__heading">
                    <span class="small-range__name">Time Elapsed</span><span class="small-range__duration">10
                      monts</span>
                  </div>
                  <div class="small-range__visual">
                    <div class="small-range__visual-accent" style="width: 70%"></div>
                  </div>
                </div>
              </div>
              <div class="dashboard-since-item__action">
                <span class="dashboard-since-item__action-name">Registration</span>
                <div class="dashboard-since-item__action-details">
                  <span class="dashboard-since-item__action-duration">2 Years</span><a
                    class="dashboard-since-item__edit-link link--dark" href="/">Edit</a>
                </div>
              </div>
              <div class="dashboard-since-item__footer">
                <span class="dashboard-since-item__already-register">Did you already register your car?</span><button
                  class="
                      dashboard-since-item__add-registration
                      btn btn--accent-border btn--transparent
                    " id="openRegCarModal" type="button">
                  Add Registration</button><a class="dashboard-since-item__last-reg-link" href="/"><span>Last
                    registration</span><svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L9 1" stroke="#272727" /></svg></a>
              </div>
            </div>
          </div>
        </div>
        <div class="dashboard-tab__general" id="tabDashboardOil">
          @php($next_service = $car->services->last())
          <span class="dashboard-tab__tab-name">Oil Change</span>
          <div class="dashboard-tab__items">
            <div class="dashboard-tab__next-item dashboard-next-item">
              <div class="block-heading">
                <h4 class="block-heading__title">Next Service</h4>
              </div>
              @if($next_service)
              <div class="dashboard-next-item__metrics">
                <div class="dashbord-next-item__metric-item metric-item">
                  <span class="metric-item__name">Date</span><span class="metric-item__val">{{$next_service->date->format('d/m/Y')}}</span>
                </div>
                <div class="dashbord-next-item__metric-item metric-item">
                  <span class="metric-item__name">Mileage</span><span class="metric-item__val">{{$next_service->odometer}}</span>
                </div>
              </div>
              <div class="
                    dashboard-next-item__location
                    dashboard-next-location dashboard-next-location--sm
                  ">
                <span class="dashboard-next-location__name">Express Auto Salon</span><span>2441 Florida Ave, Kenner,
                  La 70062</span><span class="dashboard-next-location__number">1(504)287-4421</span>
              </div>
              <a class="dashboard-next-item__btn btn btn--accent" href="/">Renew service</a>
              @else
              <div class="dashboard-next-item__metrics">
                <div class="dashbord-next-item__metric-item metric-item">
                  <span class="metric-item__name">Date</span><span class="metric-item__val"> - </span>
                </div>
                <div class="dashbord-next-item__metric-item metric-item">
                  <span class="metric-item__name">Mileage</span><span class="metric-item__val"> - </span>
                </div>
              </div>
              @endif
            </div>
            <div class="dashboard-tab__since-item dashboard-since-item">
              <div class="block-heading">
                <h4 class="block-heading__title">Since Last Service</h4>
              </div>
              <div class="dashboard-since-item__range-items">
                <div class="dashboard-since-item__range-item small-range">
                  <div class="small-range__heading">
                    <span class="small-range__name">Time Elapsed</span><span class="small-range__duration">10
                      monts</span>
                  </div>
                  <div class="small-range__visual">
                    <div class="small-range__visual-accent" style="width: 70%"></div>
                  </div>
                </div>
                <div class="dashboard-since-item__range-item small-range">
                  <div class="small-range__heading">
                    <span class="small-range__name">Miles Driven</span><span class="small-range__duration">2.655
                      mi</span>
                  </div>
                  <div class="small-range__visual">
                    <div class="small-range__visual-accent" style="width: 40%"></div>
                  </div>
                </div>
              </div>
              <div class="dashboard-since-item__action">
                <span class="dashboard-since-item__action-name">Registration</span>
                <div class="dashboard-since-item__action-details">
                  <span class="dashboard-since-item__action-duration">2 Years | 7.500 miles</span><a
                    class="dashboard-since-item__edit-link link--dark" href="/">Edit</a>
                </div>
              </div>
              <div class="dashboard-since-item__footer">
                <span class="dashboard-since-item__already-register">Did you already register your car?</span><button
                  class="
                      dashboard-since-item__add-registration
                      btn btn--accent-border btn--transparent
                    " id="openAddServiceRecord" type="button">
                  Add Service Record</button><a class="dashboard-since-item__last-reg-link" href="/"><span>Last
                    registration</span><svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L9 1" stroke="#272727" /></svg></a>
              </div>
            </div>
          </div>
        </div>
        <div class="dashboard-tab__general" id="tabDashboardRotation">
          <span class="dashboard-tab__tab-name">Oil Change</span>
          <div class="dashboard-tab__items">
            <div class="dashboard-tab__next-item dashboard-next-item">
              <div class="block-heading">
                <h4 class="block-heading__title">Registration Expires</h4>
              </div>
              <div class="dashboard-next-item__metrics">
                <div class="dashbord-next-item__metric-item metric-item">
                  <span class="metric-item__name">Date</span><span class="metric-item__val">03/15/2023</span>
                </div>
              </div>
              <div class="
                    dashboard-next-item__location
                    dashboard-next-location dashboard-next-location--lg
                  ">
                <span class="dashboard-next-location__name">Louisiana</span><span>Monte Vehicle Dept.</span>
              </div>
              <a class="dashboard-next-item__btn btn btn--accent" href="/">Renew registration</a>
            </div>
            <div class="dashboard-tab__since-item dashboard-since-item">
              <div class="block-heading">
                <h4 class="block-heading__title">
                  Since Last Registration
                </h4>
              </div>
              <div class="dashboard-since-item__range-items">
                <div class="dashboard-since-item__range-item small-range">
                  <div class="small-range__heading">
                    <span class="small-range__name">Time Elapsed</span><span class="small-range__duration">10
                      monts</span>
                  </div>
                  <div class="small-range__visual">
                    <div class="small-range__visual-accent" style="width: 70%"></div>
                  </div>
                </div>
              </div>
              <div class="dashboard-since-item__action">
                <span class="dashboard-since-item__action-name">Registration</span>
                <div class="dashboard-since-item__action-details">
                  <span class="dashboard-since-item__action-duration">2 Years</span><a
                    class="dashboard-since-item__edit-link link--dark" href="/">Edit</a>
                </div>
              </div>
              <div class="dashboard-since-item__footer">
                <span class="dashboard-since-item__already-register">Did you already register your car?</span><button
                  class="
                      dashboard-since-item__add-registration
                      btn btn--accent-border btn--transparent
                    " id="openRegCarModal" type="button">
                  Add Registration</button><a class="dashboard-since-item__last-reg-link" href="/"><span>Last
                    registration</span><svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L9 1" stroke="#272727" /></svg></a>
              </div>
            </div>
          </div>
        </div>
        <div class="dashboard-tab__general" id="tabDashboardTread">
          <span class="dashboard-tab__tab-name">Oil Change</span>
          <div class="dashboard-tab__items">
            <div class="dashboard-tab__next-item dashboard-next-item">
              <div class="block-heading">
                <h4 class="block-heading__title">Next Service</h4>
              </div>
              <div class="dashboard-next-item__metrics">
                <div class="dashbord-next-item__metric-item metric-item">
                  <span class="metric-item__name">Date</span><span class="metric-item__val">10/01/2021</span>
                </div>
                <div class="dashbord-next-item__metric-item metric-item">
                  <span class="metric-item__name">Mileage</span><span class="metric-item__val">40.032</span>
                </div>
              </div>
              <div class="
                    dashboard-next-item__location
                    dashboard-next-location dashboard-next-location--sm
                  ">
                <span class="dashboard-next-location__name">Express Auto Salon</span><span>2441 Florida Ave, Kenner,
                  La 70062</span><span class="dashboard-next-location__number">1(504)287-4421</span>
              </div>
              <a class="dashboard-next-item__btn btn btn--accent" href="/">Renew registration</a>
            </div>
            <div class="dashboard-tab__since-item dashboard-since-item">
              <div class="block-heading">
                <h4 class="block-heading__title">Since Last Service</h4>
              </div>
              <div class="dashboard-since-item__range-items">
                <div class="dashboard-since-item__range-item small-range">
                  <div class="small-range__heading">
                    <span class="small-range__name">Time Elapsed</span><span class="small-range__duration">10
                      monts</span>
                  </div>
                  <div class="small-range__visual">
                    <div class="small-range__visual-accent" style="width: 70%"></div>
                  </div>
                </div>
                <div class="dashboard-since-item__range-item small-range">
                  <div class="small-range__heading">
                    <span class="small-range__name">Miles Driven</span><span class="small-range__duration">2.655
                      mi</span>
                  </div>
                  <div class="small-range__visual">
                    <div class="small-range__visual-accent" style="width: 40%"></div>
                  </div>
                </div>
              </div>
              <div class="dashboard-since-item__action">
                <span class="dashboard-since-item__action-name">Registration</span>
                <div class="dashboard-since-item__action-details">
                  <span class="dashboard-since-item__action-duration">2 Years | 7.500 miles</span><a
                    class="dashboard-since-item__edit-link link--dark" href="/">Edit</a>
                </div>
              </div>
              <div class="dashboard-since-item__footer">
                <span class="dashboard-since-item__already-register">Did you already register your car?</span><button
                  class="
                      dashboard-since-item__add-registration
                      btn btn--accent-border btn--transparent
                    " id="openAddServiceRecord" type="button">
                  Add Service Record</button><a class="dashboard-since-item__last-reg-link" href="/"><span>Last
                    registration</span><svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L9 1" stroke="#272727" /></svg></a>
              </div>
            </div>
          </div>
        </div>
        <div class="dashboard-tab__general" id="tabDashboardSafety">
          <span class="dashboard-tab__tab-name">Oil Change</span>
          <div class="dashboard-tab__items">
            <div class="dashboard-tab__next-item dashboard-next-item">
              <div class="block-heading">
                <h4 class="block-heading__title">Registration Expires</h4>
              </div>
              <div class="dashboard-next-item__metrics">
                <div class="dashbord-next-item__metric-item metric-item">
                  <span class="metric-item__name">Date</span><span class="metric-item__val">03/15/2023</span>
                </div>
              </div>
              <div class="
                    dashboard-next-item__location
                    dashboard-next-location dashboard-next-location--lg
                  ">
                <span class="dashboard-next-location__name">Louisiana</span><span>Monte Vehicle Dept.</span>
              </div>
              <a class="dashboard-next-item__btn btn btn--accent" href="/">Renew registration</a>
            </div>
            <div class="dashboard-tab__since-item dashboard-since-item">
              <div class="block-heading">
                <h4 class="block-heading__title">
                  Since Last Registration
                </h4>
              </div>
              <div class="dashboard-since-item__range-items">
                <div class="dashboard-since-item__range-item small-range">
                  <div class="small-range__heading">
                    <span class="small-range__name">Time Elapsed</span><span class="small-range__duration">10
                      monts</span>
                  </div>
                  <div class="small-range__visual">
                    <div class="small-range__visual-accent" style="width: 70%"></div>
                  </div>
                </div>
              </div>
              <div class="dashboard-since-item__action">
                <span class="dashboard-since-item__action-name">Registration</span>
                <div class="dashboard-since-item__action-details">
                  <span class="dashboard-since-item__action-duration">2 Years</span><a
                    class="dashboard-since-item__edit-link link--dark" href="/">Edit</a>
                </div>
              </div>
              <div class="dashboard-since-item__footer">
                <span class="dashboard-since-item__already-register">Did you already register your car?</span><button
                  class="
                      dashboard-since-item__add-registration
                      btn btn--accent-border btn--transparent
                    " id="openRegCarModal" type="button">
                  Add Registration</button><a class="dashboard-since-item__last-reg-link" href="/"><span>Last
                    registration</span><svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L9 1" stroke="#272727" /></svg></a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>