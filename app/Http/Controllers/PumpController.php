<?php

namespace App\Http\Controllers;

use App\Token;
use App\Price;
use App\Report;

use Illuminate\Http\Request;

class PumpController extends Controller
{
	  function __construct() {
       date_default_timezone_set('Asia/Ho_Chi_Minh');
       $this->date = date("Y-m-d");
    }
    //
    public function index($id)
    {
      $token = Token::detail($id);
		  $top = Price::top(3, $this->date, $id);
      $dump = Price::dump(3, $this->date, $id);
      $reporthigh = Report::reporthigh(5);
      $reportlow = Report::reportlow(5);
		  return view('index/overview')->with('top', $top)
                                    ->with('token', $token)
                                    ->with('dump', $dump)
                                    ->with('reporthigh', $reporthigh)
                                    ->with('reportlow', $reportlow);
    }

    public function record()
    {
      $records = Token::active();
      if($records)
      {
        foreach ($records as $key => $record) {
          # code...
          $top = Price::top(1, $this->date, $record->id);
          $dump = Price::dump(1, $this->date, $record->id);
          $connection = new Report;
          $connection->token_id = $record->id;
          $connection->high_id = $top[0]->id;
          $connection->low_id = $dump[0]->id;
          $connection->save();
        }
      }
    }
}
