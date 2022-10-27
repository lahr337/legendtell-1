import Input from './classes/Inputs'

import './utils/generalModules'

import '@styles/account-settings.scss'

import './modules/accountSettingsTabs'
import './modules/selectAllChecks'

import AjaxCall from './classes/AjaxCall'
import $ from 'jquery';
import 'jquery-validation';
import Modal from "./classes/Modal"

const ModalClass = new Modal()

const PaymentForm =$('<form id="addMethodModalForm"></form>');
$(PaymentForm).insertAfter( $('#addMethodModalFormContainer') )
$(PaymentForm).append( $('#addMethodModalFormContainer').html() )
$(PaymentForm).attr('action', $('#addMethodModalFormContainer').attr('action') )
$(PaymentForm).attr('method', $('#addMethodModalFormContainer').attr('method') )

$('#addMethodModalFormContainer').replaceWith(PaymentForm)
const paymentMethodList = document.getElementById("paymentMethodList");

// Open modal
document.getElementById('openAddPaymentMethodModal').addEventListener('click', () => {
    document.getElementById('addPaymentMethodModal').classList.add('modal--active')

    ModalClass.closeModal('addPaymentMethodModal')

    document.getElementById('addPaymentMethodBtn').addEventListener('click', () => {
        // ModalClass.removeActiveModalClass(document.getElementById('addServiceRecordModal'))
    })

    document.getElementById('addMethodModalForm').addEventListener('submit', (e) => {
        e.preventDefault();
        $('#addPaymentMethodBtn').prop('disabled', true);
        $('#addPaymentMethodCancel').prop('disabled', true);
        AjaxCall.formData($(PaymentForm).attr('action'), 'POST', $(PaymentForm).serialize(), function(response){
            console.log("response", response);
            $(paymentMethodList).prepend(response);
            toastr.success('add payment method successfully!', 'Account Settings');
            ModalClass.removeActiveModalClass(document.getElementById('addPaymentMethodModal'))
            $('#addPaymentMethodBtn').prop('disabled', false);
            $('#addPaymentMethodCancel').prop('disabled', false);
        }, function(jqXHR){
            toastr.error('fail to add payment method', 'Account Settings');
            $('#addPaymentMethodBtn').prop('disabled', false);
            $('#addPaymentMethodCancel').prop('disabled', false);
        })
    })

    document.getElementById('addPaymentMethodCancel').addEventListener('click', () => {
        ModalClass.removeActiveModalClass(document.getElementById('addPaymentMethodModal'))
    })
})

$('#addMethodModalForm').validate({
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

// Show passwor on password input
if ( document.getElementById('showPassword') ) {
    const showPasswordBtn = document.getElementById('showPassword'),
        showNewPasswordBtn = document.getElementById('showNewPassword'),
        passwordField = document.getElementById('passwrod'),
        newPasswordField = document.getElementById('new_passwrod')

    Input.showHidePasswor(showPasswordBtn, passwordField)
    Input.showHidePasswor(showNewPasswordBtn, newPasswordField)
}

const emailExists = function() {
    return {
        validate: function(input) {
            const value = input.value;
            let returndata = {
                valid: true,
            };

            AjaxCall.json('/account-settings/email-exists', 'POST', {email: value}, ()=>{},function (jqXHR, status) {
                if (jqXHR.status === 422) {
                    returndata ={
                        valid: false,
                        message: jqXHR.responseJSON.errors.email
                    }
                } else {
                    returndata ={
                        valid: false,
                        message: jqXHR.responseJSON.message
                    }
                }
            }, false);

            return returndata;
        },
    };
};

FormValidation.validators.emailExists = emailExists;
var validation = FormValidation.formValidation(document.getElementById('editProfile'), {
    fields: {
        avatar: {
            validators: {
                file: {
                    maxFiles: 1,
                    maxSize: 512000,
                    extension: 'jpg,png,jpeg,webp',
                    type: 'image/jpeg,image/png,image/webp',
                    message: 'Please choose a Image file',
                },
            },
        },
        first_name: {
            validators: {
                notEmpty: {
                    message: 'First Name is required'
                }
            }
        },
        last_name: {
            validators: {
                notEmpty: {
                    message: 'Last Name is required'
                }
            }
        },
        email: {
            validators: {
                notEmpty: {
                    message: 'Email is required'
                },
                emailAddress: {
                    message: 'The value is not a valid email address'
                },
                emailExists: {
                    message: 'email already exists'
                },
            },
        },
        contact_number: {
            validators: {
                notEmpty: {
                    message: 'Contact Number is required'
                },
                phone: {
                    country: 'US',
                    message: 'The value is not valid US phone number',
                },
            }
        },
        address: {
            validators: {
                notEmpty: {
                    message: 'Address is required'
                }
            }
        },
        city: {
            validators: {
                notEmpty: {
                    message: 'City is required'
                }
            }
        },
        state: {
            validators: {
                notEmpty: {
                    message: 'State is required'
                }
            }
        },
        zip_code: {
            validators: {
                notEmpty: {
                    message: 'Zip Code is required'
                },
                zipCode: {
                    country: 'US',
                    message: 'The value is not valid US zip code',
                },
            }
        },
        country: {
            validators: {
                notEmpty: {
                    message: 'Country is required'
                }
            }
        },
    },
    plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        submitButton: new FormValidation.plugins.SubmitButton(),
        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
        // bootstrap: new FormValidation.plugins.Bootstrap(),
        bootstrap: new FormValidation.plugins.Bootstrap({
            rowSelector: ".fv-row",
            eleInvalidClass: "",
            eleValidClass: "",
            // defaultMessageContainer: false,
        }),
        icon: new FormValidation.plugins.Icon({
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        }),
    }
});
// Show "Changes saved"
const form = document.getElementById('editProfile'),
    changesSaved = document.getElementById('changesSaved'),
    changesSavedActiveClass = 'changes-saved--active'

$('#kt_edit_profile_submit').on('click', function (e) {
    e.preventDefault();
    console.log('clicked')
    validation.validate().then(function(status) {
        if(status=='Valid'){

            $(".fv-plugins-message-container").html('');
            
            var data = new FormData();

            //Form data
            var form_data = $(form).serializeArray();
            $.each(form_data, function (key, input) {
                data.append(input.name, input.value);
            });

            //File data
            var file_data = $('input[name="avatar"]')[0].files;
            for (var i = 0; i < file_data.length; i++) {
                data.append("avatar", file_data[i]);
            }

            AjaxCall.formMultiData($(form).attr('action'), 'POST', data, function (data) {
                changesSaved.classList.add(changesSavedActiveClass)

                setTimeout(() => {
                    changesSaved.classList.remove(changesSavedActiveClass)
                }, 2000)

                toastr.success('edit profile successfully!', 'Account Settings');
            }, function(error){
                toastr.error('edit profile failed!', 'Account Settings');
            })

        }
    })
});

$('#ChangePassword').on('click', function(){
    $('#error_current_password').empty();
    $('#error_new_password').empty();
    var current_password = $('input[name="current_password"]').val();
    var password = $('input[name="password"]').val();
    if(current_password == '' || password == '') {
        if(current_password == ''){
            $('#error_current_password').append('Current password is required');
        }
        if(password == ''){
            $('#error_new_password').append('New password is required');
        }
        return;
    }

    var url = $(this).data('url');
    AjaxCall.json(url,'POST', {current_password: current_password, password: password}, function(response){
        $('#error_new_password').empty()
        $('#error_current_password').empty()

        $('input[name="current_password"]').val('');
        $('input[name="password"]').val('');
        $('#passwordChangedIndicator').show();

        setTimeout(() => {
            $('#passwordChangedIndicator').hide();
        }, 2000)
        toastr.success('changed password successfully!', 'Account Settings');
    }, function(jqXHR, status){
        if (jqXHR.status === 422) {
            if(jqXHR.responseJSON.errors.password != undefined) {
                $('#error_new_password').append(jqXHR.responseJSON.errors.password);
            }
            if(jqXHR.responseJSON.errors.current_password != undefined) {
                $('#error_current_password').append(jqXHR.responseJSON.errors.current_password);
            }
        } else {
            $('#error_current_password').append(jqXHR.responseJSON.message);
            toastr.error(jqXHR.responseJSON.message, 'Account Settings');
        }
    }, false);
})
if ( document.getElementById('avatar') ) {
    const imgInp = document.getElementById('avatar'),
        avatarImg = document.getElementById('avatarImg');
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            avatarImg.src = URL.createObjectURL(file)
            $('.avatarImg').attr('src', URL.createObjectURL(file) );
        }
    }
}



const SaveNotificationSetting = document.getElementById('SaveNotificationSetting');

if(SaveNotificationSetting) {
    const allChecks = document.getElementsByClassName('notifications');
    const notiForm = document.getElementById('saveNotificationSettingForm');
    SaveNotificationSetting.addEventListener('click', function(event){
        AjaxCall.formData($(notiForm).attr('action'), $(notiForm).attr('method'), $(notiForm).serialize(), function(response){
            toastr.success('save notification setting successfully!', 'Account Settings');
        }, function(jqXHR){
            toastr.error('fail to save notification setting', 'Account Settings');
        })
    });
}

$(document).on("click", ".makeDefaultPaymentMethod",function(event){
    let url = $(this).data('url');
    let ele = $(this);
    Swal.fire({
        title: 'Make Default!',
        text: 'Do you want to make default this payment method',
        icon: 'warning',
        confirmButtonText: 'Yes',
        showCancelButton: true,
        cancelButtonText: 'No',
    }).then((status)=>{
        if (status.isConfirmed) {
            AjaxCall.json(url, 'POST', {}, function(response){
                $('.makeDefaultPaymentMethod').show();
                $(ele).hide();
                toastr.success('make default payment method successfully!', 'Account Settings');
            }, function(jqXHR){
                toastr.error('fail to make default payment method', 'Account Settings');
            })
        }
    })

})

$(document).on("click", ".deletePaymentMethod", function(event){
    let url = $(this).data('url');
    let ele = $(this);
    Swal.fire({
        title: 'Delete!',
        text: 'Do you want to delete this payment method',
        icon: 'error',
        confirmButtonText: 'Yes',
        showCancelButton: true,
        cancelButtonText: 'No',
    }).then((status)=>{
        if (status.isConfirmed) {
            AjaxCall.json(url, 'DELETE', {}, function(response){
                $('.makeDefaultPaymentMethod').show();
                $(ele).find('.credit-cards__card-item').remove();
                $('.makeDefaultPaymentMethod').first().hide();
                toastr.success('delete payment method successfully!', 'Account Settings');
            }, function(jqXHR){
                toastr.error('fail to delete payment method', 'Account Settings');
            })
        }
    })

})


