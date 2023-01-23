<?php

namespace App\Http\Controllers;

use App\Models\Intercambio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;


class IntercambioController extends Controller
{
    public function index()
    {
        $intercambios = Intercambio::latest()->get();
        $intercambios->transform(function ($intercambio) {
            $intercambio->registration_period_start_date = Carbon::parse($intercambio->registration_period_start_date)->format('d/m/Y');
            $intercambio->registration_period_end_date = Carbon::parse($intercambio->registration_period_end_date)->format('d/m/Y');
            $intercambio->exchange_period_start_date = Carbon::parse($intercambio->exchange_period_start_date)->format('d/m/Y');
            $intercambio->exchange_period_end_date = Carbon::parse($intercambio->exchange_period_end_date)->format('d/m/Y');
            return $intercambio;
        });
        return view('intercambios.index', compact('intercambios'));
    }

    public function create()
    {
        return view('intercambios.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'vacancies' => 'required|integer',
            'destination' => 'required|string|max:255',
            'registration_period_start_date' => 'required|date',
            'registration_period_end_date' => 'required|date|after:registration_period_start_date',
            'exchange_period_start_date' => 'required|date|after:registration_period_end_date',
            'exchange_period_end_date' => 'required|date|after:exchange_period_start_date',
            'description' => 'required|string',
            'edital' => 'required|mimes:pdf|max:10000'
        ]);

        $imageName = time() . '.' . $request->edital->extension();
        $request->edital->move(public_path('editais'), $imageName);
        $path = 'editais/' . $imageName;

        $validatedData['edital'] = $path;
        $validatedData['user_id'] = auth()->id();
        $intercambio = Intercambio::create($validatedData);
        if ($intercambio) {
            Alert::toast('Intercâmbio criado com sucesso!', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('Erro!', 'warning');
        return redirect()->back();
    }

    public function show(Intercambio $intercambio)
    {
        $intercambio->registration_period_start_date = Carbon::parse($intercambio->registration_period_start_date)->format('d/m/Y');
        $intercambio->registration_period_end_date = Carbon::parse($intercambio->registration_period_end_date)->format('d/m/Y');
        $intercambio->exchange_period_start_date = Carbon::parse($intercambio->exchange_period_start_date)->format('d/m/Y');
        $intercambio->exchange_period_end_date = Carbon::parse($intercambio->exchange_period_end_date)->format('d/m/Y');
        return view('intercambios.show', compact('intercambio'));
    }


    public function edit(Intercambio $intercambio)
    {
        return view('intercambios.edit', compact('intercambio'));
    }

    public function update(Request $request, Intercambio $intercambio)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'vacancies' => 'required|integer',
            'destination' => 'required|string|max:255',
            'registration_period_start_date' => 'required|date',
            'registration_period_end_date' => 'required|date|after:registration_period_start_date',
            'exchange_period_start_date' => 'required|date|after:registration_period_end_date',
            'exchange_period_end_date' => 'required|date|after:exchange_period_start_date',
            'description' => 'required|string',
            'edital' => 'mimes:pdf|max:10000'
        ]);
        if ($request->hasFile('edital')) {
            unlink(public_path($intercambio->edital));
            $imageName = time() . '.' . $request->edital->extension();
            $request->edital->move(public_path('editais'), $imageName);
            $path = 'editais/' . $imageName;
            $validatedData['edital'] = $path;
        }

        if ($intercambio->update($validatedData)) {
            Alert::toast('Intercambio atualizado com sucesso!', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('Erro!', 'warning');
        return redirect()->back();
    }


    public function destroy(Intercambio $intercambio)
    {
        unlink(public_path($intercambio->edital));
        if ($intercambio->delete()) {
            Alert::toast('Intercambio deletado com sucesso!', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('Erro!', 'warning');
        return redirect()->back();
    }

}