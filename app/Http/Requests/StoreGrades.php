<?php

namespace App\Http\Requests;

use Faker\Guesser\Name;
use Illuminate\Foundation\Http\FormRequest;

class StoreGrades extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return ['Name'=>'required' ];

//        ***********************الطريقة التانية لعدم التكرار*****************************
//        return [
//            'Name'      =>'required|unique:grades,name->ar'.$this->id ,
//            'Name_en'      =>'required|unique:grades,name->en'.$this->id ,
//        ];
    }
    public function messages()
    {
        return [
            'Name.required' => trans('validation.required'),

        ];
/*
        return [
            'Name.required' => trans('validation.required'),
            'Name.unique=>tran('validation.unique'),
            'Name_en.required' =>trans('validation.required'),
            'Name_en.unique=>tran('validation.unique'),
        ];
*/
    }
}
