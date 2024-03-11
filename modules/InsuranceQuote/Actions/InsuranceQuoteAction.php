<?php

namespace Modules\InsuranceQuote\Actions;

use Illuminate\Support\Facades\Hash;
use Modules\InsuranceQuote\DataTransferObjects\InsuranceQuoteData;
use Modules\InsuranceQuote\Models\InsuranceQuote;
use Modules\InsuranceQuote\Models\TypeQuote;
use Modules\User\Models\User;

class InsuranceQuoteAction
{
     public function execute(InsuranceQuoteData $insuranceQuoteData)
     {
        $user = User::firstOrCreate(
            ['email' => $insuranceQuoteData->email],
            [
                'first_name' => $insuranceQuoteData->first_name,
                'last_name' => $insuranceQuoteData->last_name,
                'email' => $insuranceQuoteData->email,
                'phone' => $insuranceQuoteData->phone,
                'password' => Hash::make($insuranceQuoteData->email)

            ]
        );

         $insuranceQuote = $user->insuranceQuote()->create((array)$insuranceQuoteData);

         collect($insuranceQuoteData->selectedOptions)->each(function ($value, $key) use ($insuranceQuote) {

             $typeQuote = $this->searchTypeQuote($value);

             $insuranceQuote->insuranceQuoteWithTypeQuotes()->create(['type_quote_id' => $typeQuote]);
         });
     }


    public function searchTypeQuote(mixed $value)
    {
        return  match ($value) {
            1 => TypeQuote::where('name', 'Home')->first()->id,
            2 => TypeQuote::where('name', 'Auto')->first()->id,
            3 => TypeQuote::where('name', 'Recreational Vehicle')->first()->id,
            default => '',
        };
    }
}
