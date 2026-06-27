<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('tags')) {
            $this->merge(['tags' => $this->normalizeList($this->input('tags'))]);
        }
    }

    public function rules(): array
    {
        $required = $this->isMethod('patch') ? 'sometimes' : 'required';

        return [
            'category_id' => [$required, 'integer', Rule::exists('categories', 'id')],
            'name' => [$required, 'string', 'max:255'],
            'short' => [$required, 'string', 'max:255'],
            'description' => [$required, 'string'],
            'price' => [$required, 'numeric', 'min:0'],
            'static_price' => ['nullable', 'integer', 'min:0'],
            'dynamic_price' => ['nullable', 'integer', 'min:0'],
            'label' => ['nullable', 'string', 'max:255'],
            'status' => [$required, 'string', 'max:255'],
            'type' => [$required, Rule::in(['app', 'source-code'])],
            'availability' => [$required, Rule::in(['ready', 'custom'])],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['string', 'max:255'],
            'thumbnail' => ['nullable', 'image', 'max:2048'],
            'demo_url' => ['nullable', 'url', 'max:255'],
        ];
    }

    private function normalizeList(mixed $value): array
    {
        if (is_array($value)) {
            return array_values(array_filter(array_map('trim', $value)));
        }

        return array_values(array_filter(array_map('trim', explode(',', (string) $value))));
    }
}
