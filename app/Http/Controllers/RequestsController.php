<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Request as RequestGuest;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('requests.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $this->validate($request,[
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'email' => 'nullable|email',
            'year'=>'required',
            'month'=>'required',
            'day'=>'required',
            'gender'=>'required',
            'contact'=>'required',
            'requestP'=>'required',
            'purpose'=>'required'
        ]);
        $requestG = new RequestGuest;
        $requestG->last_name = $request->input('lastname');
        $requestG->first_name = $request->input('firstname');
        $requestG->middle_name = $request->input('middlename');
        $requestG->birthdate = $request->input('year').'-'.$request->input('month').'-'.$request->input('day');
        $requestG->gender = $request->input('gender');
        $requestG->email = $request->input('email');
        $requestG->contact_number = $request->input('contact');
        $requestG->type_of_request = json_encode($request->input('requestP'));
        $requestG->purpose = $request->input('purpose');
        $requestG->read_tf = "N";
        $requestG->complete_tf = "N";
        $requestG->save();

        return redirect('/requests')->with('success', 'Request Sent');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
