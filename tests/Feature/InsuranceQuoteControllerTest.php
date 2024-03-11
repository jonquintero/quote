<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Modules\InsuranceQuote\Http\Controllers\InsuranceQuoteController;
use Modules\InsuranceQuote\Http\Requests\InsuranceQuoteFirstStepRequest;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia;
use Modules\InsuranceQuote\Models\InsuranceQuote;
use Modules\User\Models\User;
use Laravel\Sanctum\Sanctum;

class InsuranceQuoteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Arrange
        $user = User::factory()->create();
        Sanctum::actingAs($user);

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
            'ste_apt' => 'Apt 789',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => '67890',
            'deleted_at' => null,
        ]);

        // Act
        $response = $this->get(route('insurance-quote.index'));

        // Assert
        $response->assertOk();

        $response->assertInertia(function (AssertableInertia $page) use ($insuranceQuote1, $insuranceQuote2) {
            $page->component('InsuranceQuote/Index')
                ->where('filters', ['search' => null, 'trashed' => null])
                ->where('insuranceQuotes', [
                    $this->formatInsuranceQuote($insuranceQuote1),
                    $this->formatInsuranceQuote($insuranceQuote2),
                ]);
        });
    }

    private function formatInsuranceQuote(InsuranceQuote $insuranceQuote)
    {
        return [
            'id' => $insuranceQuote->id,
            'contact_preference' => $insuranceQuote->contact_preference,
            'street_address' => $insuranceQuote->street_address,
            'ste_apt' => $insuranceQuote->ste_apt,
            'city' => $insuranceQuote->city,
            'state' => $insuranceQuote->state,
            'zipcode' => $insuranceQuote->zipcode,
            'deleted_at' => $insuranceQuote->deleted_at,
        ];
    }


    public function testFirstStep()
    {

        $request = new InsuranceQuoteFirstStepRequest([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'contact_preference' => 'Email',
        ]);

        $controller = app()->make(InsuranceQuoteController::class);

        $response = $controller->firstStep($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
    }
}
