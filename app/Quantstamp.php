<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quantstamp extends Model
{
    //
    protected $table = 'quantstamps';
    public function scopeTop($query, $number, $date)
    {
        return $query->where('created_at', '>' , $date.' 00:00:00')
				->where('created_at', '<' , $date.' 23:23:59')
				->orderBy('eth', 'desc')
               	->take($number)
               	->get();
    }

    public function scopeDump($query, $number, $date)
    {
        return $query->where('created_at', '>' , $date.' 00:00:00')
				->where('created_at', '<' , $date.' 23:23:59')
				->orderBy('eth', 'asc')
               	->take($number)
               	->get();
    }
}
