    <div class="content-tab" id="media">
      <section class="container dashboard-media">
        <div class="section-heading section-heading--justify-between">
          <h1 class="section-heading__title">Video & Photos</h1>
          <div class="
                dashboard-media__heading-btns
                dashboard-media__heading-btns--active
              " id="editBtnWr">

            <button class="dashboard-media__edit-btn btn btn--accent" id="defaultMedia" type="button">
              Default
            </button>
            <button class="dashboard-media__edit-btn btn btn--accent" id="editMedia" type="button">
              Edit
            </button>
          </div>
          <div class="dashboard-media__heading-btns" id="delBtnWr">
            <button class="dashboard-media__edit-btn btn btn--accent" id="deleteMedia" type="button">
              Delete</button><button class="dashboard-media__edit-btn btn btn--accent-border" id="cancelMedia"
              type="button">
              Cancel 
            </button>
          </div>
          <div class="dashboard-media__heading-btns" id="defaultBtnWr">
            <button class="dashboard-media__edit-btn btn btn--accent" id="setDefaultMedia" type="button">Set</button>
            <button class="dashboard-media__edit-btn btn btn--accent-border" id="cancelMarkMedia" type="button">Cancel</button>
          </div>
        </div>
        <div class="dashboard-media__items-wr" id="gallery">
          @foreach($car->medias as $media)
            @include('cars.partials._tab-contents._media._items', ['media' => $media])
          @endforeach
        </div>
        <div class="dashboard-media__items-wr">
          <div class="dashboard-media__item empty-media-item">
              <div class="empty-media-item__icon" id="addPhotoSvgContainer">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15 0C6.72923 0 0 6.72865 0 15C0 23.2713 6.72923 30 15 30C23.2708 30 30 23.2713 30 15C30 6.72865 23.2708 0 15 0ZM15 28.8462C7.36558 28.8462 1.15385 22.6344 1.15385 15C1.15385 7.36558 7.36558 1.15385 15 1.15385C22.6344 1.15385 28.8462 7.36558 28.8462 15C28.8462 22.6344 22.6344 28.8462 15 28.8462Z" fill="#9B9B9B"/>
                  <path d="M22.2109 14.4231H15.5763V8.07692C15.5763 7.75788 15.3179 7.5 14.9994 7.5C14.6809 7.5 14.4225 7.75788 14.4225 8.07692V14.4231H7.78786C7.4694 14.4231 7.21094 14.681 7.21094 15C7.21094 15.319 7.4694 15.5769 7.78786 15.5769H14.4225V22.5C14.4225 22.819 14.6809 23.0769 14.9994 23.0769C15.3179 23.0769 15.5763 22.819 15.5763 22.5V15.5769H22.2109C22.5294 15.5769 22.7879 15.319 22.7879 15C22.7879 14.681 22.5294 14.4231 22.2109 14.4231Z" fill="#9B9B9B"/>
                </svg>
              </div>
              <div id="addPhotoLoaderImgContainer" style="display:none;">
                <img src="{{asset('loader.gif')}}" />
              </div>
              <span class="empty-media-item__text">Add photo or video</span
              ><input class="empty-media-item__photo-loader" id="photoLoader" type="file" multiple />
          </div>
        </div>
      </section>
    </div>