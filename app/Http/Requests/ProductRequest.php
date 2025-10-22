<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @var \Illuminate\Foundation\Http\FormRequest $this
 */
class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (request()->isMethod('PUT')) {
            return [
                'title' => 'nullable|string|max:255',
                'price' => 'nullable|numeric',
                'description' => 'nullable|string',
                'banner' => 'nullable|image|max:2048',
            ];
        }

        return [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'banner' => 'required|image|max:2048',
        ];
    }
}
