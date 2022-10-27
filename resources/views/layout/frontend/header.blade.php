@if(auth()->check())
    @include('layout.frontend._header.auth.mobile')
    @include('layout.frontend._header.auth.web')
@else
    @include('layout.frontend._header.default.mobile')
    @include('layout.frontend._header.default.web')
@endif