<div class="reports-payment__step reports-payment__step--active">
    <div class="reports-payment__step-heading section-heading">
        <h2 class="section-heading__title">
        <span>Step 1.</span> Select your package
        </h2>
    </div>
    <div class="reports-payment__step-content reports-payment__step-content--plans" id="plans">
        @foreach($plans as $plan)
            <article class="reports-payment__plan-item plan-item plan-item--{{$plan->name}}">
                <div class="plan-item__label plan-label">
                <div class="plan-label__color-line"><h4>{{ ucwords($plan->name) }}</h4></div>
                </div>
                <span class="plan-item__reports-count">{{$plan->allow_reports}} reports</span>
                <span class="plan-item__price">${{$plan->price}}</span>
                <a class="plan-item__select-btn btn btn--accent btn--full-width" href="/" data-plan_id="{{$plan->id}}">Select plan</a>
                <span class="plan-item__per-one-price">${{$plan->price/$plan->allow_reports}} per one</span>
                <img class="plan-item__payment-methods-img" src="/assets/images/reports-payment-page/payment-methods.png" alt="altl"/>
            </article>
        @endforeach
    </div>
</div>