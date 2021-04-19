<?php

namespace App\Http\Requests\API;

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
            'username' => 'required|string|max:255|unique:users,username,' . $this->route('student')->user->id,
            'class_id' => 'required',
            'tuition_id' => 'required',
            'nisn' => 'required|max:255',
            'nis' => 'required|max:255',
            'address' => 'required|string',
            'telp_number' => 'required|max:255',
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
            'name.required' => 'Nama tidak boleh kosong.',
            'username.required' => 'Username tidak boleh kosong.',
            'password.required' => 'Password tidak boleh kosong.',
            'class_id.required' => 'Pilih kelas yang terkait dengan siswa.',
            'tuition_id.required' => 'Pilih biaya spp yang terkait dengan siswa.',
            'nisn.required' => 'NISN tidak boleh kosong.',
            'nis.required' => 'NIS tidak boleh kosong.',
            'address.required' => 'Alamat tidak boleh kosong.',
            'telp_number.required' => 'No telepon tidak boleh kosong.',
        ];
    }
}
