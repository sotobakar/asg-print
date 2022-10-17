<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_produk' => ['required', 'string'],
            'kategori_produk' => ['required', 'integer'],
            'harga_produk' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'foto_produk' => ['sometimes']
        ];
    }
}
