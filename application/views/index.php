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
else if($page_=='legistlators-all'){$page_title="Assemblify | All legistlators";}
else if($page_=='legistlators-House'){$page_title="Assemblify | House Members";}
else if($page_=='legistlators-Senate'){$page_title="Assemblify | House Senate";}
else if($page_=='tag'){$page_title="Assemblify | #".$tag;}
else{$page_title="Assemblify";}
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo  site_url('application/views')?>/styles.css">
</head>
<body> 
    <div class="container">
        <nav class="navbar navbar-expand-xl navbar-light shadow-sm p-3 mb-5 bg-white rounded">
            <a class="navbar-left" href="#">
                <a href="<?php echo site_url('bills/get/all'); ?>"><img src="<?php echo site_url('application/views/logo.svg');?>"  class="logo" alt="assemblify logo"></a>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse float-right" id="navbars">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item <?php if ($page_[0]=='a'){echo "active";}?> dropdown">
                    <a class="nav-link  dropdown-toggle" href="#" id="dropdownBills" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bills<span class="sr-only"></span></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownBills">
                      <a class="dropdown-item" href="<?php echo site_url('bills/get/all'); ?>">All</a>
                      <a class="dropdown-item" href="<?php echo site_url('bills/get/all/Passed'); ?>">Passed</a>
                      <a class="dropdown-item" href="<?php echo site_url('bills/get/all/In consideration'); ?>">In Consideration</a>
                        <a class="dropdown-item" href="<?php echo site_url('bills/get/all/Thrown out'); ?>">Thrown Out</a>
                    </div>
                  </li>

                  <li class="nav-item <?php if ($page_[0]=='S'){echo "active";}?> dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownSen" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Senate Bills</a>
                       <div class="dropdown-menu" aria-labelledby="dropdownSen">
                      <a class="dropdown-item" href="<?php echo site_url('bills/get/Senate'); ?>">All</a>
                      <a class="dropdown-item" href="<?php echo site_url('bills/get/Senate/Passed'); ?>">Passed</a>
                      <a class="dropdown-item" href="<?php echo site_url('bills/get/Senate/In consideration'); ?>">In Consideration</a>
                        <a class="dropdown-item" href="<?php echo site_url('bills/get/Senate/Thrown out'); ?>">Thrown Out</a>
                    </div>
                  </li>

                  <li class="nav-item <?php if ($page_[0]=='H'){echo "active";}?> dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownHouse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">House Bills</a>
                       <div class="dropdown-menu" aria-labelledby="dropdownHouse">
                        <a class="dropdown-item" href="<?php echo site_url('bills/get/House'); ?>">All</a>
                      <a class="dropdown-item" href="<?php echo site_url('bills/get/House/Passed'); ?>">Passed</a>
                      <a class="dropdown-item" href="<?php echo site_url('bills/get/House/In consideration'); ?>">In Consideration</a>
                    <a class="dropdown-item" href="<?php echo site_url('bills/get/House/Thrown out'); ?>">Thrown Out</a>
                    </div>
                  </li>
                <li class="nav-item <?php if ($page_[0]=='l'){echo "active";}?> dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownLeg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Legistlators</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownLeg">
                      <a class="dropdown-item" href="<?php echo site_url('legistlators/get/legistlators/all'); ?>">All</a>
                      <a class="dropdown-item" href="<?php echo site_url('legistlators/get/legistlators/House'); ?>">House</a>
                      <a class="dropdown-item" href="<?php echo site_url('legistlators/get/legistlators/Senate'); ?>">Senate</a>
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

    <?php if($page=="legistlator bills"){$sub_theme="house_subtheme";if ($legistlator['chamber']=="senate"){$sub_theme="senate_subtheme";}
    echo '<div class="container"><div class="row"><div class="col-md-6" style="margin:auto"><div class="nopadding card shadow-sm p-3 mb-4 rounded text-center '.$sub_theme.'"> <div class="card-header nopadding bg-white"><h5>'.$legistlator['name'].'</h5></div ><div class="card-body">Representing '.$legistlator['constituency'].', '.$legistlator['state'].' State</div></div></div></div></div>';}?>
    
    <div class="container">
        <div id="load_data"></div>
        <div id="load_data_message"></div>
    </div>

    <div class="container loadbutton text-center">
        <button id="load" type="button" class="btn-md btn-light">Load More</button>
    </div>
	
<footer class="footer">
      <div class="container">
        <p class="text-muted" style="float:center">© 2018 Assemblify</p>
      </div>
</footer>

</body>
<script>
  $(document).ready(function(){
    var start = 0;
    var action = 'inactive';
    var fetch_url=""
    var source = '<?php echo $source;?>';
    if(source=="legistlators"){fetch_url ="<?php echo base_url(); ?>legistlators/fetch/<?php echo $source.'/'.$filter?>" ; var limit = 16;}
    else if(source=="legistlator bills"){fetch_url ="<?php echo base_url(); ?>bills/BillsByLegistlator/<?php echo $filter?>" ; var limit = 8;}
    else if(source=="tag"){fetch_url ="<?php echo base_url(); ?>bills/BillsByTag/<?php echo $filter?>" ; var limit = 8;}
    else{ fetch_url ="<?php echo base_url(); ?>bills/AllBills/<?php echo $source.'/'.$filter;?>"; var limit = 8;}
    
   

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
        url:fetch_url,
        method:"POST",
        data:{limit:limit, start:start},
        cache: false,
        success:function(data)
        {
          if(data == '')
          {
            $('#load_data_message').html('<h6 style="text-align:center">you\'ve run out of bills</h6>');
              $("#load").hide();
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

      
    $("#load").click(function(e) {
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