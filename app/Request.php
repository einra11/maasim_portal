<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //
    //Table Name
    protected $table = 'requests';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
