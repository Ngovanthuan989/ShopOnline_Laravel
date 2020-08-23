<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    //
    public $timestamps = false;//set time to false
    protected $fillable =[
        'size_name', 'product_id'
    ];
    protected $primaryKey ='size_id';
    protected $table ='tbl_size';
}
