<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public function scopeTop($query, $number, $date, $token)
    {
        return $query->where('created_at', '>' , $date.' 00:00:00')
        			  ->Where('token_id', '=', $token)
				      ->where('created_at', '<' , $date.' 23:23:59')
				      ->orderBy('usd', 'desc')
               	      ->take($number)
               	      ->get();
    }

    public function scopeDump($query, $number, $date, $token)
    {
        return $query->where('created_at', '>' , $date.' 00:00:00')
        		->Where('token_id', '=', $token)
				->where('created_at', '<' , $date.' 23:23:59')
				->orderBy('usd', 'asc')
               	->take($number)
               	->get();
    }
}
