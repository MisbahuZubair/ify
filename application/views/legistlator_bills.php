<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Assemblify | <?php echo $legistlator['name']; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
<body> 
<div class="container">

<nav class="navbar navbar-expand-xl navbar-light shadow-sm p-3 mb-5 bg-white rounded">
    <a class="navbar-left" href="#">
        <a href="<?php echo site_url('bills/displayBills/all/all'); ?>"><img src="<?php echo site_url('application/views/logo.png'); ?>" style="max-height:32px;"alt=""></a>
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse float-right" id="navbarsExample05">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active dropdown">
            <a class="nav-link  dropdown-toggle" href="#" id="dropdownBills" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bills <span class="sr-only">(current)</span></a>
              <div class="dropdown-menu" aria-labelledby="dropdownBills">
              <a class="dropdown-item" href="<?php echo site_url('bills/displayBills/all/all'); ?>">All</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/displayBills/all/Passed'); ?>">Passed</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/displayBills/all/In consideration'); ?>">In Consideration</a>
                <a class="dropdown-item" href="<?php echo site_url('bills/displayBills/all/Thrown out'); ?>">Thrown Out</a>
            </div>
          </li>
            
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownSen" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Senate Bills</a>
               <div class="dropdown-menu" aria-labelledby="dropdownSen">
              <a class="dropdown-item" href="<?php echo site_url('bills/displayBills/Senate/all'); ?>">All</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/displayBills/Senate/Passed'); ?>">Passed</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/displayBills/Senate/In consideration'); ?>">In Consideration</a>
                <a class="dropdown-item" href="<?php echo site_url('bills/displayBills/Senate/Thrown out'); ?>">Thrown Out</a>
            </div>
          </li>
            
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownHouse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">House Bills</a>
               <div class="dropdown-menu" aria-labelledby="dropdownHouse">
                <a class="dropdown-item" href="<?php echo site_url('bills/displayBills/House/all'); ?>">All</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/displayBills/House/Passed'); ?>">Passed</a>
              <a class="dropdown-item" href="<?php echo site_url('bills/displayBills/House/In consideration'); ?>">In Consideration</a>
            <a class="dropdown-item" href="<?php echo site_url('bills/displayBills/House/Thrown out'); ?>">Thrown Out</a>
            </div>
          </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownLeg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Legistlators</a>
            <div class="dropdown-menu" aria-labelledby="dropdownLeg">
              <a class="dropdown-item" href="<?php echo site_url('legistlators/getLegistlators/legistlators/all'); ?>">All</a>
              <a class="dropdown-item" href="<?php echo site_url('legistlators/getLegistlators/legistlators/House'); ?>">House</a>
              <a class="dropdown-item" href="<?php echo site_url('legistlators/getLegistlators/legistlators/Senate'); ?>">Senate</a>
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
<div class='row'><div class='col-md-6' style='margin:auto'><div class="nopadding card shadow-sm p-3 mb-5 rounded " style ="text-align:center;margin-bottom: 20px; padding:0px 0px 0px 0px;background-color:#F5FCFB"><div class="card-header" style="padding:0; background:#ffffff"><h5> <?php echo $legistlator['name']; ?></h5></div ><div class="card-body">Representing <?php echo $legistlator['constituency'].", ".$legistlator['state'].". "; ?> State</div></div></div></div>
</div>
   
    <br/>
    <div class="container">
    <div id="load_data"></div>
    <div id="load_data_message"></div>
</div>
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
        url:"<?php echo base_url(); ?>bills/fetch_/<?php echo $legistlator['id']; ?>",
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
