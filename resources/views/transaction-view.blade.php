@extends('welcome')
@section('content')
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
      <h1 class="text-center">
          All Transaction Details
        </h1>
      <a href="{{route('transaction.add')}}"><button class="btn btn-primary d-inline-block m-2 float-right">add</button></a>
        <table class="table">
          <thead>
            <tr>
              <th>id</th>  
              <th>transaction_name</th>
              <th>rental_id</th>
              <th>bike_id</th>
              <th>car_id</th>
              <th>customer_id</th>
              <th>admin_id</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transaction as $transaction)
            <tr>
              <td>{{$transaction->id}}</td>
              <td>{{$transaction->transaction_name}}</td>
              <td>{{$transaction->rental_id}}</td>
              <td>{{$transaction->bike_id}}</td>
              <td>{{$transaction->car_id}}</td>
              <td>{{$transaction->customer_id}}</td>
              <td>{{$transaction->admin_id}}</td>
              
              <td>
              <a href="{{route('transaction.delete', ['id' => $transaction->id])}}"><button class="btn btn-danger">Delete</button></a>
              <a href="{{route('transaction.edit', ['id' => $transaction->id])}}"><button class="btn btn-primary">Edit</button></a>
              </td>
            </tr>
            @endforeach   
          </tbody>
        </table>
      </div>
  </body>
</html>
@endsection