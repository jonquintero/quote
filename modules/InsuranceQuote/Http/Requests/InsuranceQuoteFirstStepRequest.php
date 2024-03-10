<?php

namespace Modules\InsuranceQuote\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceQuoteFirstStepRequest extends FormRequest
{
    public function rules(): array
    {
        return [

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
