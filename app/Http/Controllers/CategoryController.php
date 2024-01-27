<?php

namespace App\Http\Controllers;

use App\Models\category;

use Illuminate\Http\Request;
use App\Http\Requests\Categoryrequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $categories=  category::all();
        
        return view('category.index' , compact('categories'));
    }

    public function search (Request $request){
       
       
            $categories = Category::all(); 
    
            if ($request->has('category')) {
                $selectedCategoryId = $request->input('category');
                
                $selectedCategory = Category::find($selectedCategoryId);
    
                if ($selectedCategory) {
                    $categoryItems = $selectedCategory;
                } else {
                    $categoryItems=null;
                    return redirect()->route('category.index');
                    exit();
                }
            }
    
            return view('category.index', compact('categories', 'categoryItems'));
             
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
   return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Categoryrequest $request)
    {
        $cat = new category();
        $cat->name = $request->input('catname');
        $cat->save();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        $name=$category->id;
       
        $cat = category::find($name);
        // $cat = Category::where('name', $name)->first();
        return view('category.show', compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Categoryrequest $request, category $category)
    {
        $cat = category::find($category->id);
        

        $cat->name = $request->input('catname');
        $cat->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $cat = category::find($category->id);
        $cat->delete();
        return redirect()->route('category.index');
    
    }
}
