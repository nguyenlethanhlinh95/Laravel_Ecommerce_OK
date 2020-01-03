<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'pro_name' => 'required',
            'pro_code' => 'required',
            'pro_price' => 'required',
            'id_category'=> 'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000',
            'stock'=> ''
        ];
    }
}
