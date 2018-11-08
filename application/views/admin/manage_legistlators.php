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
<nav class="navbar navbar-expand-md  navbar-dark bg-success" style="margin-bottom: 20px;">
  <a class="navbar-brand" href="#">Assemblify Admin Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse justify-content-between navbar-collapse navbar-right" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/dashboard');?>">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/dashboard/addBill');?>">Add Bill</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>    
    </ul>
      <a class="btn btn-outline-light" href="<?php echo site_url('admin/auth/logout');?>">Log Out</a>
      
  </div>  
</nav>
    
<div class="container">
<!--<form method ="post"> -->
<?php echo form_open_multipart(''); ?>
    <div class="form-group">
        <label>Chamber</label>
        <div class="radio">
            <label><input type="radio" class ="form-control" name="chamber" value ="House" checked>House</label>
            <br>
            <label><input type="radio" class ="form-control" name="chamber" value ="Senate">Senate</label>
        </div>
    </div>
    
    <div class="form-group">
        <label>Name</label>
        <input type = "text" class ="form-control" name="name" required/>
    </div>
    
    <div class="form-group">
        <label>Party</label>
        <input type = "text" class ="form-control" name="party" required/>
    </div>
    
    <div class="form-group">
        <label>State</label>
         <select class ="form-control" name="state" id="state">
            <option value="in consideration">Abia</option>
            <option value="passed">Adamawa</option>
            <option value="thrown out">Bauchi</option>
            <option value="thrown out">Benin</option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
            <option value="thrown out"></option>
        </select>
    </div>
    
    <div class="form-group">
        <label>Constituency</label>
        <input type = "text" class ="form-control" name="party" required/>
    </div>
    
    <div class="form-group">
        <label>Commitee</label>
        <input type = "text" class ="form-control" name="party" required/>
    </div>
    
    <div class="form-group">
        <label>Active</label>
        <div class="radio">
            <label><input type="radio" class ="form-control" name="active" value ="yes" checked>Yes</label>
            <br>
            <label><input type="radio" class ="form-control" name="active" value ="no">No</label>
        </div>
    </div>
    
    <input class="button" class="form-control" type="submit" value="Save"/>

  </div>
    <footer class="footer" style="bottom: 0;height: 45px;background: #fafafa; padding: 10px; border-top: solid 1px #eee;">
      <div class="container">
        <span class="text-muted">© 2018 Copyright: Assemblify.</span>
		<span class="text-muted" style="float:right">Powered by Tinqe</span>
      </div>
</footer>
</body>
</html>
