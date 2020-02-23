<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'companies';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['name',
    'email',
    'address',
    'holidays',
    'break_time',
    'logo1',
    'logo2'];

    
}