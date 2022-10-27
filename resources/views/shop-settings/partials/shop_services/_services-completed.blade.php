@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
                <div class="account-settings__content-form">
            <div class="grid-view-shop">
            <div class="common-wrap">
    <div class="cmn-content">
      
        <h3 class="cmn-title">Select Service Completed</h3>
        <ul class="services-c">
            @foreach($SelectServices as $listservice)
            <li>
                @if($listservice->service_name == "Car-Wash")
                <a href="/shop-settings/car-wash-self-serve?servicedata={{base64_encode($vinid.'%%%'.$listservice->service_id)}}&service_name=Self-serve" class="active">{{ucwords($listservice->service_name)}}</a>
                @else
               <a href="/shop-settings/shop-issue-repair/?issueServiceid={{base64_encode($vinid.'%%%'.$listservice->service_id)}}" class="active">{{ucwords($listservice->service_name)}}</a>
                @endif
            </li>
            @endforeach
           
        </ul>
    </div>
</div>
            @include('shop-settings.partials.rightvinnumber')
</div>
</div>
</div>
</main>
@endsection
