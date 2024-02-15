<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required",
            "admission_number" => "required",
            "gender" => "required",
            "admission_date" => "required",
            "status" => "required",
            "email" => "required",
            "Password" => "required",
            "last_name" => "required",
            "religion" => "required",
            "mobile_number" => "required",

        ];
    }

    public function messages(): array
    {
        return [
            "name" => "please insret first name",
            "last_name" => "please insert last name name",
            "admission_number" => "please insret admission number ",
            "gender" => "please select gender",
            "admission_date" => "please insert admission date ",
            "status" => "please select status",
            "email" => "please insert email",
            "Password" => "please insert corect password",
            "religion" => "please select reigion",
            "mobile_number" => "please insert mobile number",

        ];
    }
}
