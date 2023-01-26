<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();

        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'website' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        $validatedData['user_id'] = auth()->id();
        $event = Event::create($validatedData);

        if ($event) {
            Alert::toast('Evento criado com sucesso!', 'success');
            return redirect()->route('account.authorSection');
        }

        Alert::toast('Erro!', 'warning');
        return redirect()->back();
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'website' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        if ($event->update($validatedData)) {
            Alert::toast('Evento atualizado com sucesso!', 'success');
            return redirect()->route('events.index');
        }

        Alert::toast('Erro!', 'warning');
        return redirect()->back();
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index');
    }
}
