<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id','product_type_id','category_id','title','body','price','url_latin','attributes','images','stock'];


}
