<?php

namespace App\Http\Requests\Obat;

use Illuminate\Foundation\Http\FormRequest;

class TambahObat extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:obats,name',
            'satuan' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ];
    }
}
