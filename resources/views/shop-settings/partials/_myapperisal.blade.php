<div class="account-settings__content account-settings__content-payment {{ $tab == 'myapperisal' ? 'account-settings__content--active' : '' }} settings-form" id="myapperisal">
    <div class="account-settings__payment-methods payment-methods">

        <div class="myapperisal-box">
            <p>LegendTell takes pride in what the enthusiasts value in their rides! </p>
            <p>Not everyone can appraise the worth of what we cherish vs. the reality of what others see. </p>
            <p>Click below if you have what it takes to help put value to the stories told for e ach ride you see. </p>
            <!-- <a href="{{route('shop-settings.index',['approvedapperisal']) }}">tst
            page</a> -->
            {{-- <a class="btn btn-primary" href="{{ route('shop-settings.apperisal',['1']) }}">REQUEST
                SPECIALTY <br> APPRAISAL FEATURE</a>
            <span class="or">-OR-</span> --}}
            <p>If you specialise in appraising property click below for an APPRAISER account.</p>
            <a class="btn btn-primary" href="{{ route('shop-settings.apperisal',['2']) }}">
                REQUEST <br> APPRAISAL ACCOUNT</a>

        </div>

    </div>


</div>