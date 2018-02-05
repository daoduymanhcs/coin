@extends('layouts.app')
@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">{{$token->name}} ({{$token->short_name}})<a class="pull-right" target="_blank" href="{{$token->url}}">link</a></h1>
    <div class="row placeholders">
      <div class="col-md-6">
        <h3>DUMP</h3>
        <table class="table">
          <tbody> 
            <tr class="active">
              <td>Eth</td>
              <td>Usd</td>
              <td>ETH volumn</td>
              <td>% Volumn</td>
              <td>Time</td>
            </tr>
            @foreach ($dump as $data)
            <tr class="warning">
              <td>{{$data->eth}}</td>
              <td>{{number_format($data->usd, 3, '.', '')}}</td>
              <td>{{$data->volumnEth}}</td>
              <td>{{number_format(($data->volumnUsd / $data->capUsd) * 100, 2, '.', '')}}</td>
              <td class="danger">{{$data->created_at}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <h3>BUMP</h3>
        <table class="table">
          <tbody> 
            <tr class="active">
              <td>Eth</td>
              <td>Usd</td>
              <td>ETH volumn</td>
              <td>% Volumn</td>
              <td>Time</td>
            </tr>
            @foreach ($top as $data)
            <tr class="success">
              <td>{{$data->eth}}</td>
              <td>{{number_format($data->usd, 3, '.', '')}}</td>
              <td>{{$data->volumnEth}}</td>
              <td>{{number_format(($data->volumnUsd / $data->capUsd) * 100, 2, '.', '')}}</td>
              <td class="danger">{{$data->created_at}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <h2 class="page-header">5 days records</h2>
    <div class="row placeholders">
      <div class="col-md-6">
        <table class="table">
          <tbody> 
            <tr class="active">
              <td>Eth</td>
              <td>Usd</td>
              <td>ETH volumn</td>
              <td>% Volumn</td>
              <td>Time</td>
            </tr>
            @foreach ($reportlow as $data)
            <tr class="warning">
              <td>{{$data->eth}}</td>
              <td>{{number_format($data->usd, 3, '.', '')}}</td>
              <td>{{$data->volumnEth}}</td>
              <td>{{number_format(($data->volumnUsd / $data->capUsd) * 100, 2, '.', '')}}</td>
              <td class="danger">{{$data->created_at}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>         
      </div>
      <div class="col-md-6">
        <table class="table">
          <tbody> 
            <tr class="active">
              <td>Eth</td>
              <td>Usd</td>
              <td>ETH volumn</td>
              <td>% Volumn</td>
              <td>Time</td>
            </tr>
            @foreach ($reporthigh as $data)
            <tr class="success">
              <td>{{$data->eth}}</td>
              <td>{{number_format($data->usd, 3, '.', '')}}</td>
              <td>{{$data->volumnEth}}</td>
              <td>{{number_format(($data->volumnUsd / $data->capUsd) * 100, 2, '.', '')}}</td>
              <td class="danger">{{$data->created_at}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>         
      </div>
    </div>
  </div>
@endsection