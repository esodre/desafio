<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;


class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ];
    }
}
