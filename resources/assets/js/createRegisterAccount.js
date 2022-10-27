import '@styles/create-your-account.scss'

import './utils/generalModules'

import './modules/seePassword'

import $ from 'jquery';
console.log('register page');
// Tabs
const toLoginBtn = document.getElementById('toLogin'),
    toSignupBtn = document.getElementById('toSignup'),
    loginForm = document.getElementById('loginForm'),
    signupForm = document.getElementById('signupForm'),
    activeFormCalss = 'sign-email__form--active',
    accentBtnClass = 'btn--accent',
    lightBtnClass = 'btn--light'

toLoginBtn.addEventListener('click', () => {
    if ( !loginForm.classList.contains(activeFormCalss) ) {
        // Button action
        activateBtn(toLoginBtn)
        disableBtn(toSignupBtn)

        // Form action
        signupForm.classList.remove(activeFormCalss)
        loginForm.classList.add(activeFormCalss)
    }
})

toSignupBtn.addEventListener('click', () => {
    if ( !signupForm.classList.contains(activeFormCalss) ) {
        // Button action
        activateBtn(toSignupBtn)
        disableBtn(toLoginBtn)

        // Form action
        loginForm.classList.remove(activeFormCalss)
        signupForm.classList.add(activeFormCalss)
    }
})
$('.toLogin').on('click', function(){
    if ( !loginForm.classList.contains(activeFormCalss) ) {
        // Button action
        activateBtn(toLoginBtn)
        disableBtn(toSignupBtn)

        // Form action
        signupForm.classList.remove(activeFormCalss)
        loginForm.classList.add(activeFormCalss)
    }

})

$('.toSignup').on('click', function(){
    if ( !signupForm.classList.contains(activeFormCalss) ) {
        // Button action
        activateBtn(toSignupBtn)
        disableBtn(toLoginBtn)

        // Form action
        loginForm.classList.remove(activeFormCalss)
        signupForm.classList.add(activeFormCalss)
    }

})
// Activate button
const activateBtn = btn => {
    btn.classList.remove(lightBtnClass)
    btn.classList.add(accentBtnClass)
}

// Disable button
const disableBtn = btn => {
    btn.classList.remove(accentBtnClass)
    btn.classList.add(lightBtnClass)
}

var loginFormValidation = FormValidation.formValidation(document.getElementById('loginForm'), {
    fields: {
        email: {
            validators: {
                notEmpty: {
                    message: 'Email is required'
                },
                emailAddress: {
                    message: 'The value is not a valid email address'
                },
            },
        },
        password: {
            validators: {
                notEmpty: {
                    message: 'Password is required'
                },
                // stringLength: {
                //     min: 8,
                //     message: 'The password must be more than 8 characters',
                // },
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


$('#kt_login_submit').on('click', function (e) {
    e.preventDefault();
    console.log('clicked')
    loginFormValidation.validate().then(function(status) {
        if(status=='Valid'){
            $(loginForm).trigger('submit');
        }
    })
});

const emailExists = function() {
    return {
        validate: function(input) {
            const value = input.value;
            let returndata = {
                valid: true,
            };
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type:"POST",
                url:'/register/email-exists',
                dataType:'json',
                contentType: "application/json; charset=utf-8",
                async: false,
                data: JSON.stringify({email: value}),
                success: function(response){},
                error: function (jqXHR, status) {
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
                }
            });
            return returndata;
        },
    };
};

FormValidation.validators.emailExists = emailExists;

var signupFormValidation = FormValidation.formValidation(document.getElementById('signupForm'), {
    fields: {
        email: {
            validators: {
                notEmpty: {
                    message: 'Email is required'
                },
                emailAddress: {
                    message: 'The value is not a valid email address'
                },
                emailExists: {
                    message: 'Email already exists'
                },

            },
        },
        password: {
            validators: {
                notEmpty: {
                    message: 'Password is required'
                },
                stringLength: {
                    min: 8,
                    message: 'The password must be more than 8 characters',
                },
            }
        },
        password_confirmation: {
            validators: {
                notEmpty: {
                    message: 'Password is required'
                },
                stringLength: {
                    min: 8,
                    message: 'The password must be more than 8 characters',
                },
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

$('#kt_register_submit').on('click', function (e) {
    e.preventDefault();
    console.log('clicked')
    signupFormValidation.validate().then(function(status) {
        if(status=='Valid'){
            $(signupForm).trigger('submit');
        }
    })
});