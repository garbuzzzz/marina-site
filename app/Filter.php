<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    public function feedbacks() {
			return $this->belongsToMany('App\Feedback');
		}
}
