<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElementIndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'min_price' => 'nullable|integer|min:0',
            'max_price' => 'nullable|integer|min:0|gte:min_price',
            'weight'    => 'nullable|integer|min:0',
        ];
    }
}
