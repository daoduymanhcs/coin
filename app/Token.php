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
    // get detail of token
    public function scopeDetail($query, $id)
    {
        return $query->Where('id', $id)->first();
    }
}
