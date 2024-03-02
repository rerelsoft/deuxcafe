<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiRequest extends FormRequest
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
            // 'id' => '',
            // 'tanggal' => '',
            // 'total_harga' => '',
            // 'metode_pembayaran' => '',
            // 'keterangan' => '',
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'Data belum diisi!',
            'tanggal.required' => 'Data belum diisi!',
            'total_harga.required' => 'Data belum diisi!',
            'metode_pembayaran.required' => 'Data belum diisi!',
            'keterangan.required' => 'Data belum diisi!',
        ];
    }
}
