<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    public function emails()
    {
        return $this->hasMany('App\email');
    }
}
