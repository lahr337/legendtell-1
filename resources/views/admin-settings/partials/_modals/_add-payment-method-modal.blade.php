<div class="modal modal--add-payment-method modal--default" id="addPaymentMethodModal">
    <div class="modal__inner">
      <button class="modal__close" type="button">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M13.4099 12L17.7099 7.71C17.8982 7.5217 18.004 7.2663 18.004 7C18.004 6.7337 17.8982 6.47831 17.7099 6.29C17.5216 6.1017 17.2662 5.99591 16.9999 5.99591C16.7336 5.99591 16.4782 6.1017 16.2899 6.29L11.9999 10.59L7.70994 6.29C7.52164 6.1017 7.26624 5.99591 6.99994 5.99591C6.73364 5.99591 6.47824 6.1017 6.28994 6.29C6.10164 6.47831 5.99585 6.7337 5.99585 7C5.99585 7.2663 6.10164 7.5217 6.28994 7.71L10.5899 12L6.28994 16.29C6.19621 16.383 6.12182 16.4936 6.07105 16.6154C6.02028 16.7373 5.99414 16.868 5.99414 17C5.99414 17.132 6.02028 17.2627 6.07105 17.3846C6.12182 17.5064 6.19621 17.617 6.28994 17.71C6.3829 17.8037 6.4935 17.8781 6.61536 17.9289C6.73722 17.9797 6.86793 18.0058 6.99994 18.0058C7.13195 18.0058 7.26266 17.9797 7.38452 17.9289C7.50638 17.8781 7.61698 17.8037 7.70994 17.71L11.9999 13.41L16.2899 17.71C16.3829 17.8037 16.4935 17.8781 16.6154 17.9289C16.7372 17.9797 16.8679 18.0058 16.9999 18.0058C17.132 18.0058 17.2627 17.9797 17.3845 17.9289C17.5064 17.8781 17.617 17.8037 17.7099 17.71C17.8037 17.617 17.8781 17.5064 17.9288 17.3846C17.9796 17.2627 18.0057 17.132 18.0057 17C18.0057 16.868 17.9796 16.7373 17.9288 16.6154C17.8781 16.4936 17.8037 16.383 17.7099 16.29L13.4099 12Z"
            fill="#272727" />
        </svg>
      </button>
      <h4 class="modal__title">Add Payment Method</h4>
      <div id="addMethodModalFormContainer" method="POST" action="{{route('account-settings.payment-method.add')}}">
        <form class="account-settings__content account-settings__content-form" id="addMethodModalForm" method="POST" action="{{route('account-settings.payment-method.add')}}">
          @csrf
          <div class="methods-of-payment__fields-side">
            <div class="methods-of-payment__fields-wr">
              <div class="custom-input custom-input--default custom-input--with-label-above methods-of-payment__field">
                <label class="custom-input__label" for="holderName">Cardholder Name*</label>
                <div class="custom-input__field-wr">
                  <input class="custom-input__field" id="holderName" type="text" placeholder="As it Appears on Card" name="cardholder_name" required />
                </div>
              </div>
              <div class="custom-input custom-input--default custom-input--with-label-above methods-of-payment__field">
                <label class="custom-input__label" for="email">Email*</label>
                <div class="custom-input__field-wr">
                  <input class="custom-input__field" id="email" type="email" name="email" required />
                </div>
              </div>
              <div class="custom-input custom-input--default custom-input--with-label-above methods-of-payment__field">
                <label class="custom-input__label" for="billingAddress">Billing Address Line1*</label>
                <div class="custom-input__field-wr">
                  <input class="custom-input__field" id="billingAddress" type="text" name="billing_address1" placeholder="Street Address Line1" required/>
                </div>
              </div>
              <div class="custom-input custom-input--default custom-input--with-label-above methods-of-payment__field">
                <label class="custom-input__label" for="billingAddress">Billing Address Line2</label>
                <div class="custom-input__field-wr">
                  <input class="custom-input__field" id="billingAddress" type="text" name="billing_address2" placeholder="Street Address Line2"/>
                </div>
              </div>
              <div class="custom-input custom-input--default custom-input--with-label-above methods-of-payment__field">
                <label class="custom-input__label" for="cardNumber">Card Number*</label>
                <div class="custom-input__field-wr">
                  <input class="custom-input__field" id="cardNumber" name="card_number" type="text" required />
                </div>
              </div>
              <div class="custom-input custom-input--default custom-input--with-label-above custom-input__field--number methods-of-payment__field">
                <label class="custom-input__label" for="phone">Phone*</label>
                <div class="custom-input__field-wr">
                  <input class="custom-input__field custom-input__field--number" id="phone" type="string" name="phone" placeholder="Phone" required />
                </div>
              </div>
              <div class="custom-input custom-input--default custom-input--with-label-above custom-input__field--number methods-of-payment__field">
                <label class="custom-input__label" for="country">Country*</label>
                <div class="custom-input__field-wr">
                  <input class="custom-input__field custom-input__field--number" id="country" type="string" name="country" placeholder="Country" required />
                </div>
              </div>
              <div class="custom-input custom-input--default custom-input--with-label-above custom-input__field--number methods-of-payment__field">
                <label class="custom-input__label" for="state">State*</label>
                <div class="custom-input__field-wr">
                  <input class="custom-input__field custom-input__field--number" id="state" type="string" name="state" placeholder="State" required />
                </div>
              </div>
              <div class="custom-input custom-input--default custom-input--with-label-above methods-of-payment__field">
                <label class="custom-input__label" for="city">City*</label>
                <div class="custom-input__field-wr">
                  <input class="custom-input__field" id="city" name="city" type="text" placeholder="City" required/>
                </div>
              </div>
              <div class="custom-input custom-input--default custom-input--with-label-above custom-input__field--number methods-of-payment__field">
                <label class="custom-input__label" for="zip">Zip*</label>
                <div class="custom-input__field-wr">
                  <input class="custom-input__field custom-input__field--number" id="zip" type="string" name="zipcode" placeholder="Zip code" required />
                </div>
              </div>
              <div class="custom-input custom-input--default custom-input--with-label-above custom-input__fields-combo methods-of-payment__field">
                <label class="custom-input__label" for="month">Expiration Date*</label>
                <div class="custom-input__field-wr">
                  <select class="custom-input__field" id="month" name="exp_month" required>
                    <option value>Month</option>
                    @foreach(getMonths() as $month_index => $monthname )
                      <option value="{{$month_index+1}}">{{$monthname}}</option>
                    @endforeach
                  </select>
                  <select class="custom-input__field" id="year" name="exp_year" required>
                    <option value>Year</option>
                    @foreach(getNextYears() as $year)
                      <option value="{{$year}}">{{$year}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="custom-input custom-input--default custom-input--half custom-input__field--number custom-input--with-label-above methods-of-payment__field">
                <label class="custom-input__label" for="securityCode">Security Code*</label>
                <div class="custom-input__field-wr">
                  <input class="custom-input__field custom-input__field--number" id="securityCode" type="number" name="cvc" placeholder="CVC" required/>
                </div>
              </div>
              <div class="methods-of-payment__agree">
                <div class="methods-of-payment__check-wr custom-check custom-check--with-label custom-check--xxl">
                  <div class="custom-check__field-wr">
                    <input class="custom-check__field" id="agree" type="checkbox" name="agree" value="1" required />
                    <div class="custom-check__customize" id="agreeCheckbox">
                      <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white"/>
                      </svg>
                    </div>
                  </div>
                </div>
                <label class="methods-of-payment__agree-text" for="agree"
                  >I agree to the <a href="/">Customer Agreement</a> and
                  understand that Legend Tell may not have the complete
                  history of every vehicle</label
                >
              </div>
            </div>
          </div>
          <div class="modal__service-btns">
            <button class="modal__service-btn btn btn--accent" id="addPaymentMethodBtn" type="submit">Add Method</button>
            <button class="modal__service-btn btn btn--accent-border" id="addPaymentMethodCancel" type="button">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>