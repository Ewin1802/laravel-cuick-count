<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaslonRequest extends FormRequest
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
            'nama_partai' => 'required||max:100|min:1',
            'nama_paslon' => 'required|max:100|min:3',
            'no_urut' => 'required||max:20|min:1',
            'foto_paslon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
