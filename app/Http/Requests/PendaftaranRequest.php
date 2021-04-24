<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
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
            //personal
            'nama_peserta' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            //grup
            'grup.*.nama_peserta' => 'required',
            'grup.*.nik' => 'nullable',
            'grup.*.alamat' => 'required',
            'grup.*.hp' => 'required',
        ];
    }
}
