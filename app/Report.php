<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    public function scopeReporthigh($query, $number, $id)
    {
        return $query->limit($number)
        				->join('prices', 'reports.high_id', '=', 'prices.id')
        				->Where('prices.token_id', '=', $id)
        				->orderBy('reports.created_at', 'desc')
               	      	->get();
    }
    public function scopeReportlow($query, $number, $id)
    {
        return $query->limit($number)
        				->join('prices', 'reports.low_id', '=', 'prices.id')
        				->Where('prices.token_id', '=', $id)
        				->orderBy('reports.created_at', 'desc')
               	      	->get();
    }
}
