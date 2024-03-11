<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\InsuranceQuote\Models\InsuranceQuote;
use Modules\User\Models\User;
use Tests\TestCase;
use Inertia\Testing\Assert;

class InsuranceQuoteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Arrange
        $user = User::factory()->create();
        $insuranceQuote1 = InsuranceQuote::factory()->create([
            'user_id' => $user->id,
            'contact_preference' => 'Email',
            'street_address' => '123 Main St',
            'ste_apt' => 'Apt 456',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => '12345',
            'deleted_at' => null,
        ]);
        $insuranceQuote2 = InsuranceQuote::factory()->create([
            'user_id' => $user->id,
            'contact_preference' => 'Phone',
            'street_address' => '456 Elm St',
            'ste_apt' => null,
            'city' => 'City',
            'state' => 'State',
            'zipcode' => '67890',
            'deleted_at' => now(),
        ]);

        // Act
        $response = $this->actingAs($user)
            ->get(route('insurance-quotes.index'));

        // Assert
        $response->assertInertia(function (Assert $page) use ($insuranceQuote1, $insuranceQuote2) {
            $page->component('InsuranceQuote/Index')
                ->has('filters', ['search' => null, 'trashed' => null])
                ->has('insuranceQuotes', 2, function (Assert $insuranceQuotes) use ($insuranceQuote1, $insuranceQuote2) {
                    $insuranceQuotes->where('id', $insuranceQuote1->id)
                        ->where('contact_preference', $insuranceQuote1->contact_preference)
                        ->where('street_address', $insuranceQuote1->street_address)
                        ->where('ste_apt', $insuranceQuote1->ste_apt)
                        ->where('city', $insuranceQuote1->city)
                        ->where('state', $insuranceQuote1->state)
                        ->where('zipcode', $insuranceQuote1->zipcode)
                        ->where('deleted_at', null);
                    $insuranceQuotes->where('id', $insuranceQuote2->id)
                        ->where('contact_preference', $insuranceQuote2->contact_preference)
                        ->where('street_address', $insuranceQuote2->street_address)
                        ->where('ste_apt', $insuranceQuote2->ste_apt)
                        ->where('city', $insuranceQuote2->city)
                        ->where('state', $insuranceQuote2->state)
                        ->where('zipcode', $insuranceQuote2->zipcode)
                        ->where('deleted_at', now());
                });
        });
    }
}
