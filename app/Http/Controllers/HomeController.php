<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\subcategory;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('task');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function task()
    // {
    //     return view('home');
    // }    

    public function index()
    {
        $cats = [];
        for($i = 2 ; $i <= 6 ; $i++)
        { 
            $cats[] = subcategory::where('id' , $i)->first();   
        } 
        $category   = subcategory::orderBy('created_at' , 'desc')->take(5)->get();
     
         return view('home' , compact('cats' , 'category'));
    }
}
