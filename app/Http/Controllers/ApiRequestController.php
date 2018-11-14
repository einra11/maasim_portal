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
        $textmessage="Your request has already completed, please claim it in the barangay hall id number: ".$request->id;
        $result = $this->itexmo("09153364105",$textmessage,"TR-MAASI364105_Y1HK7");
        if ($result == ""){
        echo "iTexMo: No response from server!!!
        Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
        Please CONTACT US for help. ";	
        }else if ($result == 0){
        echo "Message Sent!";
        }
        else{	
        echo "Error Num ". $result . " was encountered!";
        //
        $requestapi = $request->isMethod('put') ? RequestGuest::findOrFail($request->id) : new RequestGuest;

        $requestapi->id = $request->input('id');
        $requestapi->read_tf = $request->input('read_tf');
        $requestapi->complete_tf = $request->input('complete_tf');
        if($requestapi->save()){
            return new RequestResource($requestapi);
        }

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
    //##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
   public function itexmo($number,$message,$apicode){
    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
    $param = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($itexmo),
        ),
    );
    $context  = stream_context_create($param);
    return file_get_contents($url, false, $context);}
    //##########################################################################
                                                
}
