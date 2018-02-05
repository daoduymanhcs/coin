@extends('layouts.app')
@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    @if (isset($message))
    <div class="alert alert-success">
      <strong>Success!</strong> {{$message}}.
    </div>
    @endif
    <h1 class="page-header">Overview</h1>
    <div class="row">
      <div class="col-md-6">
        <form class="form-inline"  action="{{ route('invests.store') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="sr-only" for="exampleInputPassword3">Amount</label>
            <input type="number" name="amount" class="form-control" id="exampleInputPassword3" placeholder="Amount">
          </div>
          <select name="type" class="form-control">
            <option value="1">Deposit</option>
            <option value="0">Withdraw</option>
          </select>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
      <div class="col-md-6">
        <div class="col-md-6">
          <table class="table">
            <tbody> 
              <tr class="active">
                <td>Amount</td>
              </tr>
              @foreach ($deposits as $record)
              <tr class="{{($record->type) ? "danger" : "success"}}">
                <td>{{$record->amount}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-6">
          <table class="table">
            <tbody> 
              <tr class="active">
                <td>Amount</td>
              </tr>
              @foreach ($withdraw as $record)
              <tr class="{{($record->type) ? "danger" : "success"}}">
                <td>{{$record->amount}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection