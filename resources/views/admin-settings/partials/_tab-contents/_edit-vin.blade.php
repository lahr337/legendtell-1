    <div class="content-tab content-tab--active" id="editVin">
      <section class="service-history">
        <form  name="vinEditForm" id="vinEditForm" method="post" action="javascript:void(0)" enctype="multipart/form-data" >
          @csrf
          <input type="hidden" id="car_id" name="car_id">
         <div class="form-box">


           <div class="form-group">

            <div class="row d-flex align-items-center">
              <div class="col-lg-4 col-12">
                <span class="label-title">
                  <label>VIN:<span class="astrick">*</span></label>
                </span>
              </div>
              <div class="col-lg-8 col-12">
                <span class="input-wrap">
                  <input type="text" class="form-control vin" id="edit_vin" name="vin" value="" readonly>
                  <span class="errorShow vin_error" id="vin_error"></span>
                  </span>
              </div>
            </div>
           </div>

           <div class="form-group">
            <div class="row d-flex align-items-center">
              <div class="col-lg-4 col-12">
                <span class="label-title">
                  <label>Owner First Name: <span class="astrick">*</span></label>
                 </span>
              </div>
               <div class="col-lg-8 col-12">
                <span class="input-wrap">
                  <input type="text" class="form-control owner_firstname txtFirstName" id="edit_owner_firstname" name="ownerfirstname" value="">
                  <span class="errorShow owner_firstname_error" id="owner_firstname_error"></span>
                 </span>
               </div>
            </div>
           </div>

           <div class="form-group">
            <div class="row d-flex align-items-center">
              <div class="col-lg-4 col-12">
                <span class="label-title">
                  <label>Owner Last Name:</label>
                 </span>
              </div>
              <div class="col-lg-8 col-12">
                <span class="input-wrap">
                  <input type="text" class="form-control owner_lastname txtFirstName"  id="edit_owner_lastname" name="ownerlastname">
                 </span>
               </div>
            </div>
           </div>

           <div class="form-group">
            <div class="row d-flex align-items-center">
              <div class="col-lg-4 col-12">
                <span class="label-title">
                  <label>Owner E-mail: <span class="astrick">*</span></label>
                 </span>
              </div>
              <div class="col-lg-8 col-12">
                <span class="input-wrap">
                  <input type="text" class="form-control owner_email" id="edit_owner_email" name="owner_email">
                  <span class="errorShow owner_email_error" id="owner_email_error"></span>
                 </span>
              </div>
            </div>
           </div>

           <div class="form-group">
            <div class="row d-flex align-items-center">
              <div class="col-lg-4 col-12">
                <span class="label-title">
                  <label>Owner Address:</label>
               </span>
              </div>
            <div class="col-lg-8 col-12">
              <span class="input-wrap">
                <input type="text" class="form-control owner_address"  id="edit_owner_address" name="owner_address">
             </span>
            </div>
            </div>
           </div>

           <div class="form-group">
            <div class="row d-flex align-items-center">
              <div class="col-lg-4 col-12">
              <span class="label-title">
                <label>Owner Date:</label>
               </span>
              </div>
              <div class="col-lg-8 col-12">
               <span class="input-wrap">
                <input type="date" class="form-control owner_date"  id="edit_owner_date" name="owner_date">
             </span>
            </div>
            </div>
           </div>

           <div class="form-group" style="display: none">
            <div class="row d-flex align-items-center">
              <div class="col-lg-4 col-12">
           <span class="label-title">
             <label>Service Completed:</label>
            </span>
          </div>
          <div class="col-lg-8 col-12">
            <span class="input-wrap">
             <textarea name="service_completed" class="form-control service_completed"  id="edit_service_completed" ></textarea>
          </span>
          </div>
            </div>
           </div>

           <div class="form-group" style="display: none">
            <div class="row d-flex align-items-center">
              <div class="col-lg-4 col-12">
              <span class="label-title">
                <label>Service done by:</label>
              </span>
          </div>
          <div class="col-lg-8 col-12">
            <span class="input-wrap">
             <input type="text" class="form-control owner_completeservice"  id="edit_owner_completeservice" name="service_done">
            </span>
            </div>
          </div>
        </div>
        <div class="form-group">
            <div class="row d-flex align-items-center">
              <div class="col-lg-4 col-12">
                <span class="label-title">
                  <label>Mileage: <span class="astrick">*</span></label>
                 </span>
              </div>
              <div class="col-lg-8 col-12">
                <span class="input-wrap">
                  <input type="text" class="form-control owner_mileage" id="edit_owner_mileage" name="owner_mileage">
                  <span class="errorShow owner_mileage_error" id="owner_mileage_error"></span>
                 </span>
              </div>
            </div>
           </div>

           <div class="form-group">
            <div class="row d-flex align-items-center">
              <div class="col-lg-4 col-12">
                <span class="label-title">
                  <label>Color: <span class="astrick">*</span></label>
                 </span>
              </div>
              <div class="col-lg-8 col-12">
                <span class="input-wrap">
                  <input type="text" class="form-control owner_color" id="edit_owner_color" name="color">
                  <span class="errorShow owner_color_error" id="owner_color_error"></span>
                 </span>
              </div>
            </div>
           </div>

           <div class="form-group">
             <div class="upload-wrap">
              <div class="row d-flex align-items-center">
                    <div class="col-lg-4 col-12">
                      <button class="btn uplaod" >Upload documents <input type="file" name="products_uploaded[]" id="edit_products_uploaded" class="form-control products_uploaded" value="Upload" multiple="multiple" accept=".pdf,.doc,.docx,image/png,image/jpg,image/jpeg"> </button>
                    </div>

                    <div class="col-lg-8 col-12 text-center display_product_list" id="edit_display_product_list">
                      <ul>

                      </ul>
                    </div>
                  </div>
          </div>
           </div>

        <button class="car-adding__btn btn btn--accent insertvinformadmin" type="submit">SAVE</button>

         </div>
        </form>
    </div>
