"use strict";

// Class Definition
var KTModalNewUser = function() {
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
					url:'/users/email/exists',
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
	
	// Public Functions
    return {
        // public functions
        init: function() {

            var validation;
			// console.log("KTUtil.getById('kt_edit_user_profile_form')");
			// console.log(KTUtil.getById('kt_edit_user_profile_form'));
			// Register the validator
			FormValidation.validators.emailExists = emailExists;

			// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
			validation = FormValidation.formValidation(
				KTUtil.getById('kt_edit_user_profile_form'),
				{
					fields: {
						name: {
							validators: {
								notEmpty: {
									message: 'Name is required'
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
					},
					plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						submitButton: new FormValidation.plugins.SubmitButton(),
						defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
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

        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTModalNewUser.init();
});
