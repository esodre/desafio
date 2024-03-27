<?php

namespace App\Http\Requests;
use App\Enums\CategoryType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


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
            'category_id' => ['required', 'integer',
                Rule::exists('categories', 'id')->where('type', CategoryType::ESTABLISHMENT)],
        ];
    }
}
