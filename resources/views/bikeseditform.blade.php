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
      Bikes Registration
    </h1>
    
    <div class="row">
    <div class="form-group">
      <label for="">Enter Bike Number</label>
      <input type="text" name="bike_number" class="form-control" id="" value="{{$bikes->bike_number}}" placeholder="Enter bike number" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>  
    <div class="row">
    <div class="form-group">
      <label for="">Enter Bike Model</label>
      <input type="text" name="bike_model" class="form-control" id="" value="{{$bikes->bike_model}}" placeholder="Enter bike model" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div> 
    <div class="row">
    <div class="form-group">
      <label for="">Enter Bike Status</label>
      <input type="text" name="bike_status" class="form-control" id="" value="{{$bikes->bike_status}}" placeholder="Enter bike status" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>
    <div class="row">
    <div class="form-group">
      <label for="">Enter Rent Price</label>
      <input type="text" name="rent_price" class="form-control" id="" value="{{$bikes->rent_price}}" placeholder="Enter rent price" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>
    <div class="row">
    <div class="form-group">
      <label for="">Enter Driver Id</label>
      <input type="text" name="driver_id" class="form-control" id="" value="{{$bikes->driver_id}}" placeholder="Enter driver id" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</body>
</html>
@endsection