
{{-- Content --}}
@section('content')

<main class="page-wrapper">
      <div class="container">
        <section class="faq page">
          <div class="page-heading page-heading--centered">
            <h1 class="page-heading__title">
              Frequently <span>Asked</span> Question
            </h1>
          </div>
          <div class="faq__grid">
            <ul
              class="faq__questions-type nav-tabs nav-tabs--help"
              id="faqTabs"
            >
              <li class="nav-tabs__item">
                <button
                  class="
                    nav-tabs__link
                    nav-tabs-item nav-tabs-item--choose-help
                  "
                  type="button"
                  data-tab="order"
                >
                  <div class="nav-tabs__item-icon nav-tabs-item__icon-wr">
                    <svg
                      width="15"
                      height="15"
                      viewBox="0 0 15 15"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M11.25 0H3.75C2.71594 0 1.875 0.840937 1.875 1.875V13.125C1.875 14.1591 2.71594 15 3.75 15H11.25C12.2841 15 13.125 14.1591 13.125 13.125V1.875C13.125 0.840937 12.2841 0 11.25 0ZM10.7812 12.1875H7.03125C6.7725 12.1875 6.5625 11.9775 6.5625 11.7188C6.5625 11.46 6.7725 11.25 7.03125 11.25H10.7812C11.04 11.25 11.25 11.46 11.25 11.7188C11.25 11.9775 11.04 12.1875 10.7812 12.1875ZM10.7812 9.375H7.03125C6.7725 9.375 6.5625 9.165 6.5625 8.90625C6.5625 8.6475 6.7725 8.4375 7.03125 8.4375H10.7812C11.04 8.4375 11.25 8.6475 11.25 8.90625C11.25 9.165 11.04 9.375 10.7812 9.375ZM10.7812 6.5625H7.03125C6.7725 6.5625 6.5625 6.3525 6.5625 6.09375C6.5625 5.835 6.7725 5.625 7.03125 5.625H10.7812C11.04 5.625 11.25 5.835 11.25 6.09375C11.25 6.3525 11.04 6.5625 10.7812 6.5625ZM10.7812 3.75H7.03125C6.7725 3.75 6.5625 3.54 6.5625 3.28125C6.5625 3.0225 6.7725 2.8125 7.03125 2.8125H10.7812C11.04 2.8125 11.25 3.0225 11.25 3.28125C11.25 3.54 11.04 3.75 10.7812 3.75ZM5.15625 3.75H4.21875C3.96 3.75 3.75 3.54 3.75 3.28125C3.75 3.0225 3.96 2.8125 4.21875 2.8125H5.15625C5.415 2.8125 5.625 3.0225 5.625 3.28125C5.625 3.54 5.415 3.75 5.15625 3.75ZM5.15625 6.5625H4.21875C3.96 6.5625 3.75 6.3525 3.75 6.09375C3.75 5.835 3.96 5.625 4.21875 5.625H5.15625C5.415 5.625 5.625 5.835 5.625 6.09375C5.625 6.3525 5.415 6.5625 5.15625 6.5625ZM5.15625 9.375H4.21875C3.96 9.375 3.75 9.165 3.75 8.90625C3.75 8.6475 3.96 8.4375 4.21875 8.4375H5.15625C5.415 8.4375 5.625 8.6475 5.625 8.90625C5.625 9.165 5.415 9.375 5.15625 9.375ZM5.15625 12.1875H4.21875C3.96 12.1875 3.75 11.9775 3.75 11.7188C3.75 11.46 3.96 11.25 4.21875 11.25H5.15625C5.415 11.25 5.625 11.46 5.625 11.7188C5.625 11.9775 5.415 12.1875 5.15625 12.1875Z"
                        fill="#0077C6"
                      />
                    </svg>
                  </div>
                  <span class="nav-tabs-item__name">Order Help</span>
                  <div class="nav-tabs-item__arrow">
                    <svg
                      width="6"
                      height="10"
                      viewBox="0 0 6 10"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path d="M1 9L5 5L1 1" stroke="#272727" />
                    </svg>
                  </div>
                </button>
              </li>
              <li class="nav-tabs__item">
                <button
                  class="
                    nav-tabs__link
                    nav-tabs-item nav-tabs-item--choose-help
                  "
                  type="button"
                  data-tab="report"
                >
                  <div class="nav-tabs__item-icon nav-tabs-item__icon-wr">
                    <svg
                      width="15"
                      height="15"
                      viewBox="0 0 15 15"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M11.25 0H3.75C2.71594 0 1.875 0.840937 1.875 1.875V13.125C1.875 14.1591 2.71594 15 3.75 15H11.25C12.2841 15 13.125 14.1591 13.125 13.125V1.875C13.125 0.840937 12.2841 0 11.25 0ZM10.7812 12.1875H7.03125C6.7725 12.1875 6.5625 11.9775 6.5625 11.7188C6.5625 11.46 6.7725 11.25 7.03125 11.25H10.7812C11.04 11.25 11.25 11.46 11.25 11.7188C11.25 11.9775 11.04 12.1875 10.7812 12.1875ZM10.7812 9.375H7.03125C6.7725 9.375 6.5625 9.165 6.5625 8.90625C6.5625 8.6475 6.7725 8.4375 7.03125 8.4375H10.7812C11.04 8.4375 11.25 8.6475 11.25 8.90625C11.25 9.165 11.04 9.375 10.7812 9.375ZM10.7812 6.5625H7.03125C6.7725 6.5625 6.5625 6.3525 6.5625 6.09375C6.5625 5.835 6.7725 5.625 7.03125 5.625H10.7812C11.04 5.625 11.25 5.835 11.25 6.09375C11.25 6.3525 11.04 6.5625 10.7812 6.5625ZM10.7812 3.75H7.03125C6.7725 3.75 6.5625 3.54 6.5625 3.28125C6.5625 3.0225 6.7725 2.8125 7.03125 2.8125H10.7812C11.04 2.8125 11.25 3.0225 11.25 3.28125C11.25 3.54 11.04 3.75 10.7812 3.75ZM5.15625 3.75H4.21875C3.96 3.75 3.75 3.54 3.75 3.28125C3.75 3.0225 3.96 2.8125 4.21875 2.8125H5.15625C5.415 2.8125 5.625 3.0225 5.625 3.28125C5.625 3.54 5.415 3.75 5.15625 3.75ZM5.15625 6.5625H4.21875C3.96 6.5625 3.75 6.3525 3.75 6.09375C3.75 5.835 3.96 5.625 4.21875 5.625H5.15625C5.415 5.625 5.625 5.835 5.625 6.09375C5.625 6.3525 5.415 6.5625 5.15625 6.5625ZM5.15625 9.375H4.21875C3.96 9.375 3.75 9.165 3.75 8.90625C3.75 8.6475 3.96 8.4375 4.21875 8.4375H5.15625C5.415 8.4375 5.625 8.6475 5.625 8.90625C5.625 9.165 5.415 9.375 5.15625 9.375ZM5.15625 12.1875H4.21875C3.96 12.1875 3.75 11.9775 3.75 11.7188C3.75 11.46 3.96 11.25 4.21875 11.25H5.15625C5.415 11.25 5.625 11.46 5.625 11.7188C5.625 11.9775 5.415 12.1875 5.15625 12.1875Z"
                        fill="#0077C6"
                      />
                    </svg>
                  </div>
                  <span class="nav-tabs-item__name">Report Questions</span>
                  <div class="nav-tabs-item__arrow">
                    <svg
                      width="6"
                      height="10"
                      viewBox="0 0 6 10"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path d="M1 9L5 5L1 1" stroke="#272727" />
                    </svg>
                  </div>
                </button>
              </li>
              <li class="nav-tabs__item">
                <button
                  class="
                    nav-tabs__link
                    nav-tabs-item nav-tabs-item--choose-help
                  "
                  type="button"
                  data-tab="account"
                >
                  <div class="nav-tabs__item-icon nav-tabs-item__icon-wr">
                    <svg
                      width="15"
                      height="15"
                      viewBox="0 0 15 15"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M10.7812 3.75C9.48656 3.75 8.4375 4.79906 8.4375 6.09375C8.4375 7.38844 9.48656 8.4375 10.7812 8.4375C12.0759 8.4375 13.125 7.38844 13.125 6.09375C13.125 4.79906 12.0759 3.75 10.7812 3.75Z"
                        fill="#0077C6"
                      />
                      <path
                        d="M10.7805 8.4375C10.1918 8.4375 9.63211 8.54625 9.12305 8.74125C9.86461 9.69469 10.3118 10.8881 10.3118 12.1875C10.3118 12.5306 10.2124 12.8484 10.0512 13.125H14.0618C14.5793 13.125 14.9993 12.705 14.9993 12.1875C14.9993 10.1194 13.1065 8.4375 10.7805 8.4375Z"
                        fill="#0077C6"
                      />
                      <path
                        d="M8.265 9.195C7.40438 8.16844 6.12937 7.5 4.6875 7.5C2.10281 7.5 0 9.60281 0 12.1875C0 12.4462 0.105 12.6806 0.274687 12.8503C0.444375 13.02 0.67875 13.125 0.9375 13.125H7.5H8.4375C8.955 13.125 9.375 12.705 9.375 12.1875C9.375 11.0447 8.9475 10.0097 8.265 9.195Z"
                        fill="#0077C6"
                      />
                      <path
                        d="M4.6875 7.5C3.13687 7.5 1.875 6.23812 1.875 4.6875C1.875 3.13687 3.13687 1.875 4.6875 1.875C6.23812 1.875 7.5 3.13687 7.5 4.6875C7.5 6.23812 6.23812 7.5 4.6875 7.5Z"
                        fill="#0077C6"
                      />
                    </svg>
                  </div>
                  <span class="nav-tabs-item__name">Account Questions</span>
                  <div class="nav-tabs-item__arrow">
                    <svg
                      width="6"
                      height="10"
                      viewBox="0 0 6 10"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path d="M1 9L5 5L1 1" stroke="#272727" />
                    </svg>
                  </div>
                </button>
              </li>
              <li class="nav-tabs__item">
                <button
                  class="
                    nav-tabs__link
                    nav-tabs-item nav-tabs-item--choose-help
                  "
                  type="button"
                  data-tab="billing"
                >
                  <div class="nav-tabs__item-icon nav-tabs-item__icon-wr">
                    <svg
                      width="15"
                      height="15"
                      viewBox="0 0 15 15"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M15 3.37875C15 2.54813 14.3269 1.875 13.4963 1.875H7.13438L4.23281 0.134062C4.08469 0.045 3.91781 0 3.75 0C3.61594 0 3.48188 0.0290625 3.35719 0.08625C3.07594 0.216562 2.87625 0.477187 2.82562 0.782812L2.64375 1.875H1.875C0.839062 1.875 0 2.71406 0 3.75V14.0625C0 14.58 0.42 15 0.9375 15H14.0625C14.58 15 15 14.58 15 14.0625V11.25H10.7812C10.005 11.25 9.375 10.62 9.375 9.84375C9.375 9.0675 10.005 8.4375 10.7812 8.4375H15V3.37875ZM14.0625 4.67812V4.6875H1.875C1.35844 4.6875 0.9375 4.26656 0.9375 3.75C0.9375 3.36094 1.17656 3.02719 1.515 2.88563C1.62563 2.83875 1.7475 2.8125 1.875 2.8125H2.48719L2.33063 3.75H10.2591L8.69719 2.8125H13.4963C13.8084 2.8125 14.0625 3.06656 14.0625 3.37875V4.67812Z"
                        fill="#0077C6"
                      />
                      <path
                        d="M11.7188 10.3125H10.7812C10.5225 10.3125 10.3125 10.1025 10.3125 9.84375C10.3125 9.585 10.5225 9.375 10.7812 9.375H11.7188C11.9775 9.375 12.1875 9.585 12.1875 9.84375C12.1875 10.1025 11.9775 10.3125 11.7188 10.3125Z"
                        fill="#0077C6"
                      />
                    </svg>
                  </div>
                  <span class="nav-tabs-item__name">Billing Questions</span>
                  <div class="nav-tabs-item__arrow">
                    <svg
                      width="6"
                      height="10"
                      viewBox="0 0 6 10"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path d="M1 9L5 5L1 1" stroke="#272727" />
                    </svg>
                  </div>
                </button>
              </li>
            </ul>
            <div class="faq__toggles" id="toggles">
              <div
                class="faq__toggles-group faq__toggles-group--active"
                id="order"
              >
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="faq__toggles-group" id="report">
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="faq__toggles-group" id="account">
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="faq__toggles-group" id="account">
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="faq__toggles-group" id="billing">
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="faq__toggle toggle toggle--faq">
                  <div class="toggle__header">
                    <h5 class="toggle__header-title">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h5>
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
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Risus iaculis nibh ornare id pharetra nibh consectetur.
                        Sit orci faucibus facilisis volutpat. In et diam aliquam
                        amet, amet, proin. Ac amet ante sit ultricies ligula vel
                        egestas.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="faq__contacts-and-chat">
              <div class="faq__contact-us contact-us-block">
                <div class="block-heading block-heading--centered">
                  <h3 class="block-heading__title">Contact Us</h3>
                </div>
                <div class="contact-us-block__desc">
                  <p>
                    Send us a message and read our response at your convenience
                  </p>
                </div>
                <a class="contact-us-block__btn btn btn--accent" href="/"
                  >Contact Us</a
                >
              </div>
              <div class="faq__start-live-chart start-live-chart">
                <div class="start-live-chart__desc">
                  <p>If you need help immediately, start a live chat</p>
                </div>
                <button
                  class="start-live-chart__btn btn btn--accent-border"
                  id="openChatBtn"
                  type="button"
                >
                  <span class="start-live-chat__btn-text">Start Live chat</span>
                </button>
              </div>
            </div>
          </div>
          <div class="faq__chat chat" id="chat">
            <div class="chat__header chat-header">
              <div class="chat-header__avatar-wr">
                <picture
                  ><img
                    class="chat-header__avatar-img"
                    src="/assets/pics/chat-support-avatar.jpg"
                    loading="lazy"
                    alt="supptor"
                /></picture>
              </div>
              <div class="chat-header__support-info">
                <div class="chat-header__customer-support">
                  <span class="chat-header__customer-support-title"
                    >Customer Support</span
                  >
                  <div class="chat-header__support-status"></div>
                </div>
                <span class="chat-header__support-specialist"
                  >Chat with Max</span
                >
              </div>
              <button
                class="chat-header__close-chat-btn"
                id="closeChat"
                type="button"
              >
                <svg
                  width="12"
                  height="12"
                  viewBox="0 0 12 12"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g clip-path="url(#clip0_66_2748)">
                    <path
                      d="M7.40994 5.99994L11.7099 1.70994C11.8982 1.52164 12.004 1.26624 12.004 0.999941C12.004 0.73364 11.8982 0.478245 11.7099 0.289941C11.5216 0.101638 11.2662 -0.00415039 10.9999 -0.00415039C10.7336 -0.00415039 10.4782 0.101638 10.2899 0.289941L5.99994 4.58994L1.70994 0.289941C1.52164 0.101638 1.26624 -0.00415039 0.999939 -0.00415039C0.733637 -0.00415039 0.478243 0.101638 0.289939 0.289941C0.101635 0.478245 -0.00415277 0.73364 -0.00415277 0.999941C-0.00415278 1.26624 0.101635 1.52164 0.289939 1.70994L4.58994 5.99994L0.289939 10.2899C0.19621 10.3829 0.121816 10.4935 0.0710478 10.6154C0.0202791 10.7372 -0.00585938 10.8679 -0.00585938 10.9999C-0.00585938 11.132 0.0202791 11.2627 0.0710478 11.3845C0.121816 11.5064 0.19621 11.617 0.289939 11.7099C0.382902 11.8037 0.493503 11.8781 0.615362 11.9288C0.737221 11.9796 0.867927 12.0057 0.999939 12.0057C1.13195 12.0057 1.26266 11.9796 1.38452 11.9288C1.50638 11.8781 1.61698 11.8037 1.70994 11.7099L5.99994 7.40994L10.2899 11.7099C10.3829 11.8037 10.4935 11.8781 10.6154 11.9288C10.7372 11.9796 10.8679 12.0057 10.9999 12.0057C11.132 12.0057 11.2627 11.9796 11.3845 11.9288C11.5064 11.8781 11.617 11.8037 11.7099 11.7099C11.8037 11.617 11.8781 11.5064 11.9288 11.3845C11.9796 11.2627 12.0057 11.132 12.0057 10.9999C12.0057 10.8679 11.9796 10.7372 11.9288 10.6154C11.8781 10.4935 11.8037 10.3829 11.7099 10.2899L7.40994 5.99994Z"
                      fill="white"
                    />
                  </g>
                  <defs>
                    <clipPath id="clip0_66_2748">
                      <rect width="12" height="12" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
            <div class="chat__inner">
              <div class="chat__body chat-body">
                <div class="chat-body__inner">
                  <div class="chat-body__date">Today</div>
                  <div
                    class="
                      chat-body__messages
                      chat-messages chat-messages--user
                    "
                  >
                    <div class="chat-messages__messages-wr">
                      <div class="chat-messages__message-wr">
                        <span class="chat-messages__message-time">9:10</span>
                        <div class="chat-messages__messate-text">
                          <p>Hello!</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    class="
                      chat-body__messages
                      chat-messages chat-messages--support
                    "
                  >
                    <div class="chat-messages__support-avatar-wr">
                      <picture
                        ><img
                          class="chat-messages__support-avatar-img"
                          src="/assets/pics/chat-support-avatar.jpg"
                          loading="lazy"
                          alt="support"
                      /></picture>
                    </div>
                    <div class="chat-messages__messages-wr">
                      <div class="chat-messages__message-wr">
                        <span class="chat-messages__message-time">9:10</span>
                        <div class="chat-messages__messate-text">
                          <p>Hello!</p>
                        </div>
                      </div>
                      <div class="chat-messages__message-wr">
                        <div class="chat-messages__messate-text">
                          <p>How can I help you?</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="chat__message-field-block chat-message-field">
                <textarea
                  class="chat-message-field__field"
                  id="chatField"
                  placeholder="Type message here..."
                ></textarea>
                <div class="chat-message-field__controls">
                  <button
                    class="
                      chat-message-field__control-item
                      chat-message-field__control-item--smile
                    "
                    id="smileButton"
                    type="button"
                  >
                    <svg
                      width="15"
                      height="15"
                      viewBox="0 0 15 15"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M7.50172 0.287842C11.4852 0.287842 14.7144 3.51706 14.7144 7.5005C14.7144 11.4839 11.4852 14.7132 7.50172 14.7132C3.51828 14.7132 0.289062 11.4839 0.289062 7.5005C0.289062 3.51706 3.51828 0.287842 7.50172 0.287842ZM7.50172 1.36957C4.1157 1.36957 1.37079 4.11448 1.37079 7.5005C1.37079 10.8865 4.1157 13.6314 7.50172 13.6314C10.8877 13.6314 13.6326 10.8865 13.6326 7.5005C13.6326 4.11448 10.8877 1.36957 7.50172 1.36957ZM4.95009 9.5077C5.56245 10.2849 6.49347 10.7468 7.50171 10.7468C8.5086 10.7468 9.43851 10.2861 10.051 9.51071C10.2361 9.27629 10.5762 9.23635 10.8106 9.42149C11.045 9.60664 11.085 9.94675 10.8998 10.1812C10.0844 11.2136 8.84316 11.8286 7.50171 11.8286C6.15846 11.8286 4.91575 11.212 4.10041 10.1772C3.91554 9.94253 3.95588 9.60246 4.19052 9.41759C4.42515 9.23272 4.76522 9.27307 4.95009 9.5077ZM5.33858 5.15721C5.83615 5.15721 6.23951 5.56057 6.23951 6.05814C6.23951 6.55571 5.83615 6.95907 5.33858 6.95907C4.84101 6.95907 4.43765 6.55571 4.43765 6.05814C4.43765 5.56057 4.84101 5.15721 5.33858 5.15721ZM9.6655 5.15721C10.1631 5.15721 10.5664 5.56057 10.5664 6.05814C10.5664 6.55571 10.1631 6.95907 9.6655 6.95907C9.16793 6.95907 8.76457 6.55571 8.76457 6.05814C8.76457 5.56057 9.16793 5.15721 9.6655 5.15721Z"
                        fill="#B0B0B0"
                      />
                    </svg></button
                  ><button
                    class="
                      chat-message-field__control-item
                      chat-message-field__control-item--file
                    "
                    id="attacheFile"
                    type="button"
                  >
                    <svg
                      width="15"
                      height="15"
                      viewBox="0 0 15 15"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M13.9407 4.08032C13.8948 2.94781 13.4106 1.899 12.5768 1.12923C12.1829 0.766495 11.7348 0.484189 11.244 0.290513C10.7533 0.0984791 10.2346 0 9.70121 0C9.64376 0 9.58468 0.00164132 9.52723 0.00328264C8.39472 0.0492395 7.34756 0.533428 6.57614 1.36886L1.80155 6.52095C1.64891 6.68674 1.65711 6.94443 1.82125 7.0987L2.15279 7.41055C2.31857 7.56647 2.57954 7.55827 2.73546 7.39085L7.51334 2.23547C8.05825 1.6446 8.85757 1.30485 9.70449 1.30485C10.4661 1.30485 11.18 1.57566 11.7118 2.06806C12.2945 2.60641 12.6342 3.33844 12.6654 4.13284C12.6966 4.92559 12.4209 5.6806 11.8858 6.25998L5.39605 13.188C5.07107 13.5392 4.59673 13.7411 4.09285 13.7411C3.63984 13.7411 3.21474 13.5803 2.89797 13.2865C2.55165 12.9664 2.35141 12.5315 2.33007 12.0588C2.31038 11.5877 2.47451 11.138 2.79128 10.7949C2.79128 10.7949 8.83133 4.34949 8.84119 4.34128C9.36968 3.79308 10.1985 4.59076 9.67006 5.13897C8.77226 6.06959 6.46621 8.55947 5.33698 9.78225C5.18432 9.94804 5.19253 10.2057 5.35666 10.36L5.68821 10.6718C5.854 10.8278 6.11495 10.8196 6.27087 10.6522L10.6187 5.96455C11.3064 5.21939 11.2605 4.05241 10.5137 3.36306C10.1739 3.04957 9.72913 2.87559 9.26464 2.87559C9.01352 2.87559 8.77058 2.92483 8.5408 3.02331C8.30447 3.12343 8.09438 3.27115 7.92038 3.46154L1.859 9.92505C0.721564 11.1577 0.800347 13.0862 2.03298 14.2253C2.57461 14.7259 3.305 15 4.08955 15C4.96109 15 5.77682 14.657 6.3283 14.0595L12.8181 7.13151C13.5862 6.29773 13.985 5.21447 13.9407 4.08032Z"
                        fill="#B0B0B0"
                      />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('/assets/css/help.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('/assets/js/help.js') }}" type="text/javascript"></script>
@endsection