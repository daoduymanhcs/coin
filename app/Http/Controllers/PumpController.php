<?php

namespace App\Http\Controllers;

use App\Quantstamp;
use App\Qsplog;

use Illuminate\Http\Request;

class PumpController extends Controller
{
	  function __construct() {
       date_default_timezone_set('Asia/Ho_Chi_Minh');
       $this->date = date("Y-m-d");
    }
    //
    public function index()
    {
		  $top = Quantstamp::top(3, $this->date);
      $dump = Quantstamp::dump(3, $this->date);
		  return view('index/overview')->with('top', $top)
                                    ->with('dump', $dump);
    }

    public function record()
    {
      $top = Quantstamp::top(1, $this->date);
      $dump = Quantstamp::dump(1, $this->date);
      $connection = new Qsplog;
      $connection->high = $top[0]->id;
      $connection->low = $dump[0]->id;
      $connection->save();
    }
}
