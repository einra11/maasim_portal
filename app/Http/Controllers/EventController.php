<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Events;
use App\Http\Resources\Event as EventResource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Events::all();
        //return collection of events as a resource
        return EventResource::collection($events);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $event = $request->isMethod('put') ? Events::findOrFail($request->id) : new Events;

        $event->id = $request->input('id');
        $event->title = $request->input('title');
        $event->event_description = $request->input('event_description');
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        
        if($event->save()){
            return new EventResource($event);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
          //Get single announcement
          $event = Events::findOrFail($id);
          //Return single announcement as resource
          return new EventResource($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         //destroy single announcement
         $event = Events::findOrFail($id);
         //Return single announcement as resource
         if($event -> delete()){
            return new EventResource($event);
         }
         
    }
}
