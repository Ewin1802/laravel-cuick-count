<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLokasiRequest extends FormRequest
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
            'nm_desa' => 'required|max:100|min:1',
            'nm_kec' => 'required|max:100|min:3',
            'dapil' => 'required||max:20|min:1',
            'jlh_tps' => 'required|max:100|min:1',
            'jlh_pemilih' => 'required|max:100|min:1',
        ];
    }
}
