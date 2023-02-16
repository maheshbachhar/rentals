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
          All Customer Details
        </h1>
      <a href="{{route('customer.add')}}"><button class="btn btn-primary d-inline-block m-2 float-right">add</button></a>
        <table class="table">
          <thead>
            <tr>
            <th>id</th>   
            <th>fname</th>
              <th>lname</th>
              <th>gender</th>
              <th>age</th>
              <th>contact_address</th>
              <th>customer_email</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($customer as $customer)
            <tr>
              <td>{{$customer->id}}</td>  
              <td>{{$customer->fname}}</td>
              <td>{{$customer->lname}}</td>
              <td>
              @if($customer->gender == "M")
                        Male 
                        @else
                        Female 
                        @endif
              </td>
              <td>{{$customer->age}}</td>
              <td>{{$customer->contact_address}}</td>
              <td>{{$customer->customer_email}}</td>
              <td>
              <a href="{{route('customer.delete', ['id' => $customer->id])}}"><button class="btn btn-danger">Delete</button></a>
              <a href="{{route('customer.edit', ['id' => $customer->id])}}"><button class="btn btn-primary">Edit</button></a>
              </td>
            </tr>
            @endforeach   
          </tbody>
        </table>
      </div>
  </body>
</html>
@endsection