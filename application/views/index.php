<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5b8c4e19f365de0011fdf5a3&product=inline-share-buttons' async='async'></script>
  <title>Assemblify</title>
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
        url:"<?php echo base_url(); ?>bills/fetch",
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