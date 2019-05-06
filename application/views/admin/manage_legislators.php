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
    <link rel="stylesheet" type="text/css" href="<?php echo  site_url('application/views')?>/styles.css">
  
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
<nav class="navbar navbar-expand-xl navbar-dark shadow-sm p-3 mb-5 bg-secondary rounded">
    <a class="navbar-left" href="#">
        <a href="<?php echo site_url('bills/getBills/all/all'); ?>"><img src="<?php echo site_url('application/views/logo.svg'); ?>" class="logo" alt=""></a>
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse float-right" id="navbars">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('admin/dashboard');?>"> Manage Bills</a>
          </li>
            <li class="nav-item">
            <a class="nav-link"  href="<?php echo site_url('admin/dashboard/addBill');?>">Add Bill</a>
          </li>
              <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('admin/dashboard/addLegistlator');?>">Add Legistlator</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" style="color:white" href="<?php echo site_url('admin/dashboard/managelegislators');?>">Manage legislators</a>
          </li>         
        </ul>
      </div>
    <a href="<?php echo site_url('auth/logout');?>" class="btn btn-light">Logout</a>
</nav>
</div>

<div class="container">
    
    <?php foreach($legislators as $item) { ?>
    <div class="card" style="margin-bottom: 20px">
        <div class="bg-light">
            <p><?php echo $item['name']?></p>
        </div>
        <div>
            <p><?php echo $item['state']?></p>
        </div>
        <div class ='bg-light'>
            <p><?php echo $item['constituency']?></p>
        </div>
    
        <div style="padding:3px">
            <a href ="<?php echo site_url('admin/dashboard/editLegistlator/'.$item['id']);?>" class ="btn btn-secondary" role="button">Edit</a>
            <a onclick="deleteLegistlator(<?php echo $item['id']; ?>)" class ="btn btn-danger white-text float-right" role="button">Delete</a>
        </div>

    
    </div>
    <br/>
    <?php } ?>

</div>
    <footer class="footer" style="bottom: 0;height: 45px;background: #fafafa; padding: 10px; border-top: solid 1px #eee;">
      <div class="container">
        <span class="text-muted">© 2018 Copyright: Assemblify.</span>
		<span class="text-muted" style="float:right">Powered by Tinqe</span>
      </div>
</footer>
</body>
<script>
    function deleteLegistlator(id){ 
        var r = confirm("You will not be able to recover legistlator if you choose to proceed !!!");
        if (r == true) {
            $.ajax({
                url:'<?php echo base_url(); ?>admin/dashboard/deleteLegistlator/',
                method:"POST",
                data:{id:id},
                cache: false,
                success:function(data){
                    if(data==true){
                       alert("Legistlator successfully deleted");
                        location.reload(); 
                    }
                    else{
                        alert("Legistlator cannot deleted");
                        location.reload(); 
                    }
                    
                }
            })
        } 
        }
    
</script>
</html>
