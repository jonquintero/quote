<?php

namespace Modules\InsuranceQuote\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadeRequest;
use Inertia\Inertia;
use Modules\InsuranceQuote\Actions\InsuranceQuoteAction;
use Modules\InsuranceQuote\DataTransferObjects\InsuranceQuoteData;
use Modules\InsuranceQuote\Http\Requests\InsuranceQuoteFirstStepRequest;
use Modules\InsuranceQuote\Http\Requests\InsuranceQuoteRequest;
use Modules\InsuranceQuote\Models\InsuranceQuote;

class InsuranceQuoteController extends Controller
{
    public function __construct(
        private readonly InsuranceQuoteAction $insuranceQuoteAction
    )
    {
    }

    public function index()
    {
        return Inertia::render('InsuranceQuote/Index', [
            'filters' => FacadeRequest::all('search', 'trashed'),
            'insuranceQuotes' => InsuranceQuote::query()
                ->filter(FacadeRequest::only('search', 'trashed'))
                ->where('user_id', auth()->id())
                ->get()
                ->transform(fn ($insuranceQuote) => [
                    'id' => $insuranceQuote->id,
                    'contact_preference' => $insuranceQuote->contact_preference,
                    'street_address' => $insuranceQuote->street_address,
                    'ste_apt' => $insuranceQuote->ste_apt,
                    'city' => $insuranceQuote->city,
                    'state' => $insuranceQuote->state,
                    'zipcode' => $insuranceQuote->zipcode,
                    'deleted_at' => $insuranceQuote->deleted_at,
                ]),
        ]);
    }

    public function create()
    {
        return Inertia::render('InsuranceQuote/FormStepOne');
    }

    public function firstStep(InsuranceQuoteFirstStepRequest $request)
    {
        return to_route('insurance-quote.create');
    }

    public function store(InsuranceQuoteRequest $request)
    {

        $this->upsert($request);

        return redirect()->route('insurance-quote.done')
            ->with('success', 'Insurance Quote Done!');
    }

    public function upsert(InsuranceQuoteRequest $request)
    {

        $quoteData = new InsuranceQuoteData(...$request->validated());
        $this->insuranceQuoteAction->execute($quoteData);
    }

    public function done()
    {
        return Inertia::render('InsuranceQuote/InsuranceDone');
    }

    public function show(InsuranceQuote $insuranceQuote)
    {
        return Inertia::render('InsuranceQuote/Show', [
            'insuranceQuote' => $insuranceQuote->load(['insuranceQuoteWithTypeQuotes' => function ($query) {
                $query->with(['typeQuote' => function ($query) {
                    $query->with(['typeQuoteCoverage' => function ($query) {
                        $query->inRandomOrder()->limit(4);
                    }]);
                }]);
            }])
        ]);

    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar un registro específico
    }

    public function destroy($id)
    {
        // Lógica para eliminar un registro específico
    }

    // Otros métodos del controlador
}
