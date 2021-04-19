<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTuitionRequest extends FormRequest
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
            'year' => 'required|max:11',
            'amount' => 'required|max:11',
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
            'year.required' => 'Tahun tidak boleh kosong.',
            'amount.required' => 'Nominal tidak boleh kosong.',
            'year.max' => 'Tahun melebihi batas maksimal karakter.',
            'amount.max' => 'Nominal melebihi batas maksimal karakter.',
        ];
    }
}
