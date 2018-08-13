<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Assemblify</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body> 
 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow" style="box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
      <h5 class="my-0 mr-md-auto font-weight-normal">Assemblify</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Bills</a>
        <a class="p-2 text-dark" href="#">Senate</a>
        <a class="p-2 text-dark" href="#">House</a>
        <a class="p-2 text-dark" href="#">Issues</a>
      </nav>
      <a class="btn btn-outline-success" href="#">Log In</a>
    </div>

    <!--<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h4 class="display-4">Make your voice heard</h4>
    </div> --> 
<div class="container">
    
    <?php if (isset($_SESSION['success'])) { ?>
    <div class="alert alert-success"> <?php echo $_SESSION['success']; ?> </div>
    <?php } ?>
    
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>');?> 
    <form action="" method="POST">
    
    <div class ="form-group">
        <label for="firstname" class="label-default">First Name:</label>
        <input class="form-control" name="firstname" id="firstname" type="text">
    </div>
    
    <div class ="form-group">
        <label for="lastname" class="label-default">Last Name:</label>
        <input class="form-control" name="lastname" id="lastname" type="text">
    </div>
    
    <div class ="form-group">
        <label for="email" class="label-default">Email:</label>
        <input class="form-control" name="email" id="email" type="text">
    </div>
    
    <div class ="form-group">
        <label for="username" class="label-default">Username:</label>
        <input class="form-control" name="username" id="username" type="text">
    </div>
    
    <div class ="form-group">
        <label for="password" class="label-default">Password:</label>
        <input class="form-control" name="password" id="password" type="password">
    </div>
        
     <div class ="form-group">
        <label for="password" class="label-default">Confirm Password:</label>
        <input class="form-control" name="cpassword" id="password" type="password">
    </div>
    
    <div class ="form-group">
        <label for="gender" class="label-default">Gender:</label>
        <select class="form-control" id="gender" name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select> 
    </div>
    
    <div class ="form-group">
        <label for="state" class="label-default">State:</label>
        <input class="form-control" name="state" id="state" type="text">
    </div>
    
    <div class ="form-group">
        <label for="lga" class="label-default">LGA:</label>
        <input class="form-control" name="lga" id="lga" type="text">
    </div>
    
    <div class ="text-center">
        <button class="btn btn-primary" name='register' >Register</button>
    </div>
    
    </form>
</div>
</body>
</html>
