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
.nopadding {
   padding: 0 !important;
    margin:0;}
    
      hr{
          padding:0;
          margin:0;
          background:white;
      }
.btn {
    min-width: 80px !important;
    max-width: 80px !important;
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

<nav class="navbar navbar-expand-xl navbar-dark shadow-sm p-3 mb-5 bg-secondary rounded">
    <a class="navbar-left" href="#">
        <a href="<?php echo site_url('bills/getBills/all/all'); ?>"><img src="<?php echo site_url('application/views/logo.png'); ?>" style="max-height:32px;"alt=""></a>
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse float-right" id="navbarsExample05">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('admin/dashboard/addBill');?>">Add Bill</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Manage Bills</a>
          </li>
              <li class="nav-item">
            <a class="nav-link" href="#">Add Legistlator</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Manage Legistlators</a>
          </li><li class="nav-item">
            <a class="nav-link" href="#">Manage Users</a>
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
    
    <footer class="footer" style="bottom: 0;height: 45px;background: #fafafa; padding: 10px; border-top: solid 1px #eee;">
      <div class="container">
        <span class="text-muted">© 2018 Copyright: Assemblify.</span>
		<span class="text-muted" style="float:right">Powered by Tinqe</span>
      </div>
</footer>
</body>
    <script>
  $(document).ready(function(){
    var start = 0;
    var action = 'inactive';
    var fetch_url=""
    var page = '<?php echo $page;?>';
    if(page=="manage_bills"){fetch_url ="<?php echo base_url(); ?>admin/dashboard/fetchbills/" ; var limit = 20;}
    else if(page=="manage_legistlators"){fetch_url ="<?php echo base_url(); ?>bills/fetchByLegistlator/" ; var limit = 20;} 

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
