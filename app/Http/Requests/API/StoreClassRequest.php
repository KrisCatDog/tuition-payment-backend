<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassRequest extends FormRequest
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
            'major_id' => 'required',
            'grade' => 'required|string|max:255',
            'code' => 'required|numeric|max:11',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'major_id.required' => 'Jurusan tidak boleh kosong.',
            'grade.required' => 'Tingkatan kelas tidak boleh kosong.',
            'code.required' => 'Nomor kelas tidak boleh kosong.',
        ];
    }
}
