import '@styles/add-car.scss'

import './utils/generalModules'
import './modules/car-adding-modal'

import './modules/car-dropdowns'
import $ from 'jquery';
import 'jquery-validation';

const carAddForm = document.getElementById('carAddForm')

$('#carAddForm').validate({
    rules: {
        vin: {
            required: true,
            minlength: 17,
            maxlength: 17
        }
    },
    errorElement: "span",
});