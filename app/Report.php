<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    public function scopeReporthigh($query, $number)
    {
        return $query->limit($number, $id)
        				->join('prices', 'reports.high_id', '=', 'prices.id')
        				->Where('reports', '=', $id)
        				->orderBy('reports.created_at', 'desc')
               	      	->get();
    }
    public function scopeReportlow($query, $number)
    {
        return $query->limit($number, $id)
        				->join('prices', 'reports.low_id', '=', 'prices.id')
        				->Where('reports', '=', $id)
        				->orderBy('reports.created_at', 'desc')
               	      	->get();
    }
}
