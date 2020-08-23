<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps = false;//set time to false
    protected $fillable =[
       'product_code', 'product_name', 'category_id', 'brand_id', 'product_desc', 'product_content' ,'product_details' ,'product_status'
    ];
    protected $primaryKey ='product_id';
    protected $table ='tbl_product';
}
