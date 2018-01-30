<?php

namespace App\Http\Controllers;

use App\Quantstamp;

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
            // dd($domElement->filter('h1')->first());
            // dd($domElement->filter('h2'));
            // var_dump($domElement->nodeValue);
        }die;
        return view('welcome'); 
    }

    public function market()
    {
        $client = new Client(['base_uri' => 'https://coinmarketcap.com']);
        $response = $client->get('https://coinmarketcap.com/currencies/quantstamp/');
        $body = $response->getBody();
        $remainingBytes = $body->getContents();
        $crawler = new Crawler($remainingBytes);
        $data = $crawler->filter('span[id="quote_price"]');
        $dataBtc = $crawler->filter('span[class="text-gray details-text-medium"]')->eq(0);
        $dataEth = $crawler->filter('span[class="text-gray details-text-medium"]')->eq(1);
        $volumnEth = $crawler->filter('div[class="coin-summary-item-detail details-text-medium"]')->eq(1)->filter('span')->eq(6); // 1 4 6
        $volumnEth = $volumnEth->text();
        $volumnBtc = $crawler->filter('div[class="coin-summary-item-detail details-text-medium"]')->eq(1)->filter('span')->eq(4); // 1 4 6
        $volumnBtc = $volumnBtc->text();
        $volumnUsd = $crawler->filter('div[class="coin-summary-item-detail details-text-medium"]')->eq(1)->filter('span')->eq(1); // 1 4 6
        $volumnUsd = $volumnUsd->text();
        $BTC = $dataBtc->text();
        $ETH = $dataEth->text();
        $USD = $data->text();
        $volumnBtc = str_replace( ',', '', trim($volumnBtc) );
        settype($volumnBtc, "integer");
        $volumnEth = str_replace( ',', '', trim($volumnEth) );
        settype($volumnEth, "integer");
        $volumnUsd = str_replace( ',', '', trim($volumnUsd) );
        settype($volumnUsd, "integer");
        $connection = new Quantstamp;
        $connection->usd = (double)$USD;
        $connection->btc = (double)$BTC;
        $connection->eth = (double)$ETH;
        $connection->volumnEth = $volumnEth;
        $connection->volumnBtc = $volumnBtc;
        $connection->volumnUsd = $volumnUsd;
        if($connection->save()) 
        {
            echo "done";
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
