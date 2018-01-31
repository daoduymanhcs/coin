<?php

namespace App\Http\Controllers;

use App\Quantstamp;
use App\Token;
use App\Price;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class DraftController extends Controller
{
    function __construct() {
       date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client(['base_uri' => 'http://www.xn--t-in-1ua7276b5ha.com/']);
        $response = $client->get('http://www.xn--t-in-1ua7276b5ha.com/bi%20ai');
        $body = $response->getBody();
        $remainingBytes = $body->getContents();
        $crawler = new Crawler($remainingBytes);
        // $data = $crawler->filter('td[style="line-height:20px;"] h1');
        $data = $crawler->filter('tr td[style="line-height:20px;"]');
        foreach ($data as $domElement) {
            // dd($domElement->nodeValue);
            $domElement = new Crawler($domElement);
            $values = $domElement->filter('td')->children()->each(
                function ($node){
                    if(!empty($node->text())) {
                        echo $node->text().'<br>';
                    }
                }
            );
        }die;
        return view('welcome'); 
    }

    public function market()
    { 
        $records = Token::active();
        if($records)
        {
            foreach ($records as $key => $record) {
                $this->USD = $this->BTC = $this->ETH = $this->volumnUsd = $this->volumnBtc = $this->volumnEth = 0;
                $client = new Client(['base_uri' => 'https://coinmarketcap.com']);
                $response = $client->get($record->url);
                $body = $response->getBody();
                $remainingBytes = $body->getContents();
                $crawler = new Crawler($remainingBytes);
                $dataUsd = $crawler->filter('span[id="quote_price"]');
                $this->USD = $dataUsd->text();
                $nodes = $crawler->filter('span[class="text-gray details-text-medium"]');
                $nodes->each(function ($item, $i) {
                    $i++;
                    if($i == 1)
                    {
                        $this->BTC = $item->text();
                    }
                    if($i == 2) 
                    {
                        $this->ETH = $item->text();
                    }
                });
                $Vnodes = $crawler->filter('div[class="coin-summary-item-detail details-text-medium"]')->eq(1)->filter('span');

                $Vnodes->each(function ($item, $i) {
                    $i++;
                    if($i == 2)
                    {
                        $this->volumnUsd = $item->text();
                    }
                    if($i == 5)
                    {
                        $this->volumnBtc = $item->text();
                    } 
                    if($i == 7)
                    {
                        $this->volumnEth = $item->text();
                    }                                        
                });
                $this->volumnBtc = str_replace( ',', '', trim($this->volumnBtc));
                $this->volumnEth = str_replace( ',', '', trim($this->volumnEth));
                $this->volumnUsd = str_replace( ',', '', trim($this->volumnUsd));
                $connection = new Price;
                $connection->token_id = $record->id;
                $connection->btc = (double)($this->BTC ? $this->BTC : 0);
                $connection->eth = (double)($this->ETH ? $this->ETH : 0);
                $connection->usd = (double)($this->USD ? $this->USD : 0);
                $connection->volumnBtc = (double)($this->volumnBtc ? $this->volumnBtc : 0);
                $connection->volumnEth = (double)($this->volumnEth ? $this->volumnEth : 0);
                $connection->volumnUsd = (double)($this->volumnUsd ? $this->volumnUsd : 0);
                $connection->save();          
            }
        } else {
            echo "Please create new token!!!";
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $today = date("Y-m-d H:i:s");
        echo $today;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
