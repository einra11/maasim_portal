<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Http\Resources\ApiPost as ApiPostResource;

class ApiPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get Articles
        $announcements = Post::paginate(15);

        //return collection of announcements as a resource
        return ApiPostResource::collection($announcements);
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
        $post = $request->isMethod('put') ? Post::findOrFail($request->id) : new Post;

        $post->id = $request->input('id');
        $post->annc_title = $request->input('annc_title');
        $post->annc_content = $request->input('annc_content');
        $post->user_id= '1';
        $post->cover_image = $request->input('cover_image');

        if($post->save()){
            return new ApiPostResource($post);
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
        //Get single announcement
        $announcement = Post::findOrFail($id);
        //Return single announcement as resource
        return new ApiPostResource($announcement);
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
                $announcement = Post::findOrFail($id);
                if($announcement->delete()){
                return new ApiPostResource($announcement);
                }
    }
}
