<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table    = "product_details";
    protected $fillable = ['ProductID','Name','Price','UPC','Status','Product_Image'];  
}
