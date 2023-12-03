<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;


class EventController extends Controller

{ 

    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()

    {
         $this->middleware('permission:event-list|event-create|event-edit|event-delete', ['only' => ['index','show']]);
         $this->middleware('permission:event-create', ['only' => ['create','store']]);
         $this->middleware('permission:event-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:event-delete', ['only' => ['destroy']]);
    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()
    {
        $events = Event::latest()->paginate(5);
        return view('events.index',compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {
        return view('events.create');
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
            'event_name' => 'required',
            'HostingNumber' => 'required',
        ]);
        Event::create($request->all());
        return redirect()->route('event.index')
                        ->with('success','Event created successfully.');
    }
    /**

     * Display the specified resource.

     *
     * @param  \App\Event  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)

    {
        return view('events.show',compact('event'));
    }
    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)

    {
        return view('events.edit',compact('events'));
    }
    /**

     * Update the specified resource in storage.

     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)

    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $events->update($request->all());
        return redirect()->route('events.index')
                      ->with('success','events updated successfully');
    }

    /**

     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function destroy(Event $event)

    {
        $event->delete();
        return redirect()->route('events.index')
                        ->with('success','Events deleted successfully');
    }

}