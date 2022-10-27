"use strict";

// Class Definition
var KTLogin = function() {

    var _handleSignInForm = function() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_invitation_form'),
			{
				fields: {
					password: {
						validators: {
							notEmpty: {
								message: 'Password is required'
							}
						}
					},
					username: {
						validators: {
							notEmpty: {
								message: 'Username is required'
							}
						}
					}
				},
				plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#kt_invitation_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        KTUtil.scrollTop();
		    });
        });
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            _handleSignInForm();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
