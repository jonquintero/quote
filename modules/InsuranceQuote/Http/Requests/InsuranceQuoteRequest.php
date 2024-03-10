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
            // Definir las reglas de validación para los campos del formulario
        ];
    }
}
