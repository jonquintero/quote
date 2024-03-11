<?php

namespace Modules\InsuranceQuote\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\InsuranceQuote\Models\InsuranceQuote;


class InsuranceQuoteFactory extends Factory
{
    protected $model = InsuranceQuote::class;

    public function definition(): array
    {
        return [
            'user_id' => null,
            'contact_preference' => 'Phone',
            'street_address' => $this->faker->streetAddress,
            'ste_apt' => "apt 123",
            'city' => 'City',
            'state' => 'State',
            'zipcode' => '67890',
            'deleted_at' => null,
        ];
    }
}
