<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{

    protected $table = 'leaves';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['employee_id', 'application', 'file', 'status','date'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
    
}
