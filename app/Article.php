<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // FILLABLE OPTION
    protected $fillable = [
    'user_id', 'content', 'live', 'post_on'
    ];
	
	// GUARDED OPTION - Alternative
    // protected $guarded = ['id'];

    public function setLiveAttribute($value)
    {
    	$this->attributes['live'] = (boolean)($value);
    }
}
