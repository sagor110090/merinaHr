<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    protected $table = 'schedules';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['start_time', 'end_time', 'starting_date', 'ending_date', 'employee_id','restDay'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
    
}
