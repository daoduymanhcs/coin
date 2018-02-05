<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    //
    public function scopeRecord($query, $id)
    {
        return $query->where('type', '=', $id)->get();
    }
}
