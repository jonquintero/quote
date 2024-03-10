<?php

namespace Modules\InsuranceQuote\DataTransferObjects;

readonly class InsuranceQuoteData
{
    public function __construct(
           public string $fist_name,
           public string $last_name,
           public string $email,
           public string $phone,
           public string $contact_preference,
           public array $selectedOptions,
           public string $street_address,
           public string $ste_apt,
           public string $city,
           public string $state,
           public string $zipcode,
    )
   {

   }
}
