<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $table = 'attendances';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['employee_id', 'attendance', 'late', 'date'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
    
}
