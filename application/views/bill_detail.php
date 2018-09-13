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
        <a class="nav-link" href="<?php echo site_url('');?>">Home</a>
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
        <div class="card-deck" style ="text-align:center;margin-bottom: 20px;">
            <div class="card">
                 <div class="card-body" style="padding:0"> <img src ="<?php echo site_url('application/uploads/').$bill['bill_img']?>" /></div>
                <div class="card-body" style="padding:0"><p><h4><?php echo $bill['bill_question']?><h4></p></div>
             </div>
	</div>
	<div class="row">
	  <div class="col-md-8">
           <div class="card" style="margin-bottom: 20px">
			  <div class="card-header bg-success text-white " style="text-align:center"><h6><h5>Bill Details</h5></h6></div>
			  <div class="card-body"><h6>Origin</h6><p style="margin:0"><i><?php echo $bill['bill_origin']?></i></p></div>
			  <hr style="margin:0"/>
			  <div class="card-body"><h6>Title</h6><p style="margin:0"><i><?php echo $bill['bill_title']?></i></p></div>
			  <hr style="margin:0"/>
			  <div class="card-body"><h6>Sponsor</h6><p><?php echo $bill['name']?></p></div>
			  <hr style="margin:0"/>
			  <div class="card-body"><h6>Topic(s)</h6><p><?php echo $bill['bill_topic1']?></p></div>
			  <hr style="margin:0"/>
			  <div class="card-body"><h6>Summary</h6><p><?php echo $bill['bill_summary']?></p></div>
			  <hr style="margin:0"/>
			  <div class="card-body"><h6>Full Text of Bill</h6><p>Click <a href="<?php echo $bill['bill_fulltext']?>" target="_blank">here</a> to view the full bill text</p></div>
			  <hr style="margin:0"/>
			  <div class="card-body"><h6>Additional Information</h6><p><?php echo $bill['bill_additionalinfo']?></p></div>
			  <hr style="margin:0"/>
			  <div class="card-body"><h6>Impact</h6><p><?php echo $bill['bill_impact']?></p></div>
			  <hr style="margin:0"/>
			  <div class="card-body"><h6>News</h6><p><?php echo $bill['bill_news']?></p></div>
			</div>
</div>
<br/>
	<div class="col-md-4">
           <div class="card">
			  <div class="card-header bg-success text-white" style="text-align:center"><h6><h5>Bill Progress</h5></h6></div>
			  <div class="card-body "><h6>Status</h6><p><?php echo $bill['bill_status']?></p></div>
			  <hr style="margin:0"/>
			  <div class="card-body"><h6>First Reading</h6><p><?php echo $bill['bill_firstreading']?></p></div>
			  <hr style="margin:0"/>
			  <div class="card-body"><h6>Second Reading</h6><p><?php echo $bill['bill_secondreading']?></p></div>
			  <hr style="margin:0"/>
			  <div class="card-body"><h6>Committee Reffered</h6><p><?php echo $bill['bill_committee']?></p></div>
			  <hr style="margin:0"/>
			  <div class="card-body"><h6>Reported out of Committee</h6><p><?php echo $bill['bill_committeereport']?></p></div>
			  <hr style="margin:0"/>
			  <div class="card-body"><h6>Third Reading</h6><p><?php echo $bill['bill_thirdreading']?></p></div>
			  <hr style="margin:0"/>
			  <div class="card-body"><h6>Remarks</h6><p><?php echo $bill['bill_remarks']?></p></div>
			</div>
	</div>
	</div>
    </div>
	<br/>
<footer class="footer" style="bottom: 0;height: 45px;background: #fafafa; padding: 10px; border-top: solid 1px #eee;">
      <div class="container">
        <span class="text-muted">© 2018 Copyright: Assemblify.</span>
		<span class="text-muted" style="float:right">Powered by Tinqe</span>
      </div>
</footer>

</body>
</html>