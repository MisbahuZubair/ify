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
      <h5 class="my-0 mr-md-auto font-weight-normal">Assemblify Admin Dashboard</h5>
      <a class="btn btn-outline-primary" href="#">Log In</a>
    </div>
    
<div class="container">
    <div><a href ="<?php echo site_url('ahrammomi/Admin_Controller/addBill');?>" class ="btn btn-primary btn-large" role="button">Add Bill</a>
    </div>
    <br/>
    
    
    <?php foreach($bills as $item) { ?>
    <div class="card">
        <div class="card-header">
            <p><?php echo $item['id']?></p>
        </div>
        
        <div class="card-body">
            <p><?php echo $item['bill_title']?></p>
        </div>
    
        <div class="card-footer">
            <a href ="<?php echo site_url('ahrammomi/Admin_Controller/editBill/'.$item['id']);?>" class ="btn btn-primary" role="button">Edit</a>
        </div>
    
    </div>
    <br/>
    <?php } ?>

  </div>
</body>
</html>
