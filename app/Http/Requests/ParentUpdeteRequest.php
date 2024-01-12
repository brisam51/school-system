<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentUpdeteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'last_name'=>'required',
            'gender'=>'required',
            'status'=>'required',
            'email'=>'required',
            'Password'=>'required',
            'mobile_number'=>'required',
            'occupation'=>'required',
            'address'=>'required'
        ];
    }
    public function messages(): array
    {
        return [
           'name.required'=>'please insert parent name',
           'last_name.required'=>'please insert parent  last name',
           'gender.required'=>'please select parent gender',
           'status.required'=>'please select parent status',
           'email.required'=>'please insert parent email',
           'occupation.required'=>'please insert parent ccupation',
           'addless.required'=>'please insert parent address',
        ];
    }
}
