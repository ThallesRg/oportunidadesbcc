<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::latest()->get();
        foreach ($scholarships as $scholarship) {
            $scholarship->start_date = Carbon::parse($scholarship->start_date)->format('d/m/Y');
            $scholarship->end_date = Carbon::parse($scholarship->end_date)->format('d/m/Y');
        }
        return view('scholarships.index', compact('scholarships'));
    }

    public function create()
    {
        return view('scholarships.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'value' => 'required|numeric',
            'website' => 'nullable|url'
        ]);
        $scholarship = new Scholarship();
        $scholarship->name = $request->input('name');
        $scholarship->description = $request->input('description');
        $scholarship->start_date = $request->input('start_date');
        $scholarship->end_date = $request->input('end_date');
        $scholarship->value = $request->input('value');
        $scholarship->website = $request->input('website');
        $scholarship->user_id = auth()->user()->id;
        if ($scholarship->save()) {
            Alert::toast('Bolsa de estudo criada com sucesso!', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('Erro!', 'warning');
        return redirect()->back();
    }

    public function show($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $user = $scholarship->user()->first();

        $scholarship->start_date = Carbon::parse($scholarship->start_date)->format('d/m/Y');
        $scholarship->end_date = Carbon::parse($scholarship->end_date)->format('d/m/Y');
        $similarScholarships = Scholarship::whereHas('user', function ($query) use ($user) {
            return $query->where('id', $user->id);
        })->where('id', '<>', $scholarship->id)->take(5)->get();
        return view('scholarships.show')->with([
            'scholarship' => $scholarship,
            'user' => $user,
            'similarScholarships' => $similarScholarships
        ]);
    }

    public function edit(Scholarship $scholarship)
    {
        return view('scholarships.edit', compact('scholarship'));
    }

    public function update(Request $request, $scholarship)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'value' => 'required|numeric',
            'website' => 'nullable|url'
        ]);

        $getScholarship = Scholarship::findOrFail($scholarship);
        $getScholarship->name = $request->input('name');
        $getScholarship->description = $request->input('description');
        $getScholarship->start_date = $request->input('start_date');
        $getScholarship->end_date = $request->input('end_date');
        $getScholarship->value = $request->input('value');
        $getScholarship->website = $request->input('website');
        if ($getScholarship->save()) {
            Alert::toast('Bolsa de estudo atualizada com sucesso!', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('Erro!', 'warning');
        return redirect()->back();
    }

    public function destroy(Scholarship $scholarship)
    {

        if ($scholarship->delete()) {
            Alert::toast('Bolsa de estudo deletada com sucesso!', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('Erro!', 'warning');
        return redirect()->back();
    }
}