<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use App\Models\category;
use App\Http\Requests\productrequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = products::paginate(5);
        return view('products.index',compact('products'));
    }
    public function search (Request $request){
       
       
        $products = products::all();

        if ($request->has('product')) {
            $selectedproductId = $request->input('product');
            
            $selectedproduct = products::find($selectedproductId);

            if ($selectedproduct) {
                $productsItems = $selectedproduct;
            } else {
                $productsItems=null;
                return redirect()->route('products.index');
                exit();
            }
        }

        return view('products.index', compact('products', 'productsItems'));
         
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $categories=category::all();
       
       return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(productrequest $request)
    {
        $formfield=$request->validated();
        if($request->hasFile('image')){
            $formfield['image']=$request->file('image')->store('product','public');
            
        }    
           
        $product = Products::create([
            'name' => $formfield['product_name'],
            'description' => $formfield['description'],
            'quantity' => $formfield['quantity'],
            'price' => $formfield['price'],
            'image' => $formfield['image'],
            'category_id'=>$formfield['category_id'],
        ]);
            return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        //
       
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $product)

    {
        $categories=category::all();
        return view('products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(productrequest $request, products $product)

    {
       
       
        $newproduct = products::find($product->id);
        
        $formfield=$request->validated();
        if($request->hasFile('image')){
            $formfield['image']=$request->file('image')->store('product','public');
            
        }else{
            $formfield['image']=$request->input('image');
        }

        $newproduct->name = $formfield['product_name'];
        $newproduct->description=$formfield['description'];
        $newproduct->quantity=$formfield['quantity'];
        $newproduct->price=$formfield['price'];
        $newproduct->image=$formfield['image'];
        $newproduct->category_id=$formfield['category_id'];

      if($newproduct->Update()) {
        echo'yssss';
      }else{
        echo'nooooooo';
      }
            return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(products $product)
    {
        $product = products::find($product->id);
        $product->delete();
        return to_route('products.index');
    }
}
