<?php

namespace Modules\InsuranceQuote\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InsuranceQuoteController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return Inertia::render('InsuranceQuote/FormStepOne');
    }

    public function firstStep(Request $request)
    {

        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'phone' => ['required', 'numeric'],
            'contact_preference' => ['required'],
        ]);
        //return to_route('insurance-quote.index');
       // return redirect()->back()->withErrors($request->validate);
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
