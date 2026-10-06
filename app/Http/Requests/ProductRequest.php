<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|min:3',
            'category_id' => 'required',
            'sku'         => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'Nama produk wajib diisi!',
            'category_id.required' => 'Kategori ID wajib diisi!',
            'sku.required'         => 'SKU wajib diisi!',
            'price.required'       => 'Harga wajib diisi!',
            'price.numeric'        => 'Harga harus berupa angka!',
            'stock.required'       => 'Stok wajib diisi!',
            'stock.integer'        => 'Stok harus berupa angka!',
        ];
    }
}
