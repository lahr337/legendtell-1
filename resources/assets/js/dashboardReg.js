import '@styles/dashboard-reg.scss'

import './utils/generalModules'
import './modules/dashboard-slider'

import './modules/dashboard-general-tabs'
import './modules/dashboard-content-tabs'

import lightGallery from 'lightgallery'
import lgThumbnail from 'lightgallery/plugins/thumbnail'
import lgZoom from 'lightgallery/plugins/zoom'
import AjaxCall from './classes/AjaxCall'

// document.getElementById('gallery').addEventListener('click', e => {
//     if ( e.target.closest('.dashboard-media__check') ) {
//         e.preventDefault()
//     }
// })

function initGallery({
    checkBoxInput,
    radioBoxInput,
    uploadType,
    galleryID,
    photoLoaderID,
    editBtnWrID,
    delBtnWrID,
    editMediaID,
    cancelMediaID,
    deleteMedia,
    uploadUrl,
    deleteUrl,
    addPhotoSvgContainer,
    addPhotoLoaderImgContainer,
    defaultMediaID,
    defaultBtnWr,
    setDefaultMedia,
    cancelMarkMedia,
    defaultUrl
}){
    let gallery = lightGallery(galleryID, {
        plugins: [lgZoom, lgThumbnail],
        speed: 500,
    })

    // $('.empty-media-item').data('lg-id',"")

    function buttonShowLoader(hasShow = false){
        if(hasShow){
            $(addPhotoSvgContainer).hide()
            $(addPhotoLoaderImgContainer).show()
        } else {
            $(addPhotoSvgContainer).show()
            $(addPhotoLoaderImgContainer).hide()
        }
    }


    photoLoaderID.addEventListener('change', function(event){
        var files = event.target.files; //FileList object
        var formData = new FormData();
        formData.append('type', uploadType);
        formData.append('car_id', carId);
        for(let i in files) formData.append('files[]', files[i]);
        buttonShowLoader(true);
        AjaxCall.formMultiData(uploadUrl, 'POST', formData, function(response){
            // console.log('...response', response);
            // gallery.destroy()
            galleryID.innerHTML += response;
            galleryID.classList.remove('dashboard-media__items-wr--checks')
            gallery = lightGallery(galleryID, {
                plugins: [lgZoom, lgThumbnail],
                speed: 500,
            })

            editBtnWrID.classList.add('dashboard-media__heading-btns--active')
            delBtnWrID.classList.remove('dashboard-media__heading-btns--active')
            toastr.success('add media successfully!', 'Media');
            buttonShowLoader(false);
        },function(error){
            toastr.success('fail to add!', 'Media');
            buttonShowLoader(false);
        });
    });

    defaultMediaID && defaultMediaID.addEventListener('click', e => {
        galleryID.classList.add('dashboard-media__items-wr--radios')
        gallery.destroy()
        editBtnWrID.classList.remove('dashboard-media__heading-btns--active')
        defaultBtnWr.classList.add('dashboard-media__heading-btns--active')
    })


    editMediaID.addEventListener('click', e => {
        galleryID.classList.add('dashboard-media__items-wr--checks')
        gallery.destroy()
        editBtnWrID.classList.remove('dashboard-media__heading-btns--active')
        delBtnWrID.classList.add('dashboard-media__heading-btns--active')

    })
    galleryID &&
    galleryID.addEventListener('click', e => {
        if ( !e.target.closest('.custom-check--media') && !e.target.closest('.custom-radio--media') ) e.preventDefault()
    })

    cancelMediaID.addEventListener('click', () => {
        galleryID.classList.remove('dashboard-media__items-wr--checks')
        gallery = lightGallery(galleryID, {
            plugins: [lgZoom, lgThumbnail],
            speed: 500,
        })
        editBtnWrID.classList.add('dashboard-media__heading-btns--active')
        delBtnWrID.classList.remove('dashboard-media__heading-btns--active')
    })

    cancelMarkMedia && cancelMarkMedia.addEventListener('click', () => {
        galleryID.classList.remove('dashboard-media__items-wr--radios')
        gallery = lightGallery(galleryID, {
            plugins: [lgZoom, lgThumbnail],
            speed: 500,
        })
        editBtnWrID.classList.add('dashboard-media__heading-btns--active')
        defaultBtnWr.classList.remove('dashboard-media__heading-btns--active')
    })

    setDefaultMedia && setDefaultMedia.addEventListener('click', () => {
        // media
        var media_id = $(`${radioBoxInput}:checked`).val()
        if(media_id != ''){
           
            Swal.fire({
                title: 'Default!',
                text: 'Do you want to set default',
                icon: 'success',
                confirmButtonText: 'Yes',
                showCancelButton: true,
                cancelButtonText: 'No',
            }).then((status)=>{
                if (status.isConfirmed) {
                    AjaxCall.formData(defaultUrl, 'POST', {media_id, car_id: carId}, function(response){
                        toastr.success('media deleted successfully!', 'Media');
                    }, function(error){

                    });
                }
            })

        } else {

            Swal.fire({
                title: 'Default!',
                text: 'Require at least one check mark',
                icon: 'error',
                confirmButtonText: 'Ok',
            })
        }
    })

    deleteMedia.addEventListener('click', () => {
        // media
        var checkboxes = $(`${checkBoxInput}:checked`).toArray()
        var deletable_ids = checkboxes.map((ele)=>{
            return $(ele).val();
        });

        if(deletable_ids.length>0){

            Swal.fire({
                title: 'Delete!',
                text: 'Do you want to delete',
                icon: 'error',
                confirmButtonText: 'Yes',
                showCancelButton: true,
                cancelButtonText: 'No',
            }).then((status)=>{
                if (status.isConfirmed) {
                    AjaxCall.formData(deleteUrl, 'POST', {deletable_ids, type:uploadType, car_id: carId}, function(response){
                        for(let i in checkboxes){
                            $(checkboxes[i]).closest('.dashboard-media__item.full-media-item').remove();
                        }
                        toastr.success('media deleted successfully!', 'Media');
                    }, function(error){

                    });
                }
            })

        } else {

            Swal.fire({
                title: 'Delete!',
                text: 'Require at least one check mark',
                icon: 'error',
                confirmButtonText: 'Ok',
            })
        }
    });
}

initGallery({
    checkBoxInput                   :'input[name="media"]',
    radioBoxInput                   :'input[name="default_media"]',
    uploadType                      :'carmedia',
    galleryID                       :document.getElementById('gallery'),
    photoLoaderID                   :document.getElementById('photoLoader'),
    editBtnWrID                     :document.getElementById('editBtnWr'),
    delBtnWrID                      :document.getElementById('delBtnWr'),
    editMediaID                     :document.getElementById('editMedia'),
    cancelMediaID                   :document.getElementById('cancelMedia'),
    deleteMedia                     :document.getElementById('deleteMedia'),
    addPhotoSvgContainer            :document.getElementById('addPhotoSvgContainer'),
    addPhotoLoaderImgContainer      :document.getElementById('addPhotoLoaderImgContainer'),
    defaultMediaID                  :document.getElementById('defaultMedia'),
    defaultBtnWr                    :document.getElementById('defaultBtnWr'),
    setDefaultMedia                 :document.getElementById('setDefaultMedia'),
    cancelMarkMedia                 :document.getElementById('cancelMarkMedia'),
    uploadUrl                       :'/car/media/uploads',
    deleteUrl                       :'/car/media/delete',
    defaultUrl                      :'/car/set/default/picture',
});

initGallery({
    checkBoxInput                   :'input[name="sticker"]',
    uploadType                      :'carsticker',
    galleryID                       :document.getElementById('Sticker--gallery'),
    photoLoaderID                   :document.getElementById('Sticker--photoLoader'),
    editBtnWrID                     :document.getElementById('Sticker--editBtnWr'),
    delBtnWrID                      :document.getElementById('Sticker--delBtnWr'),
    editMediaID                     :document.getElementById('Sticker--editMedia'),
    cancelMediaID                   :document.getElementById('Sticker--cancelMedia'),
    deleteMedia                     :document.getElementById('Sticker--deleteMedia'),
    addPhotoSvgContainer            :document.getElementById('Sticker--addPhotoSvgContainer'),
    addPhotoLoaderImgContainer      :document.getElementById('Sticker--addPhotoLoaderImgContainer'),
    defaultMediaID                  :document.getElementById('Sticker--defaultMedia'),
    defaultBtnWr                    :document.getElementById('Sticker--defaultBtnWr'),
    setDefaultMedia                 :document.getElementById('Sticker--setDefaultMedia'),
    cancelMarkMedia                 :document.getElementById('Sticker--cancelMarkMedia'),
    uploadUrl                       :'/car/sticker/uploads',
    deleteUrl                       :'/car/sticker/delete',
});


import './modules/dashboardModals'
import './modules/service-select'
import './modules/DashboardAppraisal'

const RemoveCarId = document.getElementById('RemoveCarId');

RemoveCarId && RemoveCarId.addEventListener('click', function(e){
    e.preventDefault();
    Swal.fire({
        title: 'Delete!',
        text: 'Do you want to delete this car',
        icon: 'error',
        confirmButtonText: 'Yes',
        showCancelButton: true,
        cancelButtonText: 'No',
    }).then((status)=>{
        if (status.isConfirmed) {
            AjaxCall.formData(`/car/delete/${carId}`, 'POST', {}, function(response){
                toastr.success('car deleted successfully!', 'Dashboard');
                window.location.replace('/car');
            }, function(error){
                toastr.error('fail to remove car!', 'Dashboard');
            });
        }
    })
})