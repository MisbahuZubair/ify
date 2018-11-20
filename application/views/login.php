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
  
  <style>
  img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  padding:0;
	}
</style>
</head>
<body> 
<div class="container">

<nav class="navbar navbar-expand-xl shadow-sm p-3 mb-5 navbar-dark bg-secondary rounded" style="background-color:#EDE3E4">
    <a class="navbar-left" href="#">
        <a href="<?php echo site_url('bills/getBills/all/all'); ?>"><img src="<?php echo site_url('application/views/logo.png'); ?>" style="max-height:32px;"alt=""></a>
  </a>

      <div class="navbar-left" style="margin-left:20px; color:white">
         <h6>Assemblify</h6>
            </div>
</nav>
    </div>
<div class="container" >
    <?php echo form_open_multipart(''); ?>
    <div class="row"><div class="col-md-4" style="margin: 0 auto">
    <div class="card shadow-sm p-3 mb-5 rounded">
    <div class="form-group">
        <label>Username</label>
        <input type = "text" class ="form-control " name="username" required/>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type = "password" class ="form-control " name="password" required/>
    </div>
    <button type="submit" class="btn btn-secondary">Login</button>
        </div>
</div></div>
</div>
</body>
</html>
