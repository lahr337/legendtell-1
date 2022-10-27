<!-- <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script> -->
<style type="text/css">
  .pdf {
    border: 1px solid black;
    direction: ltr;
    height: 400px;
    width: 400px;
  }
</style>
<div class="content-tab" id="WindowSticker">
  <section class="container dashboard-media">
    <div class="section-heading section-heading--justify-between">
      <h1 class="section-heading__title">Window Sticker</h1>
      <div class="
                dashboard-media__heading-btns
                dashboard-media__heading-btns--active
              " id="Sticker--editBtnWr">
        <div></div>
        <button class="dashboard-media__edit-btn btn btn--accent" id="Sticker--editMedia" type="button">
          Edit
        </button>
      </div>
      <div class="dashboard-media__heading-btns" id="Sticker--delBtnWr">
        <button class="dashboard-media__edit-btn btn btn--accent" id="Sticker--deleteMedia" type="button">
          Delete</button><button class="dashboard-media__edit-btn btn btn--accent-border" id="Sticker--cancelMedia" type="button">
          Cancel
        </button>
      </div>
    </div>
    
    <div class="dashboard-media__items-wr" id="Sticker--gallery">
    <?php $i = 0; ?>
@foreach($car->stickers as $stickers)
      @include('cars.partials._tab-contents._window-sticker._items', ['sticker' => $stickers,'i' =>$i])
      <?php $i++; ?>
  @endforeach
    </div>
    <div class="dashboard-media__items-wr">
      <div class="dashboard-media__item empty-media-item">
        <div class="empty-media-item__icon" id="Sticker--addPhotoSvgContainer">
          <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 0C6.72923 0 0 6.72865 0 15C0 23.2713 6.72923 30 15 30C23.2708 30 30 23.2713 30 15C30 6.72865 23.2708 0 15 0ZM15 28.8462C7.36558 28.8462 1.15385 22.6344 1.15385 15C1.15385 7.36558 7.36558 1.15385 15 1.15385C22.6344 1.15385 28.8462 7.36558 28.8462 15C28.8462 22.6344 22.6344 28.8462 15 28.8462Z" fill="#9B9B9B" />
            <path d="M22.2109 14.4231H15.5763V8.07692C15.5763 7.75788 15.3179 7.5 14.9994 7.5C14.6809 7.5 14.4225 7.75788 14.4225 8.07692V14.4231H7.78786C7.4694 14.4231 7.21094 14.681 7.21094 15C7.21094 15.319 7.4694 15.5769 7.78786 15.5769H14.4225V22.5C14.4225 22.819 14.6809 23.0769 14.9994 23.0769C15.3179 23.0769 15.5763 22.819 15.5763 22.5V15.5769H22.2109C22.5294 15.5769 22.7879 15.319 22.7879 15C22.7879 14.681 22.5294 14.4231 22.2109 14.4231Z" fill="#9B9B9B" />
          </svg>
        </div>
        <div id="Sticker--addPhotoLoaderImgContainer" style="display:none;">
          <img src="{{asset('loader.gif')}}" />
        </div>
        <span class="empty-media-item__text">Add window sticker</span><input class="empty-media-item__photo-loader" id="Sticker--photoLoader" type="file" multiple />
      </div>
    </div>
  </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.worker.min.js"></script> -->
<script>
  function aa(){
    // If absolute URL from the remote server is provided, configure the CORS
  // header on that server.

  // Loaded via <script> tag, create shortcut to access PDF.js exports.
  var pdfjsLib = window['pdfjs-dist/build/pdf'];

// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.worker.js';

$(".pdf").each(function() {

console.log($(this).attr('id'));
var data = $(this);
  var id = $(this).attr('id');
  var url_href = $(this).attr('data-url');
  console.log(id);
  console.log(url_href);
// Asynchronous download of PDF
var url = url_href;

var loadingTask = pdfjsLib.getDocument(url);
loadingTask.promise.then(function(pdf) {
  console.log('PDF loaded');

  // Fetch the first page
  var pageNumber = 1;
  pdf.getPage(pageNumber).then(function(page) {
    console.log('Page loaded');

    var scale = 1.5;
    var viewport = page.getViewport({
      scale: scale
    });

    // Prepare canvas using PDF page dimensions
    var canvas = document.getElementById(id);
    var context = canvas.getContext('2d');
    canvas.height = viewport.height;
    canvas.width = viewport.width;

    // Render PDF page into canvas context
    var renderContext = {
      canvasContext: context,
      viewport: viewport
    };
    var renderTask = page.render(renderContext);
    renderTask.promise.then(function() {
      console.log('Page rendered');
    });
  });
}, function(reason) {
  console.error('herewgfdhbf cxbdfvx x',reason);
});
});
  }
aa();
 var len = "{{count($car->stickers)}}";

  $("#Sticker--gallery").bind("DOMSubtreeModified", function() {
    if($(this).find('a').length > len)
    aa();
});

</script>