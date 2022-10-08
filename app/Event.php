<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "exchanges";

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
