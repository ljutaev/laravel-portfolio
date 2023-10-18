<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\BlogDataTable;
use App\Models\BlogCategory;
use App\Models\Blog;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'title' => 'required|string',
            'category' => 'required|numeric',
            'description' => 'required',
        ]);

        $imagePath = handleUpload('image');

        Blog::create([
            'image' => $imagePath,
            'title' => $request->title,
            'blog_category_id' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.blog.index');
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
        $item = Blog::findOrFail($id);

        $categories = BlogCategory::all();

        return view('admin.blog.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'required|image',
            'title' => 'required|string',
            'category' => 'required|numeric',
            'description' => 'required',
        ]);

        // dd($request->all());

        $update = Blog::findOrFail($id);

        $imagePath = handleUpload('image', $update);

        $update->title = $request->title;
        $update->blog_category_id = $request->category;
        $update->description = $request->description;
        $update->image = (!empty($imagePath)) ? $imagePath : $update->image;
        $update->save();

        toastr()->success('Blog updated successfully', 'Congratulations');
        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Blog::findOrFail($id);
        deleteFileIfExist($delete->image);
        $delete->delete();
        
        toastr()->success('BBlog delete successfully', 'Congratulations');
        return redirect()->route('admin.blog.index');
    }
}
