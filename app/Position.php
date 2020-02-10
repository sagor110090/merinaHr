<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{

    protected $table = 'positions';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['position'];

    
}
