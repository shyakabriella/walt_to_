<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Requirement;

class ApplicationController extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function index()
    {       
        $apply = Application::latest()->paginate(5);
       //dd($events);
        return view('apply.index',compact('apply'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    }


     /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

     
     /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

     public function create()

     {
      
        $requirements = Requirement::get();
         return view('apply.create')
         ->with("requirements",$requirements);
         
     }
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */


      public function store(Request $request)

      {
          request()->validate([
              'names' => 'required',
              'nid' => 'required',
              'email' => 'required',
              'phone' => 'required',
              'gender' => 'required',
              'Province' => 'required',
              'District' => 'required',
              'Sector' => 'required',
              'event_name' => 'required',
              'place' => 'required',
          ]);
          
          Application::create($request->all());
          return redirect()->route('apply.index')
                          ->with('success','Event created successfully.');
      }
      /**
  
       * Display the specified resource.
  
       *
       * @param  \App\Event  $product
       * @return \Illuminate\Http\Response
       */
}
