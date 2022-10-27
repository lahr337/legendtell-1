<div class="modal modal--add-car modal--default" id="addCarModal">
    <div class="modal__inner">
      <button class="modal__close" id="modalClose" type="button">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M13.4099 12L17.7099 7.71C17.8982 7.5217 18.004 7.2663 18.004 7C18.004 6.7337 17.8982 6.47831 17.7099 6.29C17.5216 6.1017 17.2662 5.99591 16.9999 5.99591C16.7336 5.99591 16.4782 6.1017 16.2899 6.29L11.9999 10.59L7.70994 6.29C7.52164 6.1017 7.26624 5.99591 6.99994 5.99591C6.73364 5.99591 6.47824 6.1017 6.28994 6.29C6.10164 6.47831 5.99585 6.7337 5.99585 7C5.99585 7.2663 6.10164 7.5217 6.28994 7.71L10.5899 12L6.28994 16.29C6.19621 16.383 6.12182 16.4936 6.07105 16.6154C6.02028 16.7373 5.99414 16.868 5.99414 17C5.99414 17.132 6.02028 17.2627 6.07105 17.3846C6.12182 17.5064 6.19621 17.617 6.28994 17.71C6.3829 17.8037 6.4935 17.8781 6.61536 17.9289C6.73722 17.9797 6.86793 18.0058 6.99994 18.0058C7.13195 18.0058 7.26266 17.9797 7.38452 17.9289C7.50638 17.8781 7.61698 17.8037 7.70994 17.71L11.9999 13.41L16.2899 17.71C16.3829 17.8037 16.4935 17.8781 16.6154 17.9289C16.7372 17.9797 16.8679 18.0058 16.9999 18.0058C17.132 18.0058 17.2627 17.9797 17.3845 17.9289C17.5064 17.8781 17.617 17.8037 17.7099 17.71C17.8037 17.617 17.8781 17.5064 17.9288 17.3846C17.9796 17.2627 18.0057 17.132 18.0057 17C18.0057 16.868 17.9796 16.7373 17.9288 16.6154C17.8781 16.4936 17.8037 16.383 17.7099 16.29L13.4099 12Z"
            fill="#272727" />
        </svg>
      </button>
      <h4 class="modal__title">Add Registration</h4>
      <div class="modal__steps-wr">
      <form id="addCarRegModal" method="POST" action="{{route('car.add-registration', $car->id)}}">
        @csrf
        <div class="modal__step modal-step modal-step--active" data-step="1">
          <h6 class="modal-step__title"><span>Step 1.</span> Odometer</h6>
          <div class="modal-step__heading">
            <h5 class="modal-step__heading-title">Check Your Odometer</h5>
            <div class="modal-step__heading-desc">
              Our estimate might be a little off
            </div>
          </div>
          <div class="modal-step__question">
            <div class="modal-step__question-general">
              <h6 class="modal-step__question-title">
                Is your odometer close to 40.031 Miles?
              </h6>
              <div class="modal-step__answers modal-step__answers--inline">
                <div class="
                      modal-step__answer-wr
                      custom-radio custom-radio--with-label
                    ">
                  <div class="custom-radio__field-wr">
                    <input class="curstom-radio__field" id="odometerYes" type="radio" name="has_closest_odometer" value="1"
                      checked />
                    <div class="custom-radio__customize"></div>
                  </div>
                  <label class="custom-radio__label" for="odometerYes">Yes</label>
                </div>
                <div class="
                      modal-step__answer-wr
                      custom-radio custom-radio--with-label
                    ">
                  <div class="custom-radio__field-wr">
                    <input class="curstom-radio__field" id="odometerNo" type="radio" name="has_closest_odometer" value="0" />
                    <div class="custom-radio__customize"></div>
                  </div>
                  <label class="custom-radio__label" for="odometerNo">No</label>
                </div>
              </div>
            </div>
            <div class="modal-step__secondary" id="currentOdometer">
              <h6 class="modal-step__question-title">
                What is your odometer reading (Miles)?
              </h6>
              <div class="
                    modal-step__input modal-step__input--miles
                    custom-input custom-input--s custom-input--dark
                  ">
                <div class="custom-input__field-wr fv-row">
                  <input class="custom-input__field" id="modalMiles" name="odometer" type="text" placeholder="40.031" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal__step modal-step" data-step="2">
          <h6 class="modal-step__title"><span>Step 2.</span> Oil Change</h6>
          <div class="modal-step__heading">
            <h5 class="modal-step__heading-title">Oil Change Reminder</h5>
            <div class="modal-step__heading-desc">
              Never miss an oil change
            </div>
          </div>
          <div class="modal-step__question">
            <div class="modal-step__question-general">
              <h6 class="modal-step__question-title">
                When was your last oil change?
              </h6>
              <div class="modal-step__answers">
                <div class="
                      modal-step__answer-wr
                      custom-radio custom-radio--with-label
                    ">
                  <div class="custom-radio__field-wr">
                    <input class="curstom-radio__field" type="radio" name="oil_change" value="Very recently"
                      checked />
                    <div class="custom-radio__customize"></div>
                  </div>
                  <label class="custom-radio__label">Very recently (In the last month)</label>
                </div>
                <div class="
                      modal-step__answer-wr
                      custom-radio custom-radio--with-label
                    ">
                  <div class="custom-radio__field-wr">
                    <input class="curstom-radio__field" type="radio" name="oil_change" value="Not too long ago" />
                    <div class="custom-radio__customize"></div>
                  </div>
                  <label class="custom-radio__label">Not too long ago (In the past few months)</label>
                </div>
                <div class="
                      modal-step__answer-wr
                      custom-radio custom-radio--with-label
                    ">
                  <div class="custom-radio__field-wr">
                    <input class="curstom-radio__field" type="radio" name="oil_change" value="0" />
                    <div class="custom-radio__customize"></div>
                  </div>
                  <label class="custom-radio__label">I have the exact date (Select the Date)</label>
                </div>
              </div>
            </div>
            <div class="modal-step__secondary" id="selectAddCarDate">
              <h6 class="modal-step__question-title">Select the Date</h6>
              <div class="
                    modal-step__input modal-step__input--date
                    custom-input custom-input--s custom-input--dark
                  ">
                <div class="custom-input__field-wr fv-row">
                  <input class="custom-input__field" name="oildate" type="date" placeholder="00/00/00" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal__step modal-step"  data-step="3">
          <h6 class="modal-step__title">
            <span>Step 3.</span> Tire Rotation
          </h6>
          <div class="modal-step__heading">
            <h5 class="modal-step__heading-title">
              Tire Rotation Reminder
            </h5>
            <div class="modal-step__heading-desc">
              Never miss a tire rotation
            </div>
          </div>
          <div class="modal-step__question">
            <div class="modal-step__question-general">
              <h6 class="modal-step__question-title">
                When was your last tire change?
              </h6>
              <div class="modal-step__answers">
                <div class="
                      modal-step__answer-wr
                      custom-radio custom-radio--with-label
                    ">
                  <div class="custom-radio__field-wr">
                    <input class="curstom-radio__field" type="radio" name="tire_rotation" value="Very recently" checked />
                    <div class="custom-radio__customize"></div>
                  </div>
                  <label class="custom-radio__label">Very recently (In the last month)</label>
                </div>
                <div class="
                      modal-step__answer-wr
                      custom-radio custom-radio--with-label
                    ">
                  <div class="custom-radio__field-wr">
                    <input class="curstom-radio__field" type="radio" name="tire_rotation" value="Not too long ago" />
                    <div class="custom-radio__customize"></div>
                  </div>
                  <label class="custom-radio__label">Not too long ago (In the past few months)</label>
                </div>
                <div class="
                      modal-step__answer-wr
                      custom-radio custom-radio--with-label
                    ">
                  <div class="custom-radio__field-wr">
                    <input class="curstom-radio__field" type="radio" name="tire_rotation" value="0" />
                    <div class="custom-radio__customize"></div>
                  </div>
                  <label class="custom-radio__label">I have the exact date (Select the Date)</label>
                </div>
              </div>
            </div>
            <div class="modal-step__secondary" id="selectRotationDate">
              <h6 class="modal-step__question-title">Select the Date</h6>
              <div class="
                    modal-step__input modal-step__input--date
                    custom-input custom-input--s custom-input--dark
                  ">
                <div class="custom-input__field-wr fv-row">
                  <input class="custom-input__field" name="tiredate" type="date" placeholder="00/00/00" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-step__btns">
          <button class="modal-step__btn modal-step__btn--prev btn btn--accent-border" type="button" id="prevButton">
            Back</button>
          <button class="modal-step__btn modal-step__btn--next btn btn--accent" type="button" id="nextButton">
            Next
          </button>
        </div>

      </form>
      </div>
    </div>
  </div>