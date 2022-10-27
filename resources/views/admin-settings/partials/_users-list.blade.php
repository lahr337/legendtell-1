<div class="account-settings__content account-settings__content-form {{ $tab == 'user_edit' ? 'account-settings__content--active' : '' }} settings-form"
    id="user_edit" action="{{route('admin-settings.add-services')}}" method="POST" accept-charset="multipart/form-data">
  
  

  <div id="content">
    <iframe class="responsive-iframe" width="100%" height="700px" frameborder="0" src="{{route('account-settings.index',['editProfile'])}}"></iframe>
     {{-- @include('account-settings.index') --}}
</div>
</div>
