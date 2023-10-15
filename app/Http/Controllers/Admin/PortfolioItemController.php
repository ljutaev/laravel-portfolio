<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\PortfolioItemDataTable;
use App\Models\PortfolioItem;
use App\Models\Category;


class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioItemDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio-item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.portfolio-item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:5000',
            'title' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'description' => 'required',
            'client' => 'string|max:255',
            'website' => 'string|max:255',
        ]);

        $imagePath = handleUpload('image');

        PortfolioItem::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'client' => $request->client,
            'website' => $request->website,
            'image' => $imagePath,
        ]);

        toastr()->success('Portfolio item created successfully', 'Congratulations');
        return redirect()->route('admin.portfolio-item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = PortfolioItem::findOrFail($id);
        $categories = Category::all();
        return view('admin.portfolio-item.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'required|image|max:5000',
            'title' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'description' => 'required',
            'client' => 'string|max:255',
            'website' => 'string|max:255',
        ]);

        $update = PortfolioItem::findOrFail($id);

        $imagePath = handleUpload('image', $update);
        
        $update->title = $request->title;
        $update->category_id = $request->category_id;
        $update->description = $request->description;
        $update->client = $request->client;
        $update->website = $request->website;
        $update->image = (!empty($imagePath)) ? $imagePath : $update->image;
        $update->save();

        toastr()->success('Portfolio updated successfully', 'Congratulations');
        return redirect()->route('admin.portfolio-item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = PortfolioItem::findOrFail($id);
        deleteFileIfExist($delete->image);
        $delete->delete();
        
        toastr()->success('Portfolio delete successfully', 'Congratulations');
        return redirect()->route('admin.portfolio-item.index');
    }
}
