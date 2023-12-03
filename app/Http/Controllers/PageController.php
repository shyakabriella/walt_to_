<?php

namespace App\Http\Controllers;
use App\Models\HomeSectionOne;
use App\Models\HomeSectionThree;
use App\Models\AddNewClub;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
       
        return view('pages.index', [
       
        ]);    
    }

    public function about()
    {
        return view('pages.about', [
        
        ]);    
    }

    public function service()
    {
        return view('pages.service', [
        
        ]);    
    }
    public function contact()
    {
        return view('pages.contact', [
        
        ]);    
    }

    public function event()
    {
        return view('pages.event', [
        
        ]);    
    }

}
