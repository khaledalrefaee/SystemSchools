<?php

namespace App\Http\Requests;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class StoreClassroom extends FormRequest
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
        return [
            'List_Classes.*.Name' => 'required',
//            'List_Classes.*.Name_class_en' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'Name.required' => trans('validation.required'),
//            'Name.Name_class_en' => trans('validation.required'),
           ];
    }


}
