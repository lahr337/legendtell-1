<div class="account-settings__content account-settings__content-payment settings-form" id="paymentMethods">
    <div class="account-settings__payment-methods payment-methods">
        <div class="block-heading">
            <h2 class="block-heading__title">Payment methods</h2>
        </div>
        <div class="payment-methods__cards-block credit-cards">
            @if(isset($payment_methods['data']) && count($payment_methods['data'])>0)
            <div class="credit-cards__heading">
                <div class="credit-cards__heading-item credit-cards__heading-method"> METHOD </div>
                <div class="credit-cards__heading-item credit-cards__heading-expired"> EXPIRED </div>
            </div>
            <div class="credit-cards__cards-list" id="paymentMethodList">
                @foreach($payment_methods['data'] as $payment_method)
                    @php($db_id = $idByCardIds[$payment_method['id']])
                    @include('account-settings.partials._content._payment-method-item', ['db_id' => $db_id, 'payment_method' => $payment_method])
                @endforeach
            </div>
            @else
                <span>No Payment Methods</span>
            @endif
        </div>
        <button class="payment-methods__add-method btn btn--accent" type="button" id="openAddPaymentMethodModal"> Add payment methods </button>
    </div>
</div>
