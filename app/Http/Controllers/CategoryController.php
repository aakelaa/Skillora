<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function index()
    {
        $categories = Category::withCount('jobs')->get();

        return view('jobs.categories', compact('categories'));
    }

    public function show(Category $category)
    {
        $jobs = $category->jobs()->open()->with('client')->paginate(10);

        return view('jobs.index', ['jobs' => $jobs, 'categories' => Category::all(), 'activeCategory' => $category]);
    }
}
