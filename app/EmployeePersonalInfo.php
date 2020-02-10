<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePersonalInfo extends Model
{

    protected $table = 'employee_personal_infos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['picture', 'age', 'address', 'mobile', 'email', 'file', 'employee_id'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
    
}
