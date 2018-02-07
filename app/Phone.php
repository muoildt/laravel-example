<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
	/**
	 * [$fillable description]
	 * @var [type]
	 */
    protected $fillable = [
        'name', 'number',
    ];

    public function member() {
      
        return $this->belongsToMany('App\Phone');
    }
}
