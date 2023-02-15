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
      <a href="{{route('cars.add')}}">
      <button class="btn btn-primary d-inline-block m-2 float-right">add</button>
        <table class="table">
          <thead>
            <tr>
            <th>id</th>  
            <th>car_number</th>
              <th>car_model</th>
              <th>rent_price</th>
              <th>driver_id</th>
              <th>car_status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cars as $cars)
            <tr>
            <td>{{$cars->id}}</td>
            <td>{{$cars->car_number}}</td>
              <td>{{$cars->car_model}}</td>
              <td>{{$cars->rent_price}}</td>
              <td>{{$cars->driver_id}}</td>
              <td>
                @if($cars->car_status == "1")
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
              <a href="{{route('cars.delete', ['id' => $cars->id])}}"><button class="btn btn-danger">Delete</button></a>
              <a href="{{route('cars.edit', ['id' => $cars->id])}}"><button class="btn btn-primary">Edit</button></a>
              </td>
            </tr>
            @endforeach   
          </tbody>
        </table>
      </div>
  </body>
</html>