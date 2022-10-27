<div class="account-settings__content account-settings__content-form {{ $tab == 'pendingapprasial' ? 'account-settings__content--active' : '' }} settings-form"
    id="pendingapprasial" action="{{route('admin-settings.add-services')}}" method="POST" accept-charset="multipart/form-data">
  
  

  <div id="content">
 
  <div class="container">
      <div class="row">
          <div class="col-12 col-md-6">
              {{-- img1 --}}
            <div class="account-avatar__photo-wr">
                    
                <img class="account-avatar__img shoplogoimg" id="shoplogoimg" src="{{asset('avatar.jpg')}}" alt="alt" />
            </div>
             {{-- img2 --}}
            <div class="account-avatar__photo-wr">
                    
                <img class=" avatarImg" id="shopphotoimg" src="{{asset('/shop_photo.png')}}" alt="alt" />
            </div>
            {{-- img content --}}
            <ul>
                <li id="apperisalRequest"><li>
                <li id="shopname"><li>
                <li id="shopaddress"><li>
                <li id="shopphone"><li>
                <li id="shopemail"><li>
                
                    
            </ul>
            <button class="btn btn-primary approveshop" id="approveshop" type="button" style="display:none">Approve</button>
            {{-- end img content --}}
          </div>
          <div class="col-12 col-md-6">
            <h3>Requests in Que</h3>
          <ul> 
              @foreach($shopApperisal as $shoplist)
              <li id="rm-{{$shoplist->id}}"><span class="getpendingshopdata" id="{{$shoplist->id}}">Shop Name : {{ucwords($shoplist['shopapperisalRequest']['first_name'])}} - Phone No : {{ucwords($shoplist['shopapperisalRequest']['contact_number'])}} </span></li>
              @endforeach
          </ul>
            
          </div>
      </div>
  </div>
</div>
</div>
