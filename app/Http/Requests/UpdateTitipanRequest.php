<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTitipanRequest extends FormRequest
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
            'nama_produk' => 'required',
            'nama_supplier' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'keterangan' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama_produk.required' => 'Data nama produk belum diisi!',
            'nama_supplier.required' => 'Data email produk belum diisi!',
            'harga_beli.required' => 'Data nomor telepon produk belum diisi!',
            'harga_jual.required' => 'Data alamat produk belum diisi!',
            'stok.required' => 'Data alamat produk belum diisi!',
            'keterangan.required' => 'Data alamat produk belum diisi!',
        ];
    }
}
