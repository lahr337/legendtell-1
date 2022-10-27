<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppraisalRequest extends FormRequest
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
            'color'             => 'required',
            'engine'            => 'required',
            'mileage'           => 'required|numeric',
            'appraisal_date'    => 'required|date',
            'appraiser'         => 'required',
            'market_value'      => 'required|numeric',
            'appraisal_value'   => 'required|numeric',
            'condition'         => 'array'
        ];
    }
}
