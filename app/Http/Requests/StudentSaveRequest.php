<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentSaveRequest extends FormRequest
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
            'name' => 'required',
            'email'=> 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Por favor informe o nome.",
            'email.required'=> "Por favor informe o email.",
            'email.email'   => "Por favor informe um email válido.",
        ];
    }
}