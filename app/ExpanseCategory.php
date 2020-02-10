<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpanseCategory extends Model
{

    protected $table = 'expanse_categories';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    protected $fillable = ['category_name'];

    
}
