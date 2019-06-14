<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

$statefilter = "
<div class='row' id='filter'>
<div class='col-lg-4'>
<label for='state-filter'><h5>Filter by State</h5></label>
<select class ='form-control .col-sm-*' id='filter-state' id ='filter-state'>
<option value=''></option>
<option value='Abia'>Abia</option>
<option value='Adamawa'>Adamawa</option>
<option value='Akwa Ibom'>Akwa Ibom</option>
<option value='Anambra'>Anambra</option>
<option value='Bauchi'>Bauchi</option>
<option value='Bayelsa'>Bayelsa</option>
<option value='Benue'>Benue</option>
<option value='Borno'>Borno</option>
<option value='Cross River'>Cross River</option>
<option value='Delta'>Delta</option>
<option value='Ebonyi'>Ebonyi</option>
<option value='Edo'>Edo</option>
<option value='Ekiti'>Ekiti</option>
<option value='Enugu'>Enugu</option>
<option value='Federal Capital Territory'>Federal Capital Territory</option>
<option value='Gombe'>Gombe</option>
<option value='Imo'>Imo</option>
<option value='Jigawa'>Jigawa</option>
<option value='Kaduna'>Kaduna</option>
<option value='Kano'>Kano</option>
<option value='Katsina'>Katsina</option>
<option value='Kebbi'>Kebbi</option>
<option value='Kogi'>Kogi</option>
<option value='Kwara'>Kwara</option>
<option value='Lagos'>Lagos</option>
<option value='Nasarawa'>Nasarawa</option>
<option value='Niger'>Niger</option>
<option value='Ogun'>Ogun</option>
<option value='Ondo'>Ondo</option>
<option value='Osun'>Osun</option>
<option value='Oyo'>Oyo</option>
<option value='Plateau'>Plateau</option>
<option value='Rivers'>Rivers</option>
<option value='Sokoto'>Sokoto</option>
<option value='Taraba'>Taraba</option>
<option value='Yobe'>Yobe</option>
<option value='Zamfara'>Zamfara</option>
</select>
</div>
</div>";

$page_ = urldecode($page);
if ($page_=='index'){$page_title="Assemblify | All bills";}
else if($page_=='all-all'){$page_title="Assemblify | All bills";}
else if($page_=='all-Passed'){$page_title="Assemblify | Passed bills";}
else if($page_=='all-In consideration'){$page_title="Assemblify | Bills in consideration";}
else if($page_=='all-Thrown out'){$page_title="Assemblify | Thrown out bills";}
else if($page_=='Senate-all'){$page_title="Assemblify | All senate bills";}
else if($page_=='Senate-Passed'){$page_title="Assemblify | Passed senate bills";}
else if($page_=='Senate-In consideration'){$page_title="Assemblify | Senate bills in consideration";}
else if($page_=='Senate-Thrown out'){$page_title="Assemblify | Thrown out senate bills";}
else if($page_=='House-all'){$page_title="Assemblify | All house bills";}
else if($page_=='House-Passed'){$page_title="Assemblify | Passed house bills";}
else if($page_=='House-In consideration'){$page_title="Assemblify | House bills in consideration";}
else if($page_=='House-Thrown out'){$page_title="Assemblify | Thrown out house bills";}
else if($page_=='legislators-all'){$page_title="Assemblify | All legislators";}
else if($page_=='legislators-House'){$page_title="Assemblify | House members";}
else if($page_=='legislators-Senate'){$page_title="Assemblify | Senate members";}
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
                <a href="<?php echo site_url('bills/display/all'); ?>"><img src="<?php echo site_url('application/views/logo.svg');?>"  class="logo" alt="assemblify logo"></a>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse float-right" id="navbars">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item <?php if ($page_[0]=='a'){echo "active";}?> dropdown">
                    <a class="nav-link  dropdown-toggle" href="#" id="dropdownBills" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bills<span class="sr-only"></span></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownBills">
                      <a class="dropdown-item" href="<?php echo site_url('bills/display/all'); ?>">All</a>
                      <a class="dropdown-item" href="<?php echo site_url('bills/display/all/Passed'); ?>">Passed</a>
                      <a class="dropdown-item" href="<?php echo site_url('bills/display/all/In consideration'); ?>">In Consideration</a>
                        <a class="dropdown-item" href="<?php echo site_url('bills/display/all/Thrown out'); ?>">Thrown Out</a>
                    </div>
                  </li>

                  <li class="nav-item <?php if ($page_[0]=='S'){echo "active";}?> dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownSen" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Senate Bills</a>
                       <div class="dropdown-menu" aria-labelledby="dropdownSen">
                      <a class="dropdown-item" href="<?php echo site_url('bills/display/Senate/all'); ?>">All</a>
                      <a class="dropdown-item" href="<?php echo site_url('bills/display/Senate/Passed'); ?>">Passed</a>
                      <a class="dropdown-item" href="<?php echo site_url('bills/display/Senate/In consideration'); ?>">In Consideration</a>
                        <a class="dropdown-item" href="<?php echo site_url('bills/display/Senate/Thrown out'); ?>">Thrown Out</a>
                    </div>
                  </li>

                  <li class="nav-item <?php if ($page_[0]=='H'){echo "active";}?> dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownHouse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">House Bills</a>
                       <div class="dropdown-menu" aria-labelledby="dropdownHouse">
                        <a class="dropdown-item" href="<?php echo site_url('bills/display/House/all'); ?>">All</a>
                      <a class="dropdown-item" href="<?php echo site_url('bills/display/House/Passed'); ?>">Passed</a>
                      <a class="dropdown-item" href="<?php echo site_url('bills/display/House/In consideration'); ?>">In Consideration</a>
                    <a class="dropdown-item" href="<?php echo site_url('bills/display/House/Thrown out'); ?>">Thrown Out</a>
                    </div>
                  </li>
                <li class="nav-item <?php if ($page_[0]=='l'){echo "active";}?> dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownLeg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Legislators</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownLeg">
                      <a class="dropdown-item" href="<?php echo site_url('legislators/display/legislators/all'); ?>">All</a>
                      <a class="dropdown-item" href="<?php echo site_url('legislators/display/legislators/House'); ?>">House</a>
                      <a class="dropdown-item" href="<?php echo site_url('legislators/display/legislators/Senate'); ?>">Senate</a>
                    </div>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">My Legislators</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                  </li>
                </ul>
                <form class="form-inline my-2 my-md-0">
                  <input class="form-control" type="text" placeholder="Search">
                </form>
              </div>
        </nav>
    </div>

    <?php if($page=="legislator bills"){$sub_theme="house_subtheme";if ($legislator['chamber']=="senate"){$sub_theme="senate_subtheme";}
    echo '<div class="container"><div class="row"><div class="col-md-6" style="margin:auto"><div class="nopadding card shadow-sm p-3 mb-4 rounded text-center '.$sub_theme.'"> <div class="card-header nopadding bg-white"><h5>'.$legislator['name'].'</h5></div ><div class="card-body">Representing '.$legislator['constituency'].', '.$legislator['state'].' State</div></div></div></div></div>';}?>
    
    <div class="container">
    <?php if($page=="legislators-all"||$page=="legislators-House"||$page=="legislators-Senate"){echo $statefilter;} ?>
        <div id="load_data"></div>
        <div id="load_data_message"></div>
    </div>

    <div class="container loadbutton text-center">
        <button id="load-more" type="button" class="btn-md btn-light">Load More</button>
    </div>
	
<footer class="footer">
      <div class="container">
        <p class="text-muted" style="float:center">© 2018 Assemblify</p>
      </div>
</footer>

</body>
<script>
  var filter_state ='';
  var fetch_url=""

  $(document).ready(function(){

    //initialising values for fetching data such aslimits and fetching url based on the link that led to the page e.g view bills or view legislators
    var start = 0;
    var action = 'inactive';
    var source = '<?php echo $source;?>';
    if(source=="legislators"){fetch_url ="<?php echo base_url(); ?>legislators/fetch/<?php echo $source.'/'.$filter.'/'?>"+filter_state ; var limit = 16; console.log(fetch_url)}
    else if(source=="legislator bills"){fetch_url ="<?php echo base_url(); ?>Bills/BillsBylegislator/<?php echo $filter?>" ; var limit = 8;}
    else if(source=="tag"){fetch_url ="<?php echo base_url(); ?>Bills/BillsByTag/<?php echo $filter?>" ; var limit = 8;}
    else{ fetch_url ="<?php echo base_url(); ?>Bills/AllBills/<?php echo $source.'/'.$filter;?>"; var limit = 8;}
    
   
    //creates empty space before fetched data is displayed
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
    
    //loads the appropriate data by calling the controller with the link assigned to 'fetch_url' 
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
            $('#load_data_message').html('<h6 style="text-align:center">there is nothing to load</h6>');
              $("#load-more").hide();
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

    //calls loadData with the appropriate start and limit values, 
    //which decide whether fresh data is loaded, or data loading is continued from a previous point.
    function callLoad(filtered){
      lazzy_loader(limit);
      action = 'active';
      if (filtered!=true){
        start = start + limit;
      }
      else start =0;
      load_data(limit, start);
    }
      
    //when load more button is clicked
    $("#load-more").click(function(e) {
      {
        callLoad(false);
    }})

    //when a state is chosen as a filter in the view leislators page
    $("#filter-state").change(function(e) {
      filter_state =$("#filter-state option:selected").val();
      fetch_url ="<?php echo base_url(); ?>legislators/fetch/<?php echo $source.'/'.$filter.'/'?>"+filter_state ;
      $('#load_data').html('');
      callLoad(true);
      });
  });
</script>
</html>