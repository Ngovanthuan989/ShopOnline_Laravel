<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    public $timestamps = false;//set time to false
    protected $fillable =[
        'brand_code','brand_name', 'brand_desc', 'brand_status'
    ];
    protected $primaryKey ='brand_id';
    protected $table ='tbl_brand_product';

    // public function product()
    // {
    //     # code...
    //     return $this->hasMany('App/Product','brand_id');
    // }

}
