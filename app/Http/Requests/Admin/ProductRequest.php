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
            'name' => [$required, 'string', 'max:255'],
            'short' => [$required, 'string', 'max:255'],
            'description' => [$required, 'string'],
            'price' => [$required, 'numeric', 'min:0'],
            'label' => ['nullable', 'string', 'max:255'],
            'status' => [$required, 'string', 'max:255'],
            'type' => [$required, Rule::in(['app', 'source-code'])],
            'availability' => [$required, Rule::in(['ready', 'custom'])],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['string', 'max:255'],
            'thumbnail' => ['nullable', 'string', 'max:2048'],
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
