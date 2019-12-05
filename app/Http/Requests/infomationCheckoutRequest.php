<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class infomationCheckoutRequest extends FormRequest
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
            //
            'fullName' => 'required|min:5|max:35',
            'address' => 'required|min:5|max:200',
            'email' => 'required|email|min:5|max:200',
            'userName' => 'required|min:5|max:35',
            //'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:35|same:rePassword',
            'rePassword' => 'required|min:5|max:35',
        ];
    }
}
