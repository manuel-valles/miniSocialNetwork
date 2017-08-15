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
    
    // Create a mutator for the boolean Live
    public function setLiveAttribute($value)
    {
    	$this->attributes['live'] = (boolean)($value);
    }

    // Create an assessor for a shortest content
    public function getShortContentAttribute($value)
    {
        return substr($this->content, 0, random_int(60, 150)) . '...';
    }
}
