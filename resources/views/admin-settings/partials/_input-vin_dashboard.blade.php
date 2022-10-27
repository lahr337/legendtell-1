<div class="account-settings__content account-settings__content-form {{ $tab == 'input_vin' ? 'account-settings__content--active' : '' }} settings-form"
    id="input_vin" >
    @csrf
    @method('put')
    
    <div class="grid-view-shop">

        <div class="settings-form__inner dashboard-tab">
        @include('admin-settings.partials._tabs')
        @include('admin-settings.partials._tab-contents._index') 
        </div>

        <div class="vvn-number">
        <h3>My VIN Numbers </h3>
        
        <ul id="viewVin">
           
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