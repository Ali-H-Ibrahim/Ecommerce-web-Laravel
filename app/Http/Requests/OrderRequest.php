<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'token'      => 'required | string',
            'address'    => 'required | string',
            'phone'      =>  'required | numeric',
            'payment_id' =>  'required',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }

}
