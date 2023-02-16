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
          All Driver Details
        </h1>
      <a href="{{route('driver.add')}}"><button class="btn btn-primary d-inline-block m-2 float-right">add</button></a>
        <table class="table">
          <thead>
            <tr>
              <th>id</th>   
              <th>driver_name</th>
              <th>commission</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($driver as $driver)
            <tr>
              <td>{{$driver->id}}</td>  
              <td>{{$driver->driver_name}}</td>
              <td>{{$driver->commission}}</td>
             
              <td>
              <a href="{{route('driver.delete', ['id' => $driver->id])}}"><button class="btn btn-danger">Delete</button></a>
              <a href="{{route('driver.edit', ['id' => $driver->id])}}"><button class="btn btn-primary">Edit</button></a>
              </td>
            </tr>
            @endforeach   
          </tbody>
        </table>
      </div>
  </body>
</html>
@endsection