<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    //
    public $timestamps = false;//set time to false
    protected $fillable =[
       'images_name', 'product_id'
    ];
    protected $primaryKey ='images_id';
    protected $table ='tbl_images';
}
