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
            'nama_peserta' => 'required|min:3',
            'nik' => 'required|size:16|unique:peserta,nik',
            'alamat' => 'required|min:4',
            'hp' => 'required|min:8',
            //grup
            'grup.*.nama_peserta' => 'required|min:3',
            // 'grup.*.nik' => 'nullable|size:16',
            'grup.*.alamat' => 'required|min:4|max:190',
            'grup.*.hp' => 'required|min:8',
        ];
    }
}
