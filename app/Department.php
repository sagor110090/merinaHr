<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $table = 'departments';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['department'];

    public function employee()
    {
        return $this->hasMany('App\Employee');
    }
    
}
