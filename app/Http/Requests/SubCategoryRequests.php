<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequests extends FormRequest
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

            'name'=>'required|max:100',
            'category_id'=>'required',
            'status'=>'required',
        ];
    }



    public function messages()
    {
        return [
            'name.required'=>'ادخل الاسم',
            'category_id.required'=>'ادخل القسم',
            'status.required'=>'ادخل الحالة',
        ];
    }
}
