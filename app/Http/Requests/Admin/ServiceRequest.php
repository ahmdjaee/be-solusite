<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('features')) {
            $this->merge(['features' => $this->normalizeList($this->input('features'))]);
        }
    }

    public function rules(): array
    {
        $required = $this->isMethod('patch') ? 'sometimes' : 'required';

        return [
            'name' => [$required, 'string', 'max:255'],
            'description' => [$required, 'string'],
            'level' => [$required, 'string', 'max:255'],
            'price' => [$required, 'numeric', 'min:0'],
            'availability' => [$required, Rule::in(['ready', 'custom'])],
            'features' => ['nullable', 'array'],
            'features.*' => ['string', 'max:255'],
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
