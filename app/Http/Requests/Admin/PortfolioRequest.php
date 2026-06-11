<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('stack')) {
            $this->merge(['stack' => $this->normalizeList($this->input('stack'))]);
        }
    }

    public function rules(): array
    {
        $required = $this->isMethod('patch') ? 'sometimes' : 'required';

        return [
            'name' => [$required, 'string', 'max:255'],
            'description' => [$required, 'string'],
            'stack' => ['nullable', 'array'],
            'stack.*' => ['string', 'max:255'],
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
