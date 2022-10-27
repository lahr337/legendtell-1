import DashboardModal from "../classes/DashboardModal"
import Modal from "../classes/Modal"
import $ from 'jquery';
import 'jquery-validation';
import AjaxCall from "../classes/AjaxCall"

const Steps = new DashboardModal()
const ModalClass = new Modal()

// Change answers
Steps.toggleManualOption('has_closest_odometer', 'currentOdometer')
Steps.toggleManualOption('oil_change', 'selectAddCarDate')
Steps.toggleManualOption('tire_rotation', 'selectRotationDate')

// Change steps
Steps.changeStep()

// Open modal
document.getElementById('openRegCarModal').addEventListener('click', () => {
    document.getElementById('addCarModal').classList.add('modal--active')

    ModalClass.closeModal('addCarModal')
})

document.getElementById('openAddServiceRecord').addEventListener('click', () => {
    document.getElementById('addServiceRecordModal').classList.add('modal--active')

    ModalClass.closeModal('addServiceRecordModal')

    document.getElementById('addServiceRecordBtn').addEventListener('click', () => {
        // ModalClass.removeActiveModalClass(document.getElementById('addServiceRecordModal'))
    })

    document.getElementById('addServiceRecordCancel').addEventListener('click', () => {
        ModalClass.removeActiveModalClass(document.getElementById('addServiceRecordModal'))
    })
})

if($('.openEditServiceRecord').length > 0 ){
    $('.openEditServiceRecord').on('click', (event) => {
        document.getElementById('editServiceRecordModal').classList.add('modal--active')
        var dataset = event.currentTarget.dataset;

        document.querySelector('#editServiceRecordModal input[name="date"]').value = dataset.service_date;
        document.querySelector('#editServiceRecordModal input[name="odometer"]').value = dataset.service_odometer;
        document.querySelector('#editServiceRecordModal input[name="service_id"]').value = dataset.service_id;

        var service_completed = JSON.parse(dataset.service_completed);
        for(let i in service_completed){
            document.querySelector(`#editServiceRecordModal input[value="${service_completed[i]}"]`).checked = true;
        }

        ModalClass.closeModal('editServiceRecordModal')

        document.getElementById('editServiceRecordBtn').addEventListener('click', () => {

        })

        document.getElementById('editServiceRecordCancel').addEventListener('click', () => {
            ModalClass.removeActiveModalClass(document.getElementById('editServiceRecordModal'))
        })
    })
}


// require If
$.validator.addMethod( "requiredIf", function( value, element, options) {
    if(value == '') {
        // debugger
        const actual = document.querySelector(`input[name="${options.dependField}"]:checked`).value;
        const expected = options.dependValue;
        console.log('actual', actual)
        console.log('expected', expected)
        if(actual == expected) {
            return false;
        }
    }
    return true;
}, "This field is required" );

$("#addCarRegModal").validate({
    rules: {
        odometer: {
            requiredIf: {
                dependField: 'has_closest_odometer',
                dependValue: 0,
            },
            number: true
        },
        oildate: {
            requiredIf: {
                dependField: 'oil_change',
                dependValue: 0,
            },
            date: true
        },
        tiredate: {
            requiredIf: {
                dependField: 'tire_rotation',
                dependValue: 0,
            },
            date: true
        }
    },
    errorElement: "span",
});

document.addEventListener('DOMContentLoaded', function (e) {
    const form = document.getElementById('addCarRegModal');

    const step1 = form.querySelector('.modal-step[data-step="1"]');
    const step2 = form.querySelector('.modal-step[data-step="2"]');
    const step3 = form.querySelector('.modal-step[data-step="3"]');

    const prevButton = form.querySelector('[id="prevButton"]');
    const nextButton = form.querySelector('[id="nextButton"]');

    let currentStep = 1;

    var wizard = $("#addCarRegModal");
    nextButton.addEventListener('click', function () {
        // When click the Next button, we will validate the current step
        if(!wizard.valid()){ // validate the form
            wizard.validate().focusInvalid(); //focus the invalid fields
        } else {
            currentStep++;
            if(currentStep == 4) {
                form.submit();
            } else {
                // nextButton.innerHTML = currentStep == 3 ? 'Done' : 'Next';
                if(currentStep == 2) {
                    nextButton.innerHTML = 'Next';
                    // Hide the first step
                    FormValidation.utils.classSet(step3, {
                        'modal-step--active': false,
                    });
                    // Hide the first step
                    FormValidation.utils.classSet(step1, {
                        'modal-step--active': false,
                    });
                    // Show the next step
                    FormValidation.utils.classSet(step2, {
                        'modal-step--active': true,
                    });
                } else {
                    nextButton.innerHTML = 'Done';
                    // Hide the first step
                    FormValidation.utils.classSet(step1, {
                        'modal-step--active': false,
                    });// Hide the first step
                    FormValidation.utils.classSet(step2, {
                        'modal-step--active': false,
                    });
                    // Show the next step
                    FormValidation.utils.classSet(step3, {
                        'modal-step--active': true,
                    });
                }

            }

        }

    });

    prevButton.addEventListener('click', function () {
        switch (currentStep) {
            case 2:
                currentStep--;
                nextButton.innerHTML = 'Next';
                // Hide the second step
                FormValidation.utils.classSet(step2, {
                    'modal-step--active': false,
                });
                FormValidation.utils.classSet(step3, {
                    'modal-step--active': false,
                });
                // Show the first step
                FormValidation.utils.classSet(step1, {
                    'modal-step--active': true,
                });
                break;
            case 3:
                currentStep--;
                nextButton.innerHTML = 'Next';
                // Hide the second step
                FormValidation.utils.classSet(step3, {
                    'modal-step--active': false,
                });
                // Hide the second step
                FormValidation.utils.classSet(step1, {
                    'modal-step--active': false,
                });
                // Show the first step
                FormValidation.utils.classSet(step2, {
                    'modal-step--active': true,
                });
                break;

            case 1:
            default:
                break;
        }
    });

    $("#addCarServiceModal").validate({
        rules: {
            odometer: {
                required: true,
                number: true,
            },
            date: {
                required: true,
                date: true,
            },
            // 'completed[]': {
            //     required: true,
            // },
        },
        errorElement: "span",
    });

    $("#editCarServiceModal").validate({
        rules: {
            odometer: {
                required: true,
                number: true,
            },
            date: {
                required: true,
                date: true,
            },
            // 'completed[]': {
            //     required: true,
            // },
        },
        errorElement: "span",
    });
});
