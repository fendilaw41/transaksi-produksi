<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiRequest extends FormRequest
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
        $rules = [
            'karyawan_id' => 'required',
            // 'tanggal_transaksi' => 'required|date',
            'lokasi_id' => 'required',
            'item_id' => 'required',
            'qty' => 'required|numeric|max:10',
        ];
        if($this->getMethod() == 'PUT'){
            $rules ['karyawan_id'] = ['required'];
            $rules ['lokasi_id'] = ['required'];
            $rules ['item_id'] = ['required'];
            $rules ['qty'] = ['required', 'numeric'];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'karyawan_id.required' => "Nama Karyawan Harus Di isi",
            'tanggal_transaksi.required' => "Tanggal Transaksi Harus Di isi",
            'lokasi_id.required' => "Nama Lokasi Harus Di isi",
            'item_id.required' => "Nama Item Harus Di isi",
            'qty.required' => "Jumlah Harus Di isi",
            'qty.max' => "Jumlah Maksimal 10 Angka",
        ];
    }
}
