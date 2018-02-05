<?php

namespace App\Http\Controllers;

use App\Investment;
use Illuminate\Http\Request;

class MainController extends Controller
{
    // type = 1 Deposit
    public function index(Request $request)
    {
    	$message = $request->session()->get('status');
    	$deposits = Investment::record(1);
    	$withdraw = Investment::record(0);
        return view('index/index')->with('message', $message)
							        ->with('deposits', $deposits)
							        ->with('withdraw', $withdraw);
    }
}
