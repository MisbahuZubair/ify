<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$page_ = urldecode($page);
if ($page_=='index'){$page_title="Assemblify | All bills";}
else if($page_=='all-all'){$page_title="Assemblify | All bills";}
else if($page_=='all-Passed'){$page_title="Assemblify | Passed bills";}
else if($page_=='all-In consideration'){$page_title="Assemblify | Bills in consideration";}
else if($page_=='all-Thrown out'){$page_title="Assemblify | Thrown out bills";}
else if($page_=='Senate-all'){$page_title="Assemblify | All senate bills";}
else if($page_=='Senate-Passed'){$page_title="Assemblify | Passed senate bills";}
else if($page_=='Senate-In consideration'){$page_title="Assemblify | Senate bills in consideration";}
else if($page_=='Senate-Thrown out'){$page_title="Assemblify | Thrown out bills";}
else if($page_=='House-all'){$page_title="Assemblify | All house bills";}
else if($page_=='House-Passed'){$page_title="Assemblify | Passed house bills";}
else if($page_=='House-In consideration'){$page_title="Assemblify | House bills in consideration";}
else if($page_=='House-Thrown out'){$page_title="Assemblify | House thrown out bills";}
else{$title_page="Assemblify";}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5b8c4e19f365de0011fdf5a3&product=inline-share-buttons' async='async'></script>
  <title><?php echo $page_title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  
  <style>
.nopadding {
   padding: 0 !important;
}
  img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  padding:0;
	}
</style>
</head>
<body style="backgrod: #f8f9f9ff"> 

    <div class="container">

<nav class="navbar navbar-expand-xl navbar-light shadow-sm p-3 mb-5 bg-white rounded">
    <a class="navbar-left" href="#">
        <a href="<?php echo site_url('bills/getBills/all/all'); ?>"><img src="<?php echo site_url('application/views/logo.png'); ?>" style="max-height:32px;"alt=""></a>
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse float-right" id="navbarsExample05">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active dropdown">
            <a class="nav-link  dropdown-toggle" href="#" id="dropdownBills" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bills <span class="sr-only">(current)</span></a>
              <div class="dropdown-menu" aria-labelledby="dropdownBills">
              <a class="dropdown-item" href="<?php echo site_url('bills/getBills/all/all'); ?>">All</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/getBills/all/Passed'); ?>">Passed</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/getBills/all/In consideration'); ?>">In Consideration</a>
                <a class="dropdown-item" href="<?php echo site_url('bills/getBills/all/Thrown out'); ?>">Thrown Out</a>
            </div>
          </li>
            
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownSen" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Senate Bills</a>
               <div class="dropdown-menu" aria-labelledby="dropdownSen">
              <a class="dropdown-item" href="<?php echo site_url('bills/getBills/Senate/all'); ?>">All</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/getBills/Senate/Passed'); ?>">Passed</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/getBills/Senate/In consideration'); ?>">In Consideration</a>
                <a class="dropdown-item" href="<?php echo site_url('bills/getBills/Senate/Thrown out'); ?>">Thrown Out</a>
            </div>
          </li>
            
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownHouse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">House Bills</a>
               <div class="dropdown-menu" aria-labelledby="dropdownHouse">
                <a class="dropdown-item" href="<?php echo site_url('bills/getBills/House/all'); ?>">All</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/getBills/House/Passed'); ?>">Passed</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/getBills/House/In consideration'); ?>">In Consideration</a>
            <a class="dropdown-item" href="<?php echo site_url('bills/getBills/House/Thrown out'); ?>">Thrown Out</a>
            </div>
          </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownLeg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Legistlators</a>
            <div class="dropdown-menu" aria-labelledby="dropdownLeg">
              <a class="dropdown-item" href="#">All</a>
              <a class="dropdown-item" href="#">House</a>
              <a class="dropdown-item" href="#">Senate</a>
            </div>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Legistlative Process</a>
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
    <div id="load_data"></div>
    <div id="load_data_message"></div>
</div>	  

	
<footer class="footer" style="bottom: 0;height: 45px;background: #fafafa; padding: 10px; border-top: solid 1px #eee;text-align:center">
      <div class="container">
        <P class="text-muted" style="float:center">© 2018 Assemblify. Powered by Tinqe</p>
      </div>
</footer>

</body>
    <script>
  $(document).ready(function(){

    var limit = 8;
    var start = 0;
    var action = 'inactive';

    function lazzy_loader(limit)
    {
      var output = '';
      for(var count=0; count<limit; count++)
      {
        output += '<div class="post_data">';
        output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
        output += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
        output += '</div>';
      }
      $('#load_data_message').html(output);
    }

    lazzy_loader(limit);

    function load_data(limit, start)
    {
      $.ajax({
        url:"<?php echo base_url(); ?>bills/fetch/<?php echo $source.'/'.$filter; ?>",
        method:"POST",
        data:{limit:limit, start:start},
        cache: false,
        success:function(data)
        {
          if(data == '')
          {
            $('#load_data_message').html('<h3>No More Result Found</h3>');
            action = 'active';
          }
          else
          {
            $('#load_data').append(data);
            $('#load_data_message').html("");
            action = 'inactive';
          }
        }
      })
    }

    if(action == 'inactive')
    {
      action = 'active';
      load_data(limit, start);
    }

    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
      {
        lazzy_loader(limit);
        action = 'active';
        start = start + limit;
        setTimeout(function(){
          load_data(limit, start);
        }, 1000);
      }
    });

  });
</script>
</html>