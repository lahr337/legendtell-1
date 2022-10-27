
<a class="dashboard-media__item full-media-item" href="{{$sticker->url}}">
    <img class="full-media-item__img" src="{{$sticker->url}}" alt="alt" />
    <div class="dashboard-media__check custom-check custom-check--media">
    <div class="custom-check__field-wr">
        <input class="custom-check__field" type="checkbox" name="sticker" value="{{$sticker->id}}" />
        <div class="custom-check__customize">
        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 8.17949L8.6 15L15 1" stroke="#272727" stroke-width="2" />
        </svg>
        </div>
    </div>
    </div>
</a>