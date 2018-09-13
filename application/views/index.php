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
  <a class="navbar-brand" href="#">Assemblify</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse justify-content-between navbar-collapse navbar-right" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Senate Bills</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">House Bills</a>
      </li>    
    </ul>
      
  </div>  
</nav>


    <!--<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h4 class="display-4">Make your voice heard</h4>
    </div> --> 
<div class="container">
    <?php foreach(array_chunk($bills, 2) as $pair) { ?>
	<div class="row" style="margin-bottom: 20px">
        <div class="col-lg-6">
             <div class="card-deck" style ="text-align:center">
                <?php foreach ($pair as $item) { ?>
                    <div class="card">
                        <div class="card-body" style="padding:0"> <img src ="<?php echo site_url('application/uploads/').$item['bill_img']?>" /></div>
                        <div class="card-body" style="padding:0"> <?php echo $item['bill_question']?></div> <hr/> 
                        <div class="card-body" style="padding:0"> <?php echo $item['bill_number']?> <?php echo $item['bill_title']?>" </div>
                        <a class=" btn btn-success"  href="<?php echo site_url('bills/display/'.$item['id']);?>" role="button">Link</a>
                      </div>
                <?php } ?> 
            </div>
        </div>
    </div>
    <?php } ?>
    </div>	  
	
<footer class="footer" style="bottom: 0;height: 45px;background: #fafafa; padding: 10px; border-top: solid 1px #eee;">
      <div class="container">
        <span class="text-muted">© 2018 Copyright: Assemblify.</span>
		<span class="text-muted" style="float:right">Powered by Tinqe</span>
      </div>
</footer>

</body>
</html>