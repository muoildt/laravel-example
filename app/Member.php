<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Member extends Model
{
	use Searchable;
    
    protected $fillable = [
        'first_name', 'surname', 'email'
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    
    public function searchableAs()
    {
        return 'index';
    }

    /**
     * relationship 1-1. 
     * @return [type] [description]
     */
    
    public function phone()
    {
        return $this->hasOne('App\Phone');
    }

    /**
     * Dinh nghia moi quan hej giua Member va phone;
     * co the co member_id hoac khong. laravel se tu hieu
     * 
     * @return [type] [description]
     */
    
    /*public function phone()
    {
        return $this->hasOne('App\Phone','member_id');
    }*/
}
