<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ApiPost extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //customize the data that my api will provide
        return parent::toArray($request);
    }

    public function with($request){
        return [
            'version' => '1.0.0',
            'Developed_by' => 'Dev1loperOne'
        ];
    }
}
