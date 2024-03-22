<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbsensiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_karyawan' => 'required',
            'tanggal_masuk' => 'required',
            'waktu_masuk' => 'required',
            'status' => 'required',
            'waktu_keluar' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama_karyawan.required' => 'Data nama_karyawan belum diisi!',
            'tanggal_masuk.required' => 'Data tanggal_masuk belum diisi!',
            'waktu_masuk.required' => 'Data waktu_masuk belum diisi!',
            'status.required' => 'Data status belum diisi!',
            'waktu_keluar.required' => 'Data waktu_keluar belum diisi!',
           
        ];
    }
}
