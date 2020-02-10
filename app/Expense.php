<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{

    protected $table = 'expenses';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['expanse_categories_id', 'amount', 'date'];

    public function expanseCategories()
    {
        return $this->belongsTo('App\ExpanseCategory');
    }
    
}
