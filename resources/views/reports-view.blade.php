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
          All Reports Details
        </h1>
      <a href="{{route('reports.add')}}"><button class="btn btn-primary d-inline-block m-2 float-right">add</button></a>
        <table class="table">
          <thead>
            <tr>
            <th>id</th>   
            <th>transaction_id</th>
              <th>rental_id</th>
              <th>report_date</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reports as $reports)
            <tr>
              <td>{{$reports->id}}</td>  
              <td>{{$reports->transaction_id}}</td>
              <td>{{$reports->rental_id}}</td>
              <td>{{$reports->report_date}}</td>
              
              <td>
              <a href="{{route('reports.delete', ['id' => $reports->id])}}"><button class="btn btn-danger">Delete</button></a>
              <a href="{{route('reports.edit', ['id' => $reports->id])}}"><button class="btn btn-primary">Edit</button></a>
              </td>
            </tr>
            @endforeach   
          </tbody>
        </table>
      </div>
  </body>
</html>
@endsection