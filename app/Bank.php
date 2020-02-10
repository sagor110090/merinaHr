<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{

    protected $table = 'banks';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['bank_name', 'account_name', 'branch', 'account_Id'];

    
}
