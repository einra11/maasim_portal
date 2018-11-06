<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as RequestGuest;
use App\Http\Resources\Request as RequestResource;

class ApiRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $request = RequestGuest::orderBy('created_at','desc')->get();
        return RequestResource::collection($request);
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
        $requestapi = $request->isMethod('put') ? RequestGuest::findOrFail($request->id) : new RequestGuest;

        $requestapi->id = $request->input('id');
        $requestapi->read_tf = $request->input('read_tf');
        $requestapi->complete_tf = $request->input('complete_tf');
        if($requestapi->save()){
            return new RequestResource($requestapi);
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
         $request = RequestGuest::findOrFail($id);
         //Return single announcement as resource
         return new RequestResource($request);
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
          //Get single announcement
          $request = RequestGuest::findOrFail($id);
          //Return single announcement as resource
          if($request -> delete()){
             return new RequestResource($request);
          }
    }
}
