<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{

    protected $table = 'salaries';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['amount', 'fine', 'month', 'employee_id', 'bank_id', 'chcek_no', 'date'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }
    
}
