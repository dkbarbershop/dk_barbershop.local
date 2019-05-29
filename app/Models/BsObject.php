<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BsObject extends Model
{
    protected $fillable = ['name','name_rus','address','creator','image','last_modifer','comment'];
}
