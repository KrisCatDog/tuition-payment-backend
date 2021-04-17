<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'student_id' => 'required',
            'bills_date' => 'required|date',
            'amount_paid' => 'required|max:11',
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
            'student_id.required' => 'Pilih siswa yang terkait dengan pembayaran.',
            'bills_date.required' => 'Bulan tidak boleh kosong.',
            'bills_date.date' => 'Pilih bulan terkait tagihan spp.',
            'amount_paid.required' => 'Jumlah bayar tidak boleh kosong.',
            'amount_paid.max' => 'Jumlah bayar melebihi batas maksimal karakter.',
        ];
    }
}
