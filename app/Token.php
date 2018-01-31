<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public function scopeRecord($query)
    {
        return $query->get();
    }

    public function scopeActive($query)
    {
        return $query->Where('active', true)->get();
    }

}
