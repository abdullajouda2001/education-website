<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    public function index()
    {
       
       $category=Category::latest()->get();
       return view('website.index',compact('category'));

    }
    public function about()
    {       
        return view('website.about');


    }
    public function Login()
    {
        return view('website/Login');

    }
    public function Contact()
    {
        return view('website.Contact');
    }
    public function Category()
    {
        return view('website.Category');
    }
    public function Courses()
    {
        return view('website.courser');

        # code...
    }
}
