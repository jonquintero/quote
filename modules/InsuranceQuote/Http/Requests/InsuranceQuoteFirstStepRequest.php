<?php

namespace Modules\InsuranceQuote\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceQuoteFirstStepRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'contact_preference' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
