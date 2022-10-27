<form class="account-settings__content account-settings__content-form {{ $tab == 'myshopServices' ? 'account-settings__content--active' : '' }} settings-form"
    id="myshopServices" action="{{route('admin-settings.add-services')}}" method="POST" accept-charset="multipart/form-data">
    @csrf
    @method('post')
    <div class="container">
        <div class="row" id="addformclose" style="display:none">
            <div class="col-md-12">
                <div class="
                custom-input    
                custom-input--default
                custom-input--with-label-above
                settings-form__field settings-form__field--service-name
                ">
                <input type="hidden" id="service_inputid" name="service_id" value="">
                    <label class="custom-input__label" for="serviceName">Services Name<span class="astrik">*</span></label>
                    <div class="custom-input__field-wr fv-row">
                        <input class="custom-input__field" id="serviceName" name="service_name" type="text" placeholder="Enter Services"  />
                    </div>
                    <span class="error" id="servicenameError" >Enter Service Name & Minium 3 Words</span>
                </div>
            </div>
            <div class="col-md-12 btnservice">
                <button class="settings-form__submit-btn btn btn--accent" id="kt_edit_services_submit" type="submit"> Add Services </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped serviceTable" id="serviceTable" >
                    <thead>
                      <tr>
                        <th class="servicecls" scope="col">#</th>
                        <th class="servicecls" scope="col">Service Name</th>
                        <th class="servicecls" scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody  id="newserviceadd">
                        <?php $sr=1; ?>
                        @if(!empty($servicesData) && $servicesData->count())
                        @foreach($servicesData as $servicelist)
                      <tr id="setdata{{$servicelist->service_id}}">
                        <td scope="row">{{$servicelist->service_id}}</td>
                        <td>{{ucwords($servicelist->service_name)}}</td>
                        <td><button class="btn--accent servicebtn" type="button" id="{{$servicelist->service_id}}" >Edit</button></td>
                       
                      </tr>
                      @endforeach
                      @else
                    <tr>
                        <td colspan="10">There are no services.</td>
                    </tr>
                @endif
                      
                    </tbody>
                  </table>  
                 
            </div>
        </div>
    </div>
  
</form>
