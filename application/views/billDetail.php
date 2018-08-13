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
        <div class="card-deck" style ="text-align:center">
            <div class="card">
                 <div class="card-body"> <img src ="<?php echo site_url('application/uploads/').$bill['bill_img']?>" /></div>
                <div class="card-body"><?php echo $bill['bill_number']?> <?php echo $bill['bill_title']?><hr/> <span class= "sponsor"><?php echo $bill['bill_sponsor']?> </span></div>
                <div class="card-body"><?php echo $bill['bill_summary']?> </div>
                <div class="card-body"><?php echo $bill['bill_facts']?> </div>
              </div>
    </div>
    <br/>
  </div>
</body>
</html>

</div>
</body>
</html>
