<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requirement;
use App\Models\Event;

class RequirementController extends Controller
{
     /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()

    {
         $this->middleware('permission:requirements-list|requirements-create|requirements-edit|requirements-delete', ['only' => ['index','show']]);
         $this->middleware('permission:requirements-create', ['only' => ['create','store']]);
         $this->middleware('permission:requirements-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:requirements-delete', ['only' => ['destroy']]);
    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function index()
    {
       
        
        $requirements = Requirement::latest()->paginate(5);
       //dd($events);
        return view('requirements.index',compact('requirements'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    }


     /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

     public function create()

     {
        $events = Event::get();
         return view('requirements.create')
         ->with("events",$events);
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
              'place' => 'required',
              'HostingNumber' => 'required',
              'theme' => 'required',
              'starting' => 'required',
              'destination' => 'required',
          ]);
          Requirement::create($request->all());
          return redirect()->route('requirements.index')
                          ->with('success','Event created successfully.');
      }
      /**
  
       * Display the specified resource.
  
       *
       * @param  \App\Event  $product
       * @return \Illuminate\Http\Response
       */
 
}
