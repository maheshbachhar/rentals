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
      Rentals Registration
    </h1>
    
    <div class="row">
    <div class="form-group">
      <label for="">Enter Rental Number</label>
      <input type="text" name="rental_number" class="form-control" id="" value="{{$rentals->rental_number}}" placeholder="Enter rental number" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>  
    <div class="row">
    <div class="form-group">
      <label for="">Enter Rent Date</label>
      <input type="text" name="rent_date" class="form-control" id="" value="{{$rentals->rent_date}}" placeholder="Enter rent date" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div> 
    <div class="row">
    <div class="form-group">
      <label for="">Enter Arrive Date</label>
      <input type="text" name="arrive_date" class="form-control" id="" value="{{$rentals->arrive_date}}" placeholder="Enter arrive date" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>
    <div class="row">
    <div class="form-group">
      <label for="">Enter Destination</label>
      <input type="text" name="destination" class="form-control" id="" value="{{$rentals->destination}}" placeholder="Enter destination" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>
    <div class="row">
    <div class="form-group">
      <label for="">Enter Return Date</label>
      <input type="text" name="return_date" class="form-control" id="" value="{{$rentals->return_date}}" placeholder="Enter return date" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>
    <div class="row">
    <div class="form-group">
      <label for="">Enter Payment</label>
      <input type="text" name="payment" class="form-control" id="" value="{{$rentals->payment}}" placeholder="Enter payment" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
</body>
</html>
@endsection