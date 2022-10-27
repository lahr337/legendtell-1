<div class="modal modal--add-car modal--default" id="addServiceRecordModal">
    <div class="modal__inner">
      <button class="modal__close" type="button">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M13.4099 12L17.7099 7.71C17.8982 7.5217 18.004 7.2663 18.004 7C18.004 6.7337 17.8982 6.47831 17.7099 6.29C17.5216 6.1017 17.2662 5.99591 16.9999 5.99591C16.7336 5.99591 16.4782 6.1017 16.2899 6.29L11.9999 10.59L7.70994 6.29C7.52164 6.1017 7.26624 5.99591 6.99994 5.99591C6.73364 5.99591 6.47824 6.1017 6.28994 6.29C6.10164 6.47831 5.99585 6.7337 5.99585 7C5.99585 7.2663 6.10164 7.5217 6.28994 7.71L10.5899 12L6.28994 16.29C6.19621 16.383 6.12182 16.4936 6.07105 16.6154C6.02028 16.7373 5.99414 16.868 5.99414 17C5.99414 17.132 6.02028 17.2627 6.07105 17.3846C6.12182 17.5064 6.19621 17.617 6.28994 17.71C6.3829 17.8037 6.4935 17.8781 6.61536 17.9289C6.73722 17.9797 6.86793 18.0058 6.99994 18.0058C7.13195 18.0058 7.26266 17.9797 7.38452 17.9289C7.50638 17.8781 7.61698 17.8037 7.70994 17.71L11.9999 13.41L16.2899 17.71C16.3829 17.8037 16.4935 17.8781 16.6154 17.9289C16.7372 17.9797 16.8679 18.0058 16.9999 18.0058C17.132 18.0058 17.2627 17.9797 17.3845 17.9289C17.5064 17.8781 17.617 17.8037 17.7099 17.71C17.8037 17.617 17.8781 17.5064 17.9288 17.3846C17.9796 17.2627 18.0057 17.132 18.0057 17C18.0057 16.868 17.9796 16.7373 17.9288 16.6154C17.8781 16.4936 17.8037 16.383 17.7099 16.29L13.4099 12Z"
            fill="#272727" />
        </svg>
      </button>
      <h4 class="modal__title">Add Service Record</h4>
      <a class="modal__add-service-link" href="/"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0_63_1889)">
            <path
              d="M13.6329 6.1309H8.86382V1.3658C8.86382 0.611537 8.25525 0 7.50099 0C6.74673 0 6.1385 0.611537 6.1385 1.36613V6.1342H1.36712C0.612859 6.1342 -0.000329846 6.74574 5.36408e-07 7.50033C-0.000329846 7.8773 0.151976 8.22288 0.398772 8.46967C0.645897 8.71713 0.986851 8.8734 1.36349 8.8734H6.1385V13.6349C6.1385 14.0122 6.28816 14.3538 6.53529 14.6002C6.78241 14.8474 7.12237 15.0003 7.49967 15.0003C8.2536 15.0003 8.86382 14.3888 8.86382 13.6349V8.87307H13.6329C14.3871 8.87307 14.9987 8.25624 14.9983 7.50198C14.998 6.74805 14.3865 6.1309 13.6329 6.1309Z"
              fill="#0077C6" />
          </g>
          <defs>
            <clipPath id="clip0_63_1889">
              <rect width="15" height="15" fill="white" />
            </clipPath>
          </defs>
        </svg><span>Add Service Shop </span></a>

      <form id="addCarServiceModal" method="POST" action="{{route('car.add-service', $car->id)}}">
        @csrf
        <div class="modal__service-fields">
          <div class="
                modal__service-input
                custom-input custom-input--sm custom-input--dark
              ">
            <label class="custom-input__label">Date of service*</label>
            <div class="custom-input__field-wr fv-row">
              <input class="custom-input__field" name="date" type="date" placeholder="00/00/0000" />
            </div>
          </div>
          <div class="
                modal__service-input
                custom-input custom-input--sm custom-input--dark
              ">
            <label class="custom-input__label">Odometer at Service*</label>
            <div class="custom-input__field-wr fv-row">
              <input class="custom-input__field" id="modalMiles" name="odometer" type="text" />
            </div>
          </div>
        </div>
        <div class="modal__service-select service-select" id="serviceSelect">
          <div class="service-select__label">
            Select services you’ve completed
          </div>
          <!-- <div class="service-select__inner">
            <div class="service-select__heading" id="serviceSelectHeading">
              Add other services
              <div class="service-select__arrow">
                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 1L5 5L9 1" stroke="#272727" />
                </svg>
              </div>
            </div>
            <div class="service-select__select-list" id="serviceSelectList">
              <div class="service-select__select-inner">
                <div class="
                      service-select__check
                      custom-check custom-check--with-label custom-check--md
                    ">
                  <div class="custom-check__field-wr">
                    <input class="custom-check__field" id="firstcheck" type="checkbox" name="selectfield" />
                    <div class="custom-check__customize">
                      <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                      </svg>
                    </div>
                  </div>
                  <label class="custom-check__label" for="firstcheck">Oil and filter changed</label>
                </div>
                <div class="
                      service-select__check
                      custom-check custom-check--with-label custom-check--md
                    ">
                  <div class="custom-check__field-wr">
                    <input class="custom-check__field" id="secondcheck" type="checkbox" name="selectfield" />
                    <div class="custom-check__customize">
                      <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                      </svg>
                    </div>
                  </div>
                  <label class="custom-check__label" for="secondcheck">Oil and filter changed</label>
                </div>
                <div class="
                      service-select__check
                      custom-check custom-check--with-label custom-check--md
                    ">
                  <div class="custom-check__field-wr">
                    <input class="custom-check__field" id="thirdcheck" type="checkbox" name="selectfield" />
                    <div class="custom-check__customize">
                      <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                      </svg>
                    </div>
                  </div>
                  <label class="custom-check__label" for="thirdcheck">Oil and filter changed</label>
                </div>
                <div class="
                      service-select__check
                      custom-check custom-check--with-label custom-check--md
                    ">
                  <div class="custom-check__field-wr">
                    <input class="custom-check__field" id="fourthcheck" type="checkbox" name="selectfield" />
                    <div class="custom-check__customize">
                      <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                      </svg>
                    </div>
                  </div>
                  <label class="custom-check__label" for="fourthcheck">Oil and filter changed</label>
                </div>
                <div class="
                      service-select__check
                      custom-check custom-check--with-label custom-check--md
                    ">
                  <div class="custom-check__field-wr">
                    <input class="custom-check__field" id="fiftcheck" type="checkbox" name="selectfield" />
                    <div class="custom-check__customize">
                      <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                      </svg>
                    </div>
                  </div>
                  <label class="custom-check__label" for="fiftcheck">Oil and filter changed</label>
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <div class="modal__service-checks-wr fv-row">
          <div class="
                modal__service-check
                custom-check custom-check--with-label custom-check--md
              ">
            <div class="custom-check__field-wr">
              <input class="custom-check__field" id="someCheckId" type="checkbox" name="completed[]" value="oil and filter changed" />
              <div class="custom-check__customize">
                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                </svg>
              </div>
            </div>
            <label class="custom-check__label" for="someCheckId">Oil and filter changed</label>
          </div>
          <div class="
                modal__service-check
                custom-check custom-check--with-label custom-check--md
              ">
            <div class="custom-check__field-wr">
              <input class="custom-check__field" id="someCheckIdSecond" type="checkbox" name="completed[]" value="safety inspection perfomed" />
              <div class="custom-check__customize">
                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                </svg>
              </div>
            </div>
            <label class="custom-check__label" for="someCheckIdSecond">Safety inspection perfomed</label>
          </div>
          <div class="
                modal__service-check
                custom-check custom-check--with-label custom-check--md
              ">
            <div class="custom-check__field-wr">
              <input class="custom-check__field" id="someCheckIdThird" type="checkbox" name="completed[]" value="emissions inspection perfomed" />
              <div class="custom-check__customize">
                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                </svg>
              </div>
            </div>
            <label class="custom-check__label" for="someCheckIdThird">Emissions inspection perfomed</label>
          </div>
          <div class="
                modal__service-check
                custom-check custom-check--with-label custom-check--md
              ">
            <div class="custom-check__field-wr">
              <input class="custom-check__field" id="someCheckIdFourth" type="checkbox" name="completed[]" value="tires rotated" />
              <div class="custom-check__customize">
                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                </svg>
              </div>
            </div>
            <label class="custom-check__label" for="someCheckIdFourth">Tires rotated</label>
          </div>
        </div>
        <div class="modal__service-btns">
          <button class="modal__service-btn btn btn--accent" id="addServiceRecordBtn" type="submit">
            Add Record</button><button class="modal__service-btn btn btn--accent-border" id="addServiceRecordCancel"
            type="button">
            Cancel
          </button>
        </div>
      </form>
    </div>
  </div>