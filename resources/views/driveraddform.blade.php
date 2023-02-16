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
<form action="{{url('/')}}/driver/add" method="post">
  @csrf
  <div class="container">
    <h1 class="text-center">
      Driver Registration
    </h1>
    <div class="row">
    <div class="form-group">
      <label for="">Enter Driver Name</label>
      <input type="text" name="driver_name" class="form-control" id=""  placeholder="Enter driver name" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>
    <div class="row">
    <div class="form-group">
      <label for="">Enter Commission</label>
      <input type="text" name="commission" class="form-control" id=""  placeholder="Enter commission" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>  
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</body>
</html>
@endsection