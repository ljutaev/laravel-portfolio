<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\SkillItemDataTable;
use App\Models\SkillItem;

class SkillItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SkillItemDataTable $dataTable)
    {
        return $dataTable->render('admin.skill-item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill-item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percent' => 'required|numeric|max:100',
        ]);

        SkillItem::create([
            'name' => $request->name,
            'percent' => $request->percent,
        ]);

        toastr()->success('Skill item created successfully.');
        return redirect()->route('admin.skill-item.index')->with('success', 'Skill item created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $skill = SkillItem::findOrFail($id);
        return view('admin.skill-item.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percent' => 'required|numeric|max:100',
        ]);

        $skillItem = SkillItem::findOrFail($id);
        $skillItem->name = $request->name;
        $skillItem->percent = $request->percent;
        $skillItem->save();

        toastr()->success('Skill item updated successfully.');
        return redirect()->route('admin.skill-item.index')->with('success', 'Skill item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = SkillItem::findOrFail($id);
        $delete->delete();
    }
}
