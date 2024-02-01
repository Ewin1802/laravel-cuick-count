<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //bisa diberi kondisi, jika staff bisa add, klau user tidak bisa
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
            'name' => 'required|max:100|min:3',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'roles' => 'required|in:ADMIN,STAFF,USER',
            'password' => 'required|min:8'
        ];
    }
}
