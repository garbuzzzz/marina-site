<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'name', 'alias', 'text', 'image'
	];
}
