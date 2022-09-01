<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JenisHewanRequest extends FormRequest
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
            'nama_jenis_hewan' =>'required|string|min:3',
            'parent_id'        => 'required|integer|unique:jenis_hewans',
            'slug_jenis_hewan' => 'required|string|unique:jenis_hewans'
        ];
    }
}
