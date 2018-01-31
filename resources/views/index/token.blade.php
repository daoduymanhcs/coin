@extends('layouts.app')
@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    @if (isset($message))
    <div class="alert alert-success">
      <strong>Success!</strong> {{$message}}.
    </div>
    @endif
    <h1 class="page-header">Tokens</h1>
    <div class="row placeholders">
      <form class="form-inline"  action="{{ route('tokens.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail3">Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail3" placeholder="Name">
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputPassword3">Short Name</label>
          <input type="text" name="short_name" class="form-control" id="exampleInputPassword3" placeholder="Short Name">
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputPassword4">URLs</label>
          <input type="text" name="url" class="form-control" id="exampleInputPassword4" placeholder="URL">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
    <table class="table">
      <tbody> 
        <tr class="active">
          <td>No</td>
          <td>Name</td>
          <td>Short Name</td>
          <td>Urls</td>
        </tr>
        @foreach ($records as $record)
        <tr class="{{($record->active) ? "success" : "danger"}}">
          <td>{{$record->id}}</td>
          <td>{{$record->name}}</td>
          <td>{{$record->short_name}}</td>
          <td>{{$record->url}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection