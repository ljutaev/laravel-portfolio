<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\DataTables\BlogCategoryDataTable;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.blog-category.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        BlogCategory::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
        ]);

        toastr()->success('Category created successfully', 'Congratulations');
        return redirect()->route('admin.blog-category.index');
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
        $title = BlogCategory::findOrFail($id);
        return view('admin.blog-category.edit', compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $update = BlogCategory::findOrFail($id);
        $update->name = $request->name;
        $update->save();

        toastr()->success('Category update successfully', 'Congratulations');
        return redirect()->route('admin.blog-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = BlogCategory::findOrFail($id);

        $hasItem = Blog::where('category', $delete->id)->count();

        if($hasItem == 0){
            $delete->delete();
            return true;
        }
        return response(['status'=>'error']);
    }
}
