<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'author', 'position', 'description', 'text', 'image_little', 'image'
	];
	public function filters() {
		return $this->belongsToMany('App\Filter');
	}
}
