<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c0b18fa423bba0012ec3318&product='inline-share-buttons' async='async'></script>
   
    <title>Assemblify | <?php echo $bill['bill_question']?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo  site_url('application/views')?>/styles.css">
    
</head>
<body> 
<div class="container">
    <nav class="navbar navbar-expand-xl navbar-light shadow-sm p-3 mb-5 bg-white rounded">
    <a class="navbar-left" href="#">
        <a href="<?php echo site_url('bills/display/all/all'); ?>"><img src="<?php echo site_url('application/views/logo.svg'); ?>" class="logo" alt="assemblify logo"></a>
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse float-right" id="navbars">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active dropdown">
            <a class="nav-link  dropdown-toggle" href="#" id="dropdownBills" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bills <span class="sr-only">(current)</span></a>
              <div class="dropdown-menu" aria-labelledby="dropdownBills">
              <a class="dropdown-item" href="<?php echo site_url('bills/display/all/all'); ?>">All</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/display/all/Passed'); ?>">Passed</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/display/all/In consideration'); ?>">In Consideration</a>
                <a class="dropdown-item" href="<?php echo site_url('bills/display/all/Thrown out'); ?>">Thrown Out</a>
            </div>
          </li>
            
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownSen" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Senate Bills</a>
               <div class="dropdown-menu" aria-labelledby="dropdownSen">
              <a class="dropdown-item" href="<?php echo site_url('bills/display/Senate/all'); ?>">All</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/display/Senate/Passed'); ?>">Passed</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/display/Senate/In consideration'); ?>">In Consideration</a>
                <a class="dropdown-item" href="<?php echo site_url('bills/display/Senate/Thrown out'); ?>">Thrown Out</a>
            </div>
          </li>
            
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownHouse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">House Bills</a>
               <div class="dropdown-menu" aria-labelledby="dropdownHouse">
                <a class="dropdown-item" href="<?php echo site_url('bills/display/House/all'); ?>">All</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/display/House/Passed'); ?>">Passed</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/display/House/In consideration'); ?>">In Consideration</a>
            <a class="dropdown-item" href="<?php echo site_url('bills/display/House/Thrown out'); ?>">Thrown Out</a>
            </div>
          </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownLeg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">legislators</a>
            <div class="dropdown-menu" aria-labelledby="dropdownLeg">
              <a class="dropdown-item" href="<?php echo site_url('legislators/get/legislators/all'); ?>">All</a>
              <a class="dropdown-item" href="<?php echo site_url('legislators/get/legislators/House'); ?>">House</a>
              <a class="dropdown-item" href="<?php echo site_url('legislators/get/legislators/Senate'); ?>">Senate</a>
            </div>
          </li>
          <li class="nav-item">
                    <a class="nav-link" href="#">My Legislators</a>
                  </li>
            <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li> 
        </ul>
        <form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search">
        </form>
      </div>
</nav>
</div>
    
<div class="container">
    <div class="card-deck" style ="text-align:center">
        <div class="card shadow-sm p-3 mb-4 bg-white rounded nopadding">
            <div class="card-body" style="padding:0"> <img src ="<?php echo site_url('application/uploads/').$bill['bill_img']?>"/></div>
            <div class="card-body" style="padding:0"><h4><?php echo $bill['bill_question']?></h4></div>
        </div>
	</div>
</div>
    
<?php $theme="house_maintheme"; $sub_theme="house_subtheme"; if ($bill['bill_origin']=="Senate"){$theme = "senate_maintheme"; $sub_theme="senate_subtheme";}?>
    
<div class="sharethis-inline-share-buttons share"></div>
    
<div class="container">
    <div class="row">
	  <div class="col-md-8 bill-detail">
          <div class="row" >
           <div class="card shadow-sm p-3 mb-5 bg-white rounded nopadding">
			  <div class="card-header text-white <?php echo $theme; ?>"><h5>Bill Details</h5></div>
			  <div class="card-header <?php echo $sub_theme; ?>"> <h6>Chamber</h6><p><?php echo $bill['bill_origin']?></p></div>
			  
               <div class="card-header <?php echo $sub_theme; ?>"><h6>Title</h6><p><?php echo $bill['bill_title']?></p></div>

               <div class="card-header <?php echo $sub_theme; ?>"><h6>Type</h6><p><?php echo $bill['bill_type']?></p></div>
			
               <div class="card-header <?php echo $sub_theme; ?>"><h6>Sponsor</h6><p><?php if($bill['bill_sponsor']!=""){ echo "<a href ='".site_url('bills/legistlator/'.$bill['bill_sponsor'])."'>".$bill['name']."</a>"; } else {echo "N/A";} ?></p></div>
			  <div class="card-header <?php echo $sub_theme; ?>"><h6>Tag(s)</h6><p><?php if ($bill['bill_tag1']!="") {echo "<a href=".site_url('bills/tag/'.$bill['bill_tag1']).">#".$bill['bill_tag1']."</a>";} if ($bill['bill_tag2']!="") {echo "<a href=".site_url('bills/tag/'.$bill['bill_tag2'])."> #".$bill['bill_tag2']."</a>";} if ($bill['bill_tag3']!="") {echo "<a href=".site_url('bills/tag/'.$bill['bill_tag3'])."> #".$bill['bill_tag3']."</a>";}?></p></div>
			  
			  <div class="card-header <?php echo $sub_theme; ?>"><h6>Official Summary</h6><p><?php echo  ltrim($bill['bill_summary'])?></p></div>

        <div class="card-header <?php echo $sub_theme; ?>"><h6>Key Points</h6><p><?php echo  ltrim($bill['bill_key_points'])?></p></div>
			  
			  <div class="card-header <?php echo $sub_theme; ?>"><h6>Full Text of Bill</h6><p>Click <a href="<?php echo $bill['bill_fulltext']?>" target="_blank">here</a> to view the full bill text</p></div>
			  
              <?php if($bill['bill_additionalinfo']!=""){echo'<div class="card-header '.$sub_theme.'"><h6>Additional Information</h6><p>'.$bill['bill_additionalinfo'].'</p></div>';}?>
			   <?php if($bill['bill_impact']!=""){echo'<div class="card-header '.$sub_theme.'"><h6>Impact</h6><p>'.$bill['bill_impact'].'</p></div>';}?>
               <?php if($bill['bill_news']!=""){echo'<div class="card-header '.$sub_theme.'"><h6>News</h6><p>'.$bill['bill_news'].'</p></div>';}?>
               </div>
          </div>
</div>
	<div class="col-md-4 bill-detail" style="margin-left: auto" >
        <div class="row">
           <div class="card shadow-sm p-3 mb-5 bg-white rounded nopadding">
			  <div class="card-header text-white <?php echo $theme; ?>"><h5>Bill Progress</h5></div>
			  <div class="card-header <?php echo $sub_theme; ?>"><h6>Status</h6><p><?php echo $bill['bill_status']?></p></div>
			  
			  <div class="card-header <?php echo $sub_theme; ?>"><h6>First Reading</h6><p><?php $date = date_create($bill['bill_firstreading']); if ($date < date_create('01/01/1960')){echo 'Awaiting';} else echo date_format($date,"d/m/Y");?></p></div>
			  
			  <div class="card-header <?php echo $sub_theme; ?>"> <h6>Second Reading</h6><p><?php $date = date_create($bill['bill_secondreading']); if ($date < date_create('01/01/1960')){echo 'Awaiting';} else echo date_format($date,"d/m/Y");?></p></div>
			  
			  <div class="card-header <?php echo $sub_theme; ?>"><h6>Committee Reffered</h6><p><?php if ($bill['com_name']==""){echo "Awaiting";} else{echo $bill['com_name'];}?></p></div>
			  
			  <div class="card-header <?php echo $sub_theme; ?>"><h6>Reported out of Committee</h6><p><?php $date = date_create($bill['bill_committeereport']); if ($date < date_create('01/01/1960')){echo 'Awaiting';} else echo date_format($date,"d/m/Y");?></p></div>
			  
			  <div class="card-header <?php echo $sub_theme; ?>"><h6>Third Reading</h6><p><?php $date = date_create($bill['bill_thirdreading']); if ($date < date_create('01/01/1960')){echo 'Awaiting';} else echo date_format($date,"d/m/Y");?></p></div>
			  
               <?php if($bill['bill_remarks']!=""){echo'<div class="card-header '.$sub_theme.'"><h6>Remarks</h6><p>'.$bill['bill_remarks'].'</p></div>';}?>
            </div>
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

var disqus_config = function () {
this.page.url = <?php echo '"'.site_url('bills/details/').$bill['bill_number'].'"'; ?>;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = <?php echo '"'.$bill['bill_number'].'"'; ?>; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://assemblify-ng-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>
<footer class="footer" style="bottom: 0;height: 45px;background: #fafafa; padding: 10px; border-top: solid 1px #eee;text-align:center">
    <div class="container">
        <p class="text-muted" style="float:center">© 2018 Assemblify</p>
    </div>
</footer>

</body>
</html>