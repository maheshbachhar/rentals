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
    <h1 align ="center">List of Admin</h1>
      <div class="container">
      <a href="{{route('admin.add')}}">
      <button class="btn btn-primary d-inline-block m-2 float-right">add</button>
        <table class="table">
          <thead>
            <tr>
              <th>fname</th>
              <th>lname</th>
              <th>gender</th>
              <th>age</th>
              <th>contact_address</th>
              <th>admin_email</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($admin as $admin)
            <tr>
              <td>{{$admin->fname}}</td>
              <td>{{$admin->lname}}</td>
              <td>
              @if($admin->gender == "M")
                        Male 
                        @else
                        Female 
                        @endif
              </td>
              <td>{{$admin->age}}</td>
              <td>{{$admin->contact_address}}</td>
              <td>{{$admin->admin_email}}</td>
              <td>
              <a href="{{route('admin.delete', ['id' => $admin->id])}}"><button class="btn btn-danger">Delete</button>
              <button class="btn btn-primary">Edit</button>
              </td>
            </tr>
            @endforeach   
          </tbody>
        </table>
      </div>
  </body>
</html>