<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;



class CategoryController extends Controller
{
    // GET /admin/categories
    public function index()
    {
        $categories = Category::withCount('jobs')->latest()->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    // GET /admin/categories/create
    public function create()
    {
        return view('admin.categories.create');
    }

    // POST /admin/categories
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
        ]);


        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category created.');
    }

    // GET /admin/categories/{category}/edit
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // PUT /admin/categories/{category}
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,' . $category->id],
        ]);


        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated.');
    }

    // DELETE /admin/categories/{category}
    public function destroy(Category $category)
    {

        if ($category->jobs()->exists()) {
            return back()->with('error', 'Cannot delete a category that still has jobs.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted.');
    }
}
