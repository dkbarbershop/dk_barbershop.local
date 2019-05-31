<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BsObject extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    protected $fillable = ['name','name_rus','address','creator','image','last_modifer','comment'];
}
