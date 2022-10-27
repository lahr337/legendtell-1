<div class="credit-cards__card-item">
    <div class="credit-cards__icon-wr">
        <svg>
            <use xlink:href="{{getCardSvgUrl($payment_method['card']['brand'])}}"></use>
        </svg>
    </div>
    <div class="credit-cards__last-symbols"> {{$payment_method['card']['brand']}} ending in {{$payment_method['card']['exp_year']}} </div>
    <div class="credit-cards__expired">{{sprintf('%02d',$payment_method['card']['exp_month'])}}/{{$payment_method['card']['exp_year']}}</div>
    <div class="credit-cards__buttons">
        <div class="credit-cards__btn-wr">
            <button class="credit-cards__btn btn btn--accent makeDefaultPaymentMethod" style="{{auth()->user()->stripe_default_card_id == $payment_method['id'] ? 'display:none;' : ''}}" type="button" data-url="{{route('account-settings.payment-method.make-default', $db_id)}}" > Make Default </button>
        </div>
        <div class="credit-cards__btn-wr">
            <button class="credit-cards__btn btn btn--accent-border deletePaymentMethod" type="button" data-url="{{route('account-settings.payment-method.delete', $db_id)}}"> Delete </button>
        </div>
    </div>
</div>