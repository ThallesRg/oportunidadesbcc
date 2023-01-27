<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    public function index()
{
    $events = Event::latest()->get();

    foreach($events as $event) {
        $event->start_date = Carbon::parse($event->start_date)->format('d/m/Y');
        $event->end_date = Carbon::parse($event->end_date)->format('d/m/Y');
    }

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
            'website' => 'nullable|url',
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
        $event->start_date = Carbon::parse($event->start_date)->format('d/m/Y');
        $event->end_date = Carbon::parse($event->end_date)->format('d/m/Y');
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
            'website' => 'nullable|url',
            'description' => 'required|string',
        ]);

        if ($event->update($validatedData)) {
            Alert::toast('Evento atualizado com sucesso!', 'success');
            return redirect()->route('account.authorSection');
        }

        Alert::toast('Erro!', 'warning');
        return redirect()->back();
    }

    public function destroy(Event $event)
    {
        if ($event->delete()) {
            Alert::toast('Evento deletado com sucesso!', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('Erro!', 'warning');
        return redirect()->back();
    }
}
