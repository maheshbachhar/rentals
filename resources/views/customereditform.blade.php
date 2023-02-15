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
      Update Customer 
    </h1>
    <div class="row">
    <div class="form-group">
      <label for="">Enter your first name</label>
      <input type="text" name="fname" class="form-control" id="" value="{{$customer->fname}}" placeholder="Enter your fname" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>
    <div class="row">
    <div class="form-group">
      <label for="">Enter your last name</label>
      <input type="text" name="lname" class="form-control" id="" value="{{$customer->lname}}" placeholder="Enter your lname" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>  
    <div class="row">
    <div class="form-group col-md-6">
      <label for="gender">gender</label><br/>
      <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="gender" id="male" value="M" value="M" {{$customer->gender == "M" ? "checked" : ""}}>
        <label for="male" class="form-check-label">Male</label>
      </div>
      <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="gender" id="female" value="F" value="F" {{$customer->gender == "F" ? "checked" : ""}}>
        <label for="female" class="form-check-label">female</label>
      </div>
    </div>
    </div>
    <div class="row">
    <div class="form-group">
      <label for="">Age</label>
      <input type="text" name="age" class="form-control" id="" value="{{$customer->age}}" placeholder="Enter your age" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>
    <div class="row">
    <div class="form-group">
      <label for="">Contact_Address</label>
      <input type="text" name="contact_address" class="form-control" id="" value="{{$customer->contact_address}}" placeholder="Enter your address" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    </div>
    <div class="row">
    <div class="form-group">
      <label for="">Customer_email</label>
      <input type="email" name="customer_email" class="form-control" id="" value="{{$customer->customer_email}}" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
</body>
</html>
@endsection