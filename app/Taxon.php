<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxon extends Model
{
    protected $fillable = ['id','title','url_latin', 'vocab_id'];
}
