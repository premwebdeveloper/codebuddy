<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Str;

class CategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = Category::get();
        return view('categories.index',compact('categories'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->name);

        $create = new Category();
        $create->fill($input)->save();
        return redirect(route('categories'))->with('success','Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('categories.show',compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'parent_id' => 'required',
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success','Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Category deleted successfully');
    }
}
