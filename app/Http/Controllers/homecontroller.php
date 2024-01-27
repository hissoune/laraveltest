<?php

namespace App\Http\Controllers;
use App\Models\products;

use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function index()
    {
        $products = products::query()->orderby('created_at','desc')->paginate(4);
        return view('home.index',compact('products'));
    }

    public function all()
    {
        $products = products::query()->orderby('created_at','desc')->paginate(10);
        return view('home.all',compact('products'));
    }
}
