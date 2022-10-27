<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SaveProfileRequest extends FormRequest
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
        $id = auth()->user()->id;
        return [
            'email'             => 'unique:users,email,'.$id,
            'first_name'        =>  'required',
            // 'last_name'         =>  'required',
            'contact_number'    =>  'required',
            'address'           =>  'required',
            'city'              =>  'required',
            'state'             =>  'required',
            'zip_code'          =>  'required',
            'country'           =>  'required',
            'avatar'            =>  'file|mimes:jpg,png,jpeg,webp,jfif,pjpeg,pjp,gif,svg,bmp,ico,cur,tif,tiff,apng,avif',
            // 'current_password'          =>  'nullable',
            // 'password'                  =>  'required_unless:current_password,null|min:8|confirmed'
        ];
    }
}
