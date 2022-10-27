<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCarMediaRequest extends FormRequest
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
            'deletable_ids' => 'required|array',
            'type'          =>  'required',
            'car_id'          =>  'required',
        ];
    }
}
