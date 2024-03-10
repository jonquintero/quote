<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\InsuranceQuote\Models\TypeQuote;

class TypeQuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = [
            [
                'name' => 'Home',
            ],
            [
                'name' => 'Auto',
            ],
            [
                'name' => 'Recreational Vehicle',
            ]
        ];

        foreach ($type as $key => $value){
            TypeQuote::create($value);
        }

    }
}
