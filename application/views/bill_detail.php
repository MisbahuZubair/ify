<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5b8c4e19f365de0011fdf5a3&product=inline-share-buttons' async='async'></script>
  <title><?php echo $bill['bill_question']?></title>
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
<div class="sharethis-inline-share-buttons" style ="margin-bottom: 20px;"></div>
	<div class="row">
	  <div class="col-md-8">
           <div class="card" style="margin-bottom: 20px">
			  <div class="card-header bg-success text-white " style="text-align:center"><h6><h5>Bill Details</h5></h6></div>
			  <div class="card-header"><h6>Origin</h6><p style="margin:0"><i><?php echo $bill['bill_origin']?></i></p></div>
			  
			  <div class="card-header"><h6>Title</h6><p style="margin:0"><i><?php echo $bill['bill_title']?></i></p></div>
			
               <div class="card-header"><h6>Sponsor</h6><p><a href ="<?php echo site_url('bills/legistlatorBills/'.$bill['id']);?>"> <?php echo $bill['name']?> </a></p></div>
			  <div class="card-header"><h6>Topic(s)</h6><p><?php echo $bill['bill_topic1'].", " .$bill['bill_topic2'].", " .$bill['bill_topic3']?></p></div>
			  
			  <div class="card-header"><h6>Summary</h6><p><?php echo $bill['bill_summary']?></p></div>
			  
			  <div class="card-header"><h6>Full Text of Bill</h6><p>Click <a href="<?php echo $bill['bill_fulltext']?>" target="_blank">here</a> to view the full bill text</p></div>
			  
			  <div class="card-header"><h6>Additional Information</h6><p><?php echo $bill['bill_additionalinfo']?></p></div>
			  			  <div class="card-header"><h6>Impact</h6><p><?php echo $bill['bill_impact']?></p></div>
			  
			  <div class="card-header"><h6>News</h6><p><?php echo $bill['bill_news']?></p></div>
			</div>
</div>
<br/>
	<div class="col-md-4">
           <div class="card">
			  <div class="card-header bg-success text-white" style="text-align:center"><h6><h5>Bill Progress</h5></h6></div>
			  <div class="card-header "><h6>Status</h6><p><?php echo $bill['bill_status']?></p></div>
			  
			  <div class="card-header"><h6>First Reading</h6><p><?php $date = date_create($bill['bill_firstreading']); if ($date < date_create('01/01/1960')){echo 'Awaiting';} else echo date_format($date,"d/m/Y");?></p></div>
			  
			  <div class="card-header"><h6>Second Reading</h6><p><?php $date = date_create($bill['bill_secondreading']); if ($date < date_create('01/01/1960')){echo 'Awaiting';} else echo date_format($date,"d/m/Y");?></p></div>
			  
			  <div class="card-header"><h6>Committee Reffered</h6><p><?php if ($bill['com_name']==""){echo "Awaiting";} else{echo $bill['com_name'];}?></p></div>
			  
			  <div class="card-header"><h6>Reported out of Committee</h6><p><?php $date = date_create($bill['bill_committeereport']); if ($date < date_create('01/01/1960')){echo 'Awaiting';} else echo date_format($date,"d/m/Y");?></p></div>
			  
			  <div class="card-header"><h6>Third Reading</h6><p><?php $date = date_create($bill['bill_thirdreading']); if ($date < date_create('01/01/1960')){echo 'Awaiting';} else echo date_format($date,"d/m/Y");?></p></div>
			  

			  <div class="card-header"><h6>Remarks</h6><p><?php echo $bill['bill_remarks']?></p></div>
			</div>
	</div>
	</div>
    </div>
	<br/>
<div class ="container">
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://assemblify-ng.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>
<footer class="footer" style="bottom: 0;height: 45px;background: #fafafa; padding: 10px; border-top: solid 1px #eee;text-align:center">
      <div class="container">
        <P class="text-muted" style="float:center">© 2018 Assemblify. Powered by Tinqe</p>
      </div>
</footer>

</body>
</html>