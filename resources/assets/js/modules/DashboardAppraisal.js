import $ from 'jquery';
import AjaxCall from './../classes/AjaxCall'
import 'jquery-validation';

document.addEventListener('DOMContentLoaded', function (e) {
    // appraisalForm
    var form = document.getElementById('appraisalForm');


    $("#appraisalForm").validate({
        rules: {
            color: {
                required: true,
            },
            mileage: {
                required: true,
                number: true,
            },
            engine: {
                required: true,
            },
            appraisal_date: {
                required: true,
                date: true
            },
            appraiser: {
                required: true
            },
            market_value:{
                required: true,
                number: true,
            },
            appraisal_value:{
                required: true,
                number: true,
            },
            condition:{
                required: true,
            }
        },
        errorElement: "span",
    });

    $('#AppraisalSubmitBtn').on('click', function (e) {
        e.preventDefault();
        console.log('clicked')
        if(!$("#appraisalForm").valid()){ // validate the form
            $("#appraisalForm").validate().focusInvalid(); //focus the invalid fields
        } else {
            AjaxCall.formData($(form).attr('action'), $(form).attr('method'), $(form).serialize(), function(response){
                console.log('response', response);
                toastr.success('your appraisal save successfully!', 'Appraisal');
                $('#successIndicator').css('display','inline-block');

                setTimeout(() => {
                    $('#successIndicator').hide();
                }, 2000)
            });
        }

    });
});
