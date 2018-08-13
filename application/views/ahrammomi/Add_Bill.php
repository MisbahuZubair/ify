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
      <h5 class="my-0 mr-md-auto font-weight-normal">Assemblify Add Bill</h5>
     <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Dashboard</a>
      </nav>
      <a class="btn btn-outline-primary" href="#">Log In</a>
    </div>
    
<div class="container">
<!--<form method ="post"> -->
<?php echo form_open_multipart(''); ?>
    <div class="form-group">
        <label>Bill Number</label>
        <input type = "text" name="billNumber"/>
    </div>
    
    <div class="form-group">
        <label>Bill Title</label>
        <input type = "text" name="billTitle"/>
    </div>
    
    <div class="form-group">
        <label>Bill Sponsor</label>
        <input type = "text" name="billSponsor"/>
    </div>
    
    <div class="form-group">
        <label>Bill Summary</label>
        <input type = "textarea" name="billSummary"/>
    </div>
    
        <div class="form-group">
        <label>Bill Facts</label>
        <input type = "textarea" name="billFacts"/>
    </div>
    
     <div class="form-group">
        <input type="file" name="billimage"/>
    </div>
    
        <input class="button" type="submit" value="Save"/>

  </div>
</body>
</html>
