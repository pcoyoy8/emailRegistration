<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class email extends Model
{
    public function country()
    {
        return $this->belongsTo('App\country');
    }
}
