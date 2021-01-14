<?php

namespace App\Http\Controllers;

use App\Models\Products;

use App\Models\Categories;

use Cache;

use Illuminate\Http\Request;

class MainController extends Controller
{
    
    public function admin(){

    	return view('admin', compact('categories'));

    }

    public function index(){

    	 $categories = Categories::all();

    	 $products = Products::all();

    	 return view('index' , compact('categories','products'));

    }


    public function search(Request $request)
    {
    	$categories = Categories::all();
    	if(!empty($request->get('search')))
    	{
    		$wordToSearch = $request->get('search');
    		Cache::put('search_name', $request->get('search'));
    	}
    	else
    	{
    		$wordToSearch = Cache::get('search_name');
    	}
    	
        $products = Products::where('name','like','%'.$wordToSearch.'%')->orWhereHas('categories', function($q) use($wordToSearch)
            {
                $q->where('name','like','%'.$wordToSearch.'%');
            })->get();
        //dd($products);
        return view('index', compact('categories','products'));

    }

}
