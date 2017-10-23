<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationSaveRequest extends FormRequest
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
            'student_id' => 'required|exists:students,id',
            "course_id"  => "required|exists:courses,id"
        ];
    }

    public function messages()
    {
        return [
            'student_id.required' => "Por favor escolha um estudante.",
            'student_id.exists'   => "Aluno informado não existe.",
            'course_id.required'  => "Por favor escolha um curso.",
            'course_id.exists'    => "Curso informado não existe."
        ];
    }
}