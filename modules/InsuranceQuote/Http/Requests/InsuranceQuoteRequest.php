<?php

namespace Modules\InsuranceQuote\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceQuoteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'contact_preference' => ['required'],
            'selectedOptions' => ['required', 'array'],
            'street_address' => ['required'],
            'ste_apt' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'zipcode' => ['required'],

        ];
    }
}
