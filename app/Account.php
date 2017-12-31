<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function client()
    {
        return $this->belongsTo(App\Client::class);
    }
}
