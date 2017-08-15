<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Import Carbon
use Carbon\Carbon;

class Article extends Model
{
    // FILLABLE OPTION
    protected $fillable = [
    'user_id', 'content', 'live', 'post_on'
    ];

    // DATES ISSUE - Edit function -CRUD
    // This is now a Carbon instance
    protected $dates = ['post_on'];
	
	// GUARDED OPTION - Alternative
    // protected $guarded = ['id'];
    
    // Create a mutator for the boolean Live
    public function setLiveAttribute($value)
    {
    	$this->attributes['live'] = (boolean)($value);
    }

    // Create an assessor for a shortest content
    public function getShortContentAttribute()
    {
        return substr($this->content, 0, random_int(60, 150)) . '...';
    }

    // Create a mutator for the Post_on error - Carbon
    public function setPostOnAttribute($value)
    {
        $this->attributes['post_on'] = Carbon::parse($value); 
    }
}
