<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'nama_menu' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'jenis_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nama_menu.required' => 'Data nama produk belum diisi!',
            'harga.required' => 'Data nama produk belum diisi!',
            'deskripsi.required' => 'Data nama produk belum diisi!',
            'jenis_id.required' => 'Data nama produk belum diisi!'
           
        ];
    }
}
