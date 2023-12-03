<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skedule;
use App\Models\Requirement;

class SkeduleController extends Controller
{
    
     /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()

    {
         $this->middleware('permission:skedules-list|skedules-create|skedules-edit|skedules-delete', ['only' => ['index','show']]);
         $this->middleware('permission:skedules-create', ['only' => ['create','store']]);
         $this->middleware('permission:skedules-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:skedules-delete', ['only' => ['destroy']]);
    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function index()
    {       
        $skedules = Skedule::latest()->paginate(5);
       //dd($events);
        return view('skedules.index',compact('skedules'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    }


     /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

     public function create()

     {
        $requirements = Requirement::get();
         return view('skedules.create')
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
              'event_name' => 'required',
              'starting' => 'required',
              'destination' => 'required',
              'starthrs' => 'required',
              'end_hrs' => 'required',
          ]);
          Skedule::create($request->all());
          return redirect()->route('skedules.index')
                          ->with('success','Event created successfully.');
      }
      /**
  
       * Display the specified resource.
  
       *
       * @param  \App\Event  $product
       * @return \Illuminate\Http\Response
       */
}
