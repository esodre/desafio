<?php

namespace App\Http\Requests;
use App\Enums\CategoryType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


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
            'description' => 'nullable|string',
            'category_id' => ['required', 'integer',
                Rule::exists('categories', 'id')->where('type', CategoryType::PRODUCT)],
        ];
    }
}
