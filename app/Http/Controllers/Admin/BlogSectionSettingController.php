<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogSectionSetting;
use Illuminate\Http\Request;

class BlogSectionSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogSection = BlogSectionSetting::first();
        return view('admin.blog-section-setting.index', compact('blogSection'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'sub_title' => ['required', 'max:1000'],
        ]);

        BlogSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
            ]
        );

        toastr()->success('Updated Successfully', 'Congrats');

        return redirect()->route('admin.blog-section-setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
