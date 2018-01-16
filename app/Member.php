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
}
