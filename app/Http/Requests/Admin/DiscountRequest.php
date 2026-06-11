<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DiscountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if (! $this->isMethod('patch') || $this->has('is_active')) {
            $this->merge(['is_active' => $this->boolean('is_active')]);
        }
    }

    public function rules(): array
    {
        $discount = $this->route('discount');
        $required = $this->isMethod('patch') ? 'sometimes' : 'required';
        $type = $this->input('type', $discount?->type);

        return [
            'product_id' => [$required, 'exists:products,id'],
            'name' => [$required, 'string', 'max:255'],
            'code' => [
                $required,
                'string',
                'max:255',
                Rule::unique('discounts', 'code')->ignore($discount),
            ],
            'type' => [$required, Rule::in(['percentage', 'fixed'])],
            'value' => [
                $required,
                'numeric',
                Rule::when($type === 'percentage', ['min:0.01', 'max:100'], ['min:0.01']),
            ],
            'starts_at' => ['nullable', 'date'],
            'ends_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
            'is_active' => ['boolean'],
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator): void {
            $discount = $this->route('discount');
            $startsAt = $this->input('starts_at', $discount?->starts_at);
            $endsAt = $this->input('ends_at', $discount?->ends_at);

            if ($startsAt && $endsAt && Carbon::parse($startsAt)->gt(Carbon::parse($endsAt))) {
                $validator->errors()->add('starts_at', 'Tanggal mulai tidak boleh lebih besar dari tanggal selesai.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'ends_at.after_or_equal' => 'Tanggal mulai tidak boleh lebih besar dari tanggal selesai.',
            'value.max' => 'Discount percentage maksimal 100.',
            'value.min' => 'Discount fixed tidak boleh lebih kecil/sama dengan 0.',
        ];
    }
}
