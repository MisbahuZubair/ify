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
        <a class="nav-link active" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>    
    </ul>
      <a class="btn btn-outline-light" href="<?php echo site_url('admin/auth/logout');?>">Log Out</a>
      
  </div>  
</nav>
    
 
    
<div class="container">
    <div><a href ="<?php echo site_url('admin/dashboard/addBill');?>" class ="btn btn-success btn-large" role="button">Add Bill</a>
    </div>
    <br/>
    
    
    <?php foreach($bills as $item) { ?>
    <div class="card" style="margin-bottom: 20px">
        <div class="card-header">
            <p><?php echo $item['bill_question']?></p>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <p><?php echo $item['bill_title']?></p>
                </div>
                <div class="col-4">
                    <img src ="<?php echo site_url('application/uploads/').$item['bill_img']?>" style="width:100%"/>
            </div>
            
        </div>
    
        <div class="card-footer">
            <a href ="<?php echo site_url('admin/dashboard/editBill/'.$item['id']);?>" class ="btn btn-secondary" role="button">Edit</a>
            <a href ="<?php echo site_url('admin/dashboard/deleteBill/'.$item['id'].'/'.$item['bill_imagename']);?>" class ="btn btn-danger float-right" role="button">Delete</a>
        </div>

    
    </div>
    <br/>
    <?php } ?>

  </div>
    </div>
    
    <footer class="footer" style="bottom: 0;height: 45px;background: #fafafa; padding: 10px; border-top: solid 1px #eee;">
      <div class="container">
        <span class="text-muted">© 2018 Copyright: Assemblify.</span>
		<span class="text-muted" style="float:right">Powered by Tinqe</span>
      </div>
</footer>
</body>
</html>
