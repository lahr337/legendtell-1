<div class="account-settings__content account-settings__content-form {{ $tab == 'mydashboard' ? 'account-settings__content--active' : '' }} settings-form"
    id="mydashboard" >
    @csrf
    @method('put')
    
    <div class="grid-view-shop">

        <div class="settings-form__inner dashboard-tab">
        @include('shop-settings.partials._tabs')
        @include('shop-settings.partials._tab-contents._index') 
        </div>

        <div class="vvn-number">
        <h3>My VIN Numbers </h3>
        
        <ul id="viewVin">
            @foreach($VInGet as $vinList)
            <?php
            $vinid=base64_encode($vinList->id);
            ?>
            {{-- <li><a href="{{route('shop-settings.index-vin',['car_id'=>$vinid])}}">{{$vinList->vin}}</a></li> --}}
            <li><a href="javascript:void(0)" class="getVinNumber" id="{{$vinid}}">{{$vinList->vin}}</a></li>
            @endforeach
           
        </ul>

        <h3>PULL A FULL VIN REPORT</h3>
        <div class="form-group">
            <label>VIN:</label>
            <input type="text" class="form-control">
        </div>
        <button class="btn">ORDER NOW!</button>
        </div>

    </div>

</div>
