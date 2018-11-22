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
<!--<form method ="post"> -->
<?php echo form_open_multipart(''); ?>
    <div class="row">      
        <div class="col-md-4">
         <div class="form-group">
             
    <div class="form-group">Origin<br/>
        <div class="form-check form-check-inline">
          <label style="padding-right:10px"><input class="form-check-input"  type="radio" class ="form-control" name="origin" value ="House"  <?php if ($bill['bill_origin']=='House') echo "checked" ?>>House    </label>
          <label><input class="form-check-input"  type="radio" class ="form-control" name="origin" value ="Senate" <?php if ($bill['bill_origin']=='Senate') echo "checked" ?>>Senate</label>
        </div>
        <br/>       
        <div class="form-check form-check-inline">
            <label style="padding-right:10px"><input class="form-check-input"  type="radio" class ="form-control" name="origin" value ="House to Senate"  <?php if ($bill['bill_origin']=="House to Senate") echo "checked" ?>>House to Senate</label>
          <label style="padding-right:10px"><input class="form-check-input"  type="radio" class ="form-control" name="origin" value = "Senate to House"  <?php if ($bill['bill_origin']=="Senate to House") echo "checked" ?>>Senate to House</label>
        </div>
    </div>             
             
    <div class="form-group">
        <label>Number</label>
        <input type = "text" class ="form-control" name="billNumber" value= "<?php echo $bill['bill_number']?>" required/>
    </div>
    
    <div class="form-group">
        <label>Question</label>
        <input type = "text" class ="form-control" name="billQuestion" value= "<?php echo $bill['bill_question']?>" required/>
    </div>
    
    <div class="form-group">
        <label>Title</label>
        <input type = "text" class ="form-control" name="billTitle" value= "<?php echo $bill['bill_title']?>" required/>
    </div>
    
    <div class="form-group"> Sponsor <br/>
        <div class="form-check form-check-inline">
          <label style="padding-right:10px"><input class="form-check-input"  type="radio" class ="form-control" name="sponsor_status" value =1  <?php if ($bill['active']==1) echo "checked" ?>>Active</label>
          <label><input class="form-check-input"  type="radio" class ="form-control" name="sponsor_status" value =0 <?php if ($bill['active']==0) echo "checked" ?>>Inactive</label>
                 </div>
        
        <select class ="form-control" name="billSponsor" id="billSponsor" >
<option disabled selected value> </option>
          <?php foreach($legistlators as $rep):  ?>
           
              <option value="<?php echo $rep['id']?>" <?php if ($bill['bill_sponsor']==$rep['id']) echo "selected" ?>>
                  <?php echo $rep['name']?>
              </option>
            
          <?php echo $rep['active']; endforeach;?>
        </select>
</div>
    </div>
            <div class="form-group">
        <label>Tag 1</label>
        <input type = "text" class ="form-control" name="billTag1" id="billTopic1" value ="<?php echo $bill['bill_tag1']?>" required/>
    </div>
    
    <div class="form-group">
        <label>Tag 2</label>
        <input type = "text" class ="form-control" name="billTag2" id="billTopic2" value ="<?php echo $bill['bill_tag2']?>"/>
    
    <div class="form-group">
        <label>Tag 3</label>
        <input type = "text" class ="form-control" name="billTag3" id="billTopic3 value ="<?php echo $bill['bill_tag3']?>""/>
    </div>
            <div class="form-group">
        <label>Full Text</label>
        <input type = "text" class ="form-control" name="billFulltext" value ="<?php echo $bill['bill_fulltext']?>" required/>
    </div>
            <div class="invisible"><input type = "text" name="billImagename" id="billImagename" value ="<?php echo $bill['bill_imagename']?>"> </div>

    <div class="form-group">
        <input type="file" name="billimage"/>
    </div>
        </div>
    </div>
         <div class="col-md-8">
            <div class="form-group">
        <label>Summary</label>
        <textarea class ="form-control" name="billSummary" rows='6' required> <?php echo $bill['bill_summary']?> </textarea>
    </div>
    
    <div class="form-group">
        <label>Additional Info</label>
        <textarea class ="form-control" name="billAdditionalinfo" rows='6'>  <?php echo $bill['bill_additionalinfo']?> </textarea>
    </div>
    

    
     <div class="form-group">
        <label>Impact</label>
         <textarea class ="form-control" name="billImpact" rows='6' required> <?php echo $bill['bill_impact']?></textarea>
    </div>
            <div class="form-group">
        <label>News</label>
        <textarea class ="form-control" name="billNews" rows='6'> </textarea>
    </div>
        </div>
    
        <input class="button" class="form-control" type="submit" value="Save"/>

  </div>
    </div>
    <footer class="footer" style="bottom: 0;height: 45px;background: #fafafa; padding: 10px; border-top: solid 1px #eee;">
      <div class="container">
        <span class="text-muted">© 2018 Copyright: Assemblify.</span>
		<span class="text-muted" style="float:right">Powered by Tinqe</span>
      </div>
</footer>
</body>
</html>
