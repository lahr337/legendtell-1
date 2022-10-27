"use strict";

// Class Definition
var KTModalNewUser = function() {
    const timeout = null;
	const hasValidPassword = function() {
		return {
			validate: function(input) {
				const value = input.value;
				let returndata = {
					valid: true,
				};
                clearTimeout(timeout);
                timeout = setTimeout(function(){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type:"POST",
                        url:'/users/valid/password',
                        dataType:'json',
                        contentType: "application/json; charset=utf-8",
                        async: false,
                        data: JSON.stringify({current_password: value}),
                        success: function(response){},
                        error: function (jqXHR, status) { 
                            if (jqXHR.status === 422) {
                                returndata ={
                                    valid: false,
                                    message: jqXHR.responseJSON.errors.current_password
                                }
                            } else {
                                returndata ={
                                    valid: false,
                                    message: jqXHR.responseJSON.message
                                }
                            } 
                        }
                    });    
                }, 2000);

				
				return returndata;
			},
		};
	};
	
	// Public Functions
    return {
        // public functions
        init: function() {

            var validation;
			FormValidation.validators.hasValidPassword = hasValidPassword;
            var form = document.getElementById('kt_user_changepassword_form');
			// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
			validation = FormValidation.formValidation(
				KTUtil.getById('kt_user_changepassword_form'),
				{
					fields: {
						current_password: {
							validators: {
								notEmpty: {
									message: 'Current password is required'
								},
								hasValidPassword: {
									message: 'password not match'
								},
							}
						},
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'The password is required'
                                },
                                stringLength: {
                                    min: 8,
                                    message: 'The password must have at least 8 characters',
                                },
                            }
                        },
                        password_confirmation: {
                            validators: {
                                identical: {
                                    compare: function() {
                                        return form.querySelector('[name="password"]').value;
                                    },
                                    message: 'The password and its confirm are not the same'
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
				}
			);

            // Revalidate the confirmation password when changing the password
            form.querySelector('[name="password"]').addEventListener('input', function() {
                validation.revalidateField('password_confirmation');
            });

            $('#kt_user_changepassword_submit').on('click', function (e) {
				e.preventDefault();
				
				validation.validate().then(function(status) {
					KTUtil.scrollTop();
                    if(status == 'Valid'){
                        $.ajax($('#kt_user_changepassword_form').attr('action'), {
                            method: 'PUT',
                            data: $('#kt_user_changepassword_form').serialize(),
                        }).done(function(data) {

                            toastr.success('Vendor', 'Change password successfully.');
                        }).always(function() {
                            // setTimeout(function() {
                            //     location.reload();
                            // }, 600);
                        });    
                    }
				});
			});

        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTModalNewUser.init();
});
