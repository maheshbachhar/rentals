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
<form action="{{$url}}/add" method="post">
  @csrf
  <div class="container">
    <h1 class="text-center">
      {{$title}}
    </h1>
    <div class="form-group">
      <label for="">Enter Bike Number</label>
      <input type="text" name="bike_number" class="form-control" value="{{$bikes->bike_number}}" id=""  placeholder="Enter bike_number" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
      <div class="form-group">
      <label for="">Enter Bike Model</label>
      <input type="text" name="bike_model" class="form-control" value="{{$bikes->bike_model}}" id=""  placeholder="Enter bike_model" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    <div class="form-group">
    <label for="">Enter Bike Status</label>
      <input type="text" name="bike_status" class="form-control" value="{{$bikes->bike_status}}" id=""  placeholder="Enter bike_status" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    <div class="form-group">
      <label for="">Rent Price</label>
      <input type="text" name="rent_price" class="form-control" value="{{$bikes->rent_price}}" id=""  placeholder="Enter rent_price" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    <div class="form-group">
      <label for="">Drive Id</label>
      <input type="text" name="driver_id" class="form-control" value="{{$bikes->driver_id}}" id=""  placeholder="Enter driver_id" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</body>
</html>


@endsection