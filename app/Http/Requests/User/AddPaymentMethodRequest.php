<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AddPaymentMethodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cardholder_name'   =>  'required',
            'email'             =>  'required',
            'billing_address1'  =>  'required',
            'billing_address2'  =>  'nullable',
            'phone'             =>  'required',
            'city'              =>  'required',
            'state'             =>  'required',
            'country'           =>  'required',
            'zipcode'           =>  'required',
            'card_number'       =>  'required',
            'exp_month'         =>  'required',
            'cvc'               =>  'required',
            'exp_year'          =>  'required',
        ];
    }
}
