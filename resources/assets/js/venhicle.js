import '@styles/venhicle.scss'

import './utils/generalModules'

import './modules/car-slider'
import './modules/history-slider'
import './modules/car-histoy-toggles'

import './modules/chart'
import './modules/video'
import AjaxCall from './classes/AjaxCall'

const SubmitOffer = document.getElementById('SubmitOffer');
if(SubmitOffer){
    SubmitOffer.addEventListener('click', function(event){
        AjaxCall.formData(SubmitOffer.dataset.url , 'POST', {}, function(response){
            toastr.success('submit offer successfully!', 'Sale Offer');
            SubmitOffer.after('<span class="venhicle-status__submit-offer btn btn--accent btn--regular btn--full-width">Submited Offer</span>')
            SubmitOffer.remove()
        });
    })
}
