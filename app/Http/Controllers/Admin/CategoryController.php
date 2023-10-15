<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\CategoryDataTable;
use App\Models\Category;
use App\Models\PortfolioItem;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        toastr()->success('Typer title created successfully', 'Congratulations');
        return redirect()->route('admin.category.index');
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
        $title = Category::findOrFail($id);
        return view('admin.portfolio-category.edit', compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $update = Category::findOrFail($id);
        $update->name = $request->name;
        $update->save();

        toastr()->success('Category update successfully', 'Congratulations');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Category::findOrFail($id);

        $hasItem = PortfolioItem::where('category_id', $delete->id)->count();

        if($hasItem == 0){
            $delete->delete();
            return true;
        }
        return response(['status'=>'error']);
    }
}
