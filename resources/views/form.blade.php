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
<form action="{{url('/')}}/admin" method="post">
  @csrf
  <div class="container">
    <h1 class="text-center">Admin</h1>
    <div class="form-group">
      <label for="">Enter your first name</label>
      <input type="text" name="fname" class="form-control" id=""  placeholder="Enter your fname" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
      <div class="form-group">
      <label for="">Enter your last name</label>
      <input type="text" name="lname" class="form-control" id=""  placeholder="Enter your lname" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    <div class="form-group">
      <p>What is your gender?</p>
      <input type="radio" name="gender" value="male"> Male
      <input type="radio" name="gender" value="female"> Female
    </div>
    <div class="form-group">
      <label for="">Age</label>
      <input type="text" name="age" class="form-control" id=""  placeholder="Enter your age" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    <div class="form-group">
      <label for="">Contact_Add</label>
      <input type="text" name="contact_add" class="form-control" id=""  placeholder="Enter your address" aria-describedby="helpId"/>
      {{-- <small id="helpId" class="text-muted">Help text</small> --}}
    </div>
    <div class="form-group">
      <label for="">Contact_email</label>
      <input type="email" name="admin_email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="">Admin_Pass</label>
      <input type="password" name="admin_pass" class="form-control" id="" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</body>
</html>
