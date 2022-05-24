<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|max:100',
            'quantity'=>'required',
            'description'=>'required',
            'price'=>'required',
            'SubCategory_id'=>'required',
            'main_img'=>'required',
            'status'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'ادخل الاسم',
            'quantity.required'=>' ادخل الكمية ',
            'description.required'=>'ادخل الوصف',
            'price.required'=>'ادخل السعر',
            'SubCategory_id.required'=>'ادخل القسم',
            'status.required'=>'ادخل الحالة',

        ];
    }
}
