<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;


class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }
}
