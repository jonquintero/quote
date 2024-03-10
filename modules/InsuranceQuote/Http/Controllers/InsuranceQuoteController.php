<?php

namespace Modules\InsuranceQuote\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\InsuranceQuote\Http\Requests\InsuranceQuoteFirstStepRequest;

class InsuranceQuoteController extends Controller
{
    public function __construct()
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

    public function store(Request $request)
    {
        dd($request->all());
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
