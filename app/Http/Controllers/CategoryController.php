<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        // $user_id = auth()->id();
        // Retrieve categories associated with the authenticated user's ID
        // $categories = Category::where('user_id', $user_id)->get();

        $categories = Category::orderBy('id', 'asc')->get();
        return view('backend.owner.category.list', compact('categories'));
        // $user_id = auth()->id();
        // // Retrieve categories associated with the authenticated user's ID
        // $categories = Category::where('user_id', $user_id)->get();
        // $allCategories = Category::orderBy('id', 'asc')->get();


        // return view('company.category.list', compact('categories', 'allCategories'));
    }

    // public function OwnerCategoryindex()
    // {
    //     $user_id = auth()->id();
    //     // Retrieve categories associated with the authenticated user's ID
    //     $owner_categories = Category::where('user_id', $user_id)->get();
    //     return view('owner.category.list', compact('owner_categories'));
    // }

    public function categoryCreate()
    {
        return view('backend.owner.category.create');
    }

    public function categoryStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'cat_name' => 'required|min:2|max:50',
        ]);

        $category = new Category();
        $category->cat_name = trim($request->cat_name);
        $category->user_id = Auth::id();
        $category->save();

        return redirect()->route('category.list')->with('success', 'Category created successfully!');
    }

    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.owner.category.edit', compact('category'));
    }

    public function categoryUpdate(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'cat_name' => 'required|min:2|max:50',
        ]);

        $category = Category::findOrFail($id);
        $category->cat_name = trim($request->cat_name);
        $category->save();

        return redirect()->route('category.list')->with('success', 'Category updated successfully!');
    }

    public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.list')->with('success', 'Category deleted successfully!');
    }
}
