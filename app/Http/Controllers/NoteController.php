<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::whereUserId(auth()->id())->latest()->paginate(5);
        $title = 'All notes';
        return view('notes.index', compact('notes', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Note";
        return view('notes.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|min:5|max:255|unique:notes',
            'body' => 'required|string|min:10'
        ]);
        
        $current_user = $request->user();
        $current_user->notes()->create($validate);
        return redirect()->route('notes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        $this->authorize('view', $note);
        $title = 'Show note';
        return view('notes.show', compact('note', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $this->authorize('update', $note);
        $title = 'Edit note';
        return view('notes.edit', compact('note','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);
        $dataNote = $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255', Rule::unique('notes')->ignore($note->id)],
            'body' => 'required|string|min:10'
        ]);

        $note->update($dataNote);
        return redirect()->route('notes.show', $note->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);
        $note->delete();
        return redirect()->route('notes.index')->with('flashMessage', 'Note has been deleted');
        
    }
}
