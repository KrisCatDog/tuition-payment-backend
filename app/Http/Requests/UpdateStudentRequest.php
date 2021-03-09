<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . auth()->user()->id,
            'class_id' => 'required',
            'tuition_id' => 'required',
            'nisn' => 'required|string|max:255',
            'nis' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:255',
        ];
    }
}
