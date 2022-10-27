    <div class="content-tab" id="appraisal">
      <section class="container appraisal">
        <div class="section-heading">
          <h1 class="section-heading__title">Appraisal</h1>
        </div>
        @php($appraisal = $car->appraisal ?? new App\Models\CarAppraisal)
        <form id="appraisalForm" class="appraisal__form" action="{{route('car.appraisal.update', $car->id)}}" method="POST">
          <div class="appraisal__grid">
            <div class="appraisal__general-form">
              <div class="appraisal__general-field-wr custom-input custom-input--with-label-above custom-input--default">
                <label class="custom-input__label" for="color">Color</label>
                <div class="custom-input__field-wr fv-row">
                  <input class="custom-input__field" id="color" name="color" type="text" placeholder="color" value="{{$appraisal->color ?? old('color')}}" />
                </div>
              </div>
              <div class="appraisal__general-field-wr appraisal__general-field-wr--mileage custom-input custom-input--with-label-above custom-input--default">
                <label class="custom-input__label" for="mileage">Mileage (mi)</label>
                <div class="custom-input__field-wr fv-row">
                  <input class="custom-input__field" id="mileage" name="mileage" type="text" placeholder="Mileage (mi)" value="{{$appraisal->mileage ?? old('mileage')}}" />
                </div>
              </div>
              <div class="appraisal__general-field-wr appraisal__general-field-wr--engine custom-input custom-input--with-label-above custom-input--default">
                <label class="custom-input__label" for="engine">Engine (L)</label>
                <div class="custom-input__field-wr fv-row">
                  <input class="custom-input__field" id="engine" name="engine" type="text" placeholder="Engine (L)" value="{{$appraisal->engine ?? old('engine')}}" />
                </div>
              </div>
              <div class="appraisal__general-field-wr custom-input custom-input--with-label-above custom-input--default">
                <label class="custom-input__label" for="date">Appraisal Date</label>
                <div class="custom-input__field-wr fv-row">
                  <input class="custom-input__field" id="date" name="appraisal_date" type="date" placeholder="Appraisal Date"
                    value="{{ $appraisal->appraisal_date ? $appraisal->appraisal_date->format('Y-m-d') : '' }}" />
                </div>
              </div>
              <div class="appraisal__general-field-wr custom-input custom-input--with-label-above custom-input--default">
                <label class="custom-input__label" for="appraiser">Appraiser</label>
                <div class="custom-input__field-wr fv-row">
                  <input class="custom-input__field" id="appraiser" name="appraiser" type="text" placeholder="Appraiser" value="{{$appraisal->appraiser ?? old('appraiser')}}" />
                </div>
              </div>
              <div class="appraisal__general-field-wr custom-input custom-input--with-label-above custom-input--default">
                <label class="custom-input__label" for="marketVal">Market Value</label>
                <div class="custom-input__field-wr fv-row">
                  <input class="custom-input__field" id="marketVal" name="market_value" type="text" placeholder="Market Value" value="{{$appraisal->market_value ?? old('market_value')}}" />
                </div>
              </div>
              <div class="appraisal__general-field-wr custom-input custom-input--with-label-above custom-input--default">
                <label class="custom-input__label" for="appraisalVal">Appraisal Value</label>
                <div class="custom-input__field-wr fv-row">
                  <input class="custom-input__field" id="appraisalVal" name="appraisal_value" type="text" placeholder="Appraisal Value" value="{{$appraisal->appraisal_value ?? old('appraisal_value')}}" />
                </div>
              </div>
            </div>
            @php($conditions = $car->conditions->keyBy('text')->toArray())
            <div class="appraisal__checks-wr">
              <div class="appraisal__checks appraisal-checks">
                <div class="appraisal-checks__item appraisal-checks__heading-item"></div>
                <div class="appraisal-checks__item appraisal-checks__heading-item">OK</div>
                <div class="appraisal-checks__item appraisal-checks__heading-item">DAMAGED</div>
                <div class="appraisal-checks__item appraisal-checks__heading-item">OTHER</div>
                @foreach(config('cars.conditions') as $condition_name)
                  <div class="appraisal-checks__item">{{ucwords( str_replace('_',' ',$condition_name))}}</div>
                  <div class="appraisal-checks__item">
                    <div class="appraisal-checks__check-wr custom-check custom-check--with-label custom-check--xl">
                      <div class="custom-check__field-wr">
                        <input class="custom-check__field" id="wheelsOk" type="checkbox" value="1" name="condition[{{$condition_name}}][ok]" {{ isset($conditions[$condition_name]['ok']) && $conditions[$condition_name]['ok']==1 ? 'checked=checked' : ''}} />
                        <div class="custom-check__customize">
                          <svg width="13" height="14" viewBox="0 0 13 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="appraisal-checks__item">
                    <div class="appraisal-checks__check-wr custom-check custom-check--with-label custom-check--xl">
                      <div class="custom-check__field-wr">
                        <input class="custom-check__field" id="wheelsDamaged" type="checkbox" value="1" name="condition[{{$condition_name}}][damaged]" {{ isset($conditions[$condition_name]['damaged']) && $conditions[$condition_name]['damaged']==1 ? 'checked=checked' : ''}} />
                        <div class="custom-check__customize">
                          <svg width="13" height="14" viewBox="0 0 13 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="appraisal-checks__item">
                    <div class="custom-input custom-input--xs">
                      <div class="custom-input__field-wr">
                        <input class="custom-input__field" type="text" name="condition[{{$condition_name}}][other]" value="{{isset($conditions[$condition_name]['other']) ? $conditions[$condition_name]['other'] : ''}}" />
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <button class="appraisal__submit btn btn--accent" id="AppraisalSubmitBtn" type="button">
            Save
            <div class="changes-saved__icon-wr" id="successIndicator" style="display:none;">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.5 0C3.3645 0 0 3.3645 0 7.5C0 11.6355 3.3645 15 7.5 15C11.6355 15 15 11.6355 15 7.5C15 3.3645 11.6355 0 7.5 0ZM7.5 13.6364C4.11636 13.6364 1.36364 10.8836 1.36364 7.5C1.36364 4.11641 4.11636 1.36364 7.5 1.36364C10.8836 1.36364 13.6364 4.11641 13.6364 7.5C13.6364 10.8836 10.8836 13.6364 7.5 13.6364Z"
                            fill="#6AC355" />
                        <path
                            d="M10.3122 4.84836L6.45516 8.70531L4.68743 6.93754C4.4212 6.67132 3.98948 6.67127 3.7232 6.9375C3.45693 7.20377 3.45693 7.63545 3.7232 7.90172L5.97303 10.1516C6.10089 10.2795 6.2743 10.3514 6.45512 10.3514C6.45516 10.3514 6.45512 10.3514 6.45516 10.3514C6.63598 10.3514 6.80939 10.2795 6.93726 10.1517L11.2764 5.81263C11.5427 5.54636 11.5427 5.11468 11.2764 4.84841C11.0101 4.58214 10.5784 4.58209 10.3122 4.84836Z"
                            fill="#6AC355" />
                    </svg>
                </div>
          </button>
        </form>
      </section>
    </div>