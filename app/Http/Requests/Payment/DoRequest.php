<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class DoRequest extends FormRequest
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
            'payment_source'   =>  'required',
            'cardholder_name'   =>  'required_if:payment_source,new',
            'email'             =>  'required_if:payment_source,new',
            'billing_address1'  =>  'required_if:payment_source,new',
            'billing_address2'  =>  'nullable',
            'phone'             =>  'required_if:payment_source,new',
            'city'              =>  'required_if:payment_source,new',
            'state'             =>  'required_if:payment_source,new',
            'country'           =>  'required_if:payment_source,new',
            'zipcode'           =>  'required_if:payment_source,new',
            'card_number'       =>  'required_if:payment_source,new',
            'exp_month'         =>  'required_if:payment_source,new',
            'cvc'               =>  'required_if:payment_source,new',
            'exp_year'          =>  'required_if:payment_source,new',
            'plan_id'           =>  'required',
            'payment_method'    =>  'required_if:payment_source,new',
        ];
    }
}
