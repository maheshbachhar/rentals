@extends('welcome')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<form action="{{$url}}" method="post">
  @csrf
  <div class="container">
    <h1 class="text-center">
      Update Cars 
    </h1>
    
    <div class="row">
    <div class="form-group">
      <label for="">Enter Car Number</label>
      <input type="text" name="car_number" class="form-control" id="" value="{{$cars->car_number}}" placeholder="Enter car number" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>  
    <div class="row">
    <div class="form-group">
      <label for="">Enter Car Model</label>
      <input type="text" name="car_model" class="form-control" id="" value="{{$cars->car_model}}" placeholder="Enter car model" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div> 
    <div class="row">
    <div class="form-group">
      <label for="">Enter Car Status</label>
      <input type="text" name="car_status" class="form-control" id="" value="{{$cars->car_status}}" placeholder="Enter car status" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>
    <div class="row">
    <div class="form-group">
      <label for="">Enter Rent Price</label>
      <input type="text" name="rent_price" class="form-control" id="" value="{{$cars->rent_price}}" placeholder="Enter rent price" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>
    <div class="row">
    <div class="form-group">
      <label for="">Enter Driver Id</label>
      <input type="text" name="driver_id" class="form-control" id="" value="{{$cars->driver_id}}" placeholder="Enter driver id" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</body>
</html>
@endsection