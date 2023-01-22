<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::latest()->get();
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
        ]);

        $scholarship = new Scholarship();
        $scholarship->name = $request->input('name');
        $scholarship->description = $request->input('description');
        $scholarship->start_date = $request->input('start_date');
        $scholarship->end_date = $request->input('end_date');
        $scholarship->value = $request->input('value');
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
        ]);

        $getScholarship = Scholarship::findOrFail($scholarship);
        $getScholarship->name = $request->input('name');
        $getScholarship->description = $request->input('description');
        $getScholarship->start_date = $request->input('start_date');
        $getScholarship->end_date = $request->input('end_date');
        $getScholarship->value = $request->input('value');
        $getScholarship->save();

        return redirect()->route('scholarships.index')->with('success', 'Bolsa de estudo atualizada com sucesso!');
    }

    public function destroy(Scholarship $scholarship)
    {
        $scholarship->delete();

        return redirect()->route('scholarships.index')->with('success', 'Bolsa de estudo deletada com sucesso!');
    }
}
