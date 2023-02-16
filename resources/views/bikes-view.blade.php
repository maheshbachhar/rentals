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
          All Bikes Details
        </h1>
      <a href="{{route('bikes.add')}}">
      <button class="btn btn-primary d-inline-block m-2 float-right">add</button>
        <table class="table">
          <thead>
            <tr>
            <th>id</th>  
            <th>bike_number</th>
              <th>bike_model</th>
              <th>rent_price</th>
              <th>driver_id</th>
              <th>bike_status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bikes as $bikes)
            <tr>
            <td>{{$bikes->id}}</td>
            <td>{{$bikes->bike_number}}</td>
              <td>{{$bikes->bike_model}}</td>
              <td>{{$bikes->rent_price}}</td>
              <td>{{$bikes->driver_id}}</td>
              <td>
                @if($bikes->bike_status == "1")
                <button class="btn">
                  <span class="badge badge-primary">Active</span>
                </button>
                @else
                <button class="btn">
                  <span class="badge badge-danger">Inactive</span>
                </button>
                @endif
              </td>
              
              <td>
              <a href="{{route('bikes.delete', ['id' => $bikes->id])}}"><button class="btn btn-danger">Delete</button></a>
              <a href="{{route('bikes.edit', ['id' => $bikes->id])}}"><button class="btn btn-primary">Edit</button></a>
              </td>
            </tr>
            @endforeach   
          </tbody>
        </table>
      </div>
  </body>
</html>
@endsection