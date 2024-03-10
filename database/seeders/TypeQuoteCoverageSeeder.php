<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Modules\InsuranceQuote\Models\TypeQuote;
use Modules\InsuranceQuote\Models\TypeQuoteCoverage;

class TypeQuoteCoverageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $typeQuotes = TypeQuote::all();

        foreach ($typeQuotes as $typeQuote) {
            for ($i = 1; $i <= 10; $i++) {
                TypeQuoteCoverage::create([
                    'type_quote_id' => $typeQuote->id,
                    'name' => $faker->word . ' Coverage',
                ]);
            }
        }
    }
}
