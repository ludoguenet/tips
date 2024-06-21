<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatisticRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'statistics' => [
                'required',
                'array',
                'max:100',
            ]
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('statistics')) {
            $this->merge([
                'statistics' => $this->collect('statistics')
                    ->reject(blank(...))
                    ->all(),
            ]);
        }
    }
}
