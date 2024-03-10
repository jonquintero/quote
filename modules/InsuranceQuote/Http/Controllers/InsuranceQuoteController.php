<?php

namespace Modules\InsuranceQuote\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return Inertia::render('InsuranceQuote/FormStepOne');
    }

    public function firstStep(InsuranceQuoteFirstStepRequest $request)
    {
        return to_route('insurance-quote.index');
    }

    public function store(InsuranceQuoteRequest $request)
    {
        $this->upsert($request);
    }

    public function upsert(InsuranceQuoteRequest $request)
    {
        $quoteData = new InsuranceQuoteData(...$request->validated());
        $this->insuranceQuoteAction->execute($quoteData);
    }

    public function show($id)
    {
        // Lógica para mostrar un registro específico
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
