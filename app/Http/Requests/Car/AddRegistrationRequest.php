<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class AddRegistrationRequest extends FormRequest
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
            'has_closest_odometer' => 'required',
            'odometer' => 'required_if:has_closest_odometer,0',
            'oil_change' => 'required',
            'oildate' => 'required_if:oil_change,0',
            'tire_rotation' => 'required',
            'tiredate' => 'required_if:tire_rotation,0',
        ];
    }
}
