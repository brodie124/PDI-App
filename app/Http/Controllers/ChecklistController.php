<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\ChecklistItem;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checklists = Checklist::all();
        return view('checklist.all')->with('checklists', $checklists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checklist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'name' => 'required|unique:checklists|max:255',
            'checklist-item.*.description' => 'required|max:1024',
            'checklist-item.*.type' => 'required|'
        ]);

        $checklist = new Checklist();
        $checklist->name = $validated['name'];

        foreach($validated['checklist-item'] as $validatedItem) {
            $checklistItem = new ChecklistItem();
            $checklistItem->description = $validatedItem['description'];

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function show(Checklist $checklist)
    {
        return view('checklist.view')->with('checklist', $checklist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function edit(Checklist $checklist)
    {
        return view('checklist.edit')->with('checklist', $checklist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checklist $checklist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checklist $checklist)
    {
        //
    }
}
