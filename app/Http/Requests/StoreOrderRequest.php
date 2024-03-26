<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;


class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id' => 'required|integer|exists:clients,id',
            'establishment_id' => 'required|integer|exists:establishments,id',
            'total' => 'required|numeric',
        ];
    }
}
