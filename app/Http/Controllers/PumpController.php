<?php

namespace App\Http\Controllers;

use App\Quantstamp;

use Illuminate\Http\Request;

class PumpController extends Controller
{
	function __construct() {
       date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    //
    public function index()
    {
    	$date = date("Y-m-d");
		$top = Quantstamp::where('created_at', '>' , $date.' 00:00:00')
				->where('created_at', '<' , $date.' 23:23:59')
				->orderBy('eth', 'desc')
               	->take(3)
               	->get();
        $dump = Quantstamp::where('created_at', '>' , $date.' 00:00:00')
				->where('created_at', '<' , $date.' 23:23:59')
				->orderBy('eth', 'asc')
               	->take(3)
               	->get();
		return view('index/overview')->with('top', $top)->with('dump', $dump);
    }
}
