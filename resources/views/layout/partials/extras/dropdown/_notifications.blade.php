{{-- Header --}}
@if (config('layout.extras.notifications.dropdown.style') == 'light')
    <div class="d-flex flex-column pt-12 bg-dark-o-5 rounded-top">
        {{-- Title --}}
        <h4 class="d-flex flex-center">
            <span class="text-dark">User Notifications</span>
            @if($noti_read_count>0)
                <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">{{$noti_read_count}} new</span>
            @endif
        </h4>
    </div>
@else
    <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url('{{ asset('/media/misc/bg-1.jpg') }}')">
        {{-- Title --}}
        <h4 class="d-flex flex-center rounded-top">
            <span class="text-white">User Notifications</span>
            @if($noti_read_count>0)
                <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">{{$noti_read_count}} new</span>
            @endif
        </h4>
    </div>
@endif

{{-- Content --}}
<div class="tab-content">
    {{-- Tabpane --}}
    {{-- Scroll --}}

    @if($notifications->count()>0)
        {{-- Nav --}}
        <div class="navi navi-hover scroll my-4" data-scroll="true" data-height="300" data-mobile-height="200">
            @foreach($notifications as $notification)
                {{-- Item --}}
                <a href="{{$notification->link}}" class="navi-item">
                    <div class="navi-link">
                        <div class="navi-icon mr-2">
                            <i class="flaticon2-user flaticon2-line- text-success"></i>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold">
                                {{$notification->message}}
                            </div>
                            <div class="text-muted">
                                sent by <i class="font-weight-bold">{{$notification->sender->name}}</i>
                            </div>
                            <div class="text-muted">
                                {{$notification->created_at->diffForHumans()}}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
            
        </div>    
    @else
        {{-- No New Notification --}}
        <div class="d-flex flex-center text-center text-muted min-h-200px">
            No new notifications.
        </div>
    @endif

</div>
