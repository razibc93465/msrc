<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        return view('home');
        
//        return view('admin.home.homeContent');
        
        $publishedDepartments = Department::where('publicationStatus', 1)->get();
        return view('admin.home.homeContent', ['publishedDepartments' => $publishedDepartments]);
       //    return view('frontEnd.home.homeContent');
        
        
    }
}
