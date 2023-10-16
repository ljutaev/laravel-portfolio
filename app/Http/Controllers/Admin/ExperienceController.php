<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experience = Experience::first();

        return view('admin.experience.index', compact('experience'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experiance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experiance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'image|max:3000',
            'email' => 'string|email|max:255',
            'tel' => 'string|max:255',
        ]);

        $experience = Experience::first();
        $imagePath = handleUpload('image', $experience);

        Experience::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'email' => $request->email,
                'tel' => $request->tel,
                'image' => (!empty($imagePath) ? $imagePath : $experience->image)
            ]
        );

        toastr()->success('Updated Successfully', 'Congrats');

        return redirect()->route('admin.experience.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experiance)
    {
        //
    }
}
