<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $table = 'employees';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['department_id', 'position_id', 'start_date', 'end_date','fname','lname','salary'];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
    public function position()
    {
        return $this->belongsTo('App\Position');
    }
    public function attendance()
    {
        return $this->hasMany('App\Attendance');
    }
    public function schedule()
    {
        return $this->hasOne('App\Schedule');
    }
    
}
