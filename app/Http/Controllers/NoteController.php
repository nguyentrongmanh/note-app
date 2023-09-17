<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Note;
use App\Core\Services\NoteServiceInterface;
use Illuminate\Http\Request;
use Log;

class NoteController extends Controller
{
    protected NoteServiceInterface $_noteService;

    public function __construct(NoteServiceInterface $noteService) {
        $this->_noteService = $noteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $note = $this->_noteService->searchByContent($request->content ?? "");
        Log::info($note);
        return view("note.index", [
            "notes" => $this->_noteService->searchByContent($request->content ?? "")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("note.create");
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoteRequest $request)
    {
        try {
            $this->_noteService->store($request->all());
            return redirect()->route('note.index')->withSuccess('A new note created successfully');
        } catch (\Exception $e) {
            Log::info($e);
            return redirect()->route('note.index')->withError('An error occurred');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNoteRequest  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        try {
            $this->_noteService->destroy($note->id);
            return redirect()->route('note.index')->withSuccess('Delete note successfully');
        } catch (\Exception $e) {
            Log::info($e);
            return redirect()->route('note.index')->withError('An error occurred');
        }
    }
}