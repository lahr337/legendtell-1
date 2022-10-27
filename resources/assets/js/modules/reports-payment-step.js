import $ from 'jquery';
import 'jquery-validation';
import AjaxCall from "../classes/AjaxCall"

const plans = document.getElementById('plans'),
    secondStep = document.getElementById('secondStep'),
    inputPlanID = document.getElementById('inputPlanID'),
    paymentForm = document.getElementById('paymentForm')

plans.addEventListener('click', e => {
    if ( e.target.closest('.plan-item__select-btn') ) {
        e.preventDefault()
        console.log('plan_id', e.target.dataset.plan_id)
        let plan_id=e.target.dataset.plan_id
        inputPlanID.value = plan_id;
        disableFirstStep()
        activateSecondStep()
    }
})

// disable current step
const disableFirstStep = () => {
    // const activeStep = document.querySelector('.reports-payment__step--active')
    document.querySelector('.reports-payment__step--active').classList.remove('reports-payment__step--active')
}

// activate second step
const activateSecondStep = () => {
    secondStep.classList.add('reports-payment__step--active')
}


$('#paymentForm').validate({
    rules: {
        plan_id: {
            required: true
        },
        card_number: {
            required: true,
            minlength: 15,
            maxlength: 16,
        },
    },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        console.log("error", error)
        $("#agreeCheckbox").removeClass("error")
        $('.custom-select-opener').removeClass('error')
        if($(element).attr('name') === 'agree'){
            $("#agreeCheckbox").addClass("error");
        }
        if(['exp_month','exp_year'].indexOf($(element).attr('name')) != -1){
            $(element).parent().find('.custom-select-opener').addClass('error');
            console.log("$(element).parent()", $(element).parent().find('.custom-select-opener'))
        }
    },
});


// $('#paymentForm').on('submit', function (e) {
//     e.preventDefault();
//     console.log('clicked')
//     if(!$("#paymentForm").valid()){ // validate the form
//         $("#paymentForm").validate().focusInvalid(); //focus the invalid fields
//     } else {
//         debugger
//         AjaxCall.formData($(paymentForm).attr('action'), $(paymentForm).attr('method'), $(paymentForm).serialize(), function(response){
//             toastr.success('buy successfully!', 'Payment');
//         }, function(error){
//             toastr.error('fail to buy!', 'Payment');
//         });
//     }
// });