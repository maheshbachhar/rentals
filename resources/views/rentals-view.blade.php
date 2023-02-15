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
      <a href="{{route('rentals.add')}}">
      <button class="btn btn-primary d-inline-block m-2 float-right">add</button>
        <table class="table">
          <thead>
            <tr>
            <th>id</th>  
            <th>rental_number</th>
              <th>rent_date</th>
              <th>arrive_date</th>
              <th>destination</th>
              <th>return_date</th>
              <th>payment</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rentals as $rentals)
            <tr>
            <td>{{$rentals->id}}</td>
            <td>{{$rentals->rental_number}}</td>
              <td>{{$rentals->rent_date}}</td>
              <td>{{$rentals->arrive_date}}</td>
              <td>{{$rentals->destination}}</td>
              <td>{{$rentals->return_date}}</td>
              <td>{{$rentals->payment}}</td>
              
              <td>
              <a href="{{route('rentals.delete', ['id' => $rentals->id])}}"><button class="btn btn-danger">Delete</button></a>
              <a href="{{route('rentals.edit', ['id' => $rentals->id])}}"><button class="btn btn-primary">Edit</button></a>
              </td>
            </tr>
            @endforeach   
          </tbody>
        </table>
      </div>
  </body>
</html>