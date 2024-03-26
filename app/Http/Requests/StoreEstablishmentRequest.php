<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;


class StoreEstablishmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description' => 'required|string|max:255',
            'product_id' => 'required|integer|exists:products,id',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }
}
