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
<nav class="navbar navbar-expand-md  navbar-dark bg-success" style="margin-bottom: 20px;">
  <a class="navbar-brand" href="#">Assemblify Admin Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse justify-content-between navbar-collapse navbar-right" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/dashboard');?>">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/dashboard/addBill');?>">Add Bill</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>    
    </ul>
      <a class="btn btn-outline-light" href="<?php echo site_url('admin/auth/logout');?>">Log Out</a>
      
  </div>  
</nav>
    
<div class="container">
<!--<form method ="post"> -->
<?php echo form_open_multipart(''); ?>
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
    
    <div class="form-group">
        <div class="radio">
          <label><input type="radio" class ="form-control" name="origin" value ="House"  <?php if ($bill['bill_origin']=='House') echo "checked" ?>>House</label>
<br>
          <label><input type="radio" class ="form-control" name="origin" value ="Senate" <?php if ($bill['bill_origin']=='Senate') echo "checked" ?>>Senate</label>
        </div>
    
        <select class ="form-control" name="billSponsor" id="billSponsor" >
<option disabled selected value> </option>
          <?php foreach($legistlators as $rep):?>
              <option value="<?php echo $rep['id']?>" <?php if ($bill['bill_sponsor']==$rep['id']) echo "selected" ?>>
                  <?php echo $rep['name']?>
              </option>
          <?php endforeach;?>
        </select>
    </div>

    <div class="invisible"><input type = "text" name="billImagename" id="billImagename" value ="<?php echo $bill['bill_imagename']?>"> </div>
    
    <div class="form-group">
        <label>Summary</label>
        <textarea class ="form-control" name="billSummary" rows='6' required> <?php echo $bill['bill_summary']?> </textarea>
    </div>
    
    <div class="form-group">
        <label>Additional Info</label>
        <textarea class ="form-control" name="billAdditionalinfo" rows='6'>  <?php echo $bill['bill_additionalinfo']?> </textarea>
    </div>
    
    <div class="form-group">
        <label>Full Text</label>
        <input type = "text" class ="form-control" name="billFulltext" value ="<?php echo $bill['bill_fulltext']?>" required/>
    </div>
    
     <div class="form-group">
        <label>Impact</label>
         <textarea class ="form-control" name="billImpact" rows='6' required> <?php echo $bill['bill_impact']?></textarea>
    </div>
        
     <div class="form-group">
        <label>Topic 1</label>
        <input type = "text" class ="form-control" name="billTopic1" id="billTopic1" value ="<?php echo $bill['bill_topic1']?>" required/>
    </div>
    
    <div class="form-group">
        <label>Topic 2</label>
        <input type = "text" class ="form-control" name="billTopic2" id="billTopic2" value ="<?php echo $bill['bill_topic2']?>"/>
    
    <div class="form-group">
        <label>Topic 3</label>
        <input type = "text" class ="form-control" name="billTopic3" id="billTopic3 value ="<?php echo $bill['bill_topic3']?>""/>
    </div>
    
    
    <div class="form-group">
        <label>News</label>
        <textarea class ="form-control" name="billNews" rows='6'> </textarea>
    </div>
    
    <div class="form-group">
        <label>Status</label>
         <select class ="form-control" name="billStatus" id="billStatus">
             <option value="In consideration" <?php if ($bill['bill_status']=='In consideration') echo "selected" ?>>In Consideration</option>
              <option value="Passed" <?php if ($bill['bill_status']=='Passed') echo "selected" ?>>Passed</option>
             <option value="Thrown out"<?php if ($bill['bill_status']=='Thrown out') echo "selected" ?>>Thrown Out</option>
        </select>
    </div>
    
    <div class="form-group">
        <label>First Reading</label>
        <input type = "date" class ="form-control" name="billFirstreading" required value ="<?php echo $bill['bill_firstreading']?>"/>
    </div>
    
        
    <div class="form-group">
        <label>Second Reading</label>
        <input type = "date" class ="form-control" name="billSecondreading" value ="<?php echo $bill['bill_secondreading']?>"/>
    </div>
        
    <div class="form-group">
        <label>Reffered to:</label>
       <select class ="form-control" name="billCommittee" id="billCommittee">
          <?php foreach($committees as $com):?>
              <option value="<?php echo $com['id']?>" <?php if ($bill['bill_committee']==$com['id']) echo "selected" ?>>
                  <?php echo $com['com_name']?>
              </option>
          <?php endforeach;?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Report out of Committee</label>
        <input type = "date" class ="form-control" name="billReportoutofcommittee" value ="<?php echo $bill['bill_committeereport']?>"/>
    </div>
    
    
    <div class="form-group">
        <label>Third Reading</label>
        <input type = "date" class ="form-control" name="billThirdreading" value ="<?php echo $bill['bill_thirdreading']?>"/>
    </div>
    
        
    <div class="form-group">
        <label>Remarks</label>
        <textarea class ="form-control" name="billRemarks" rows='6'> <?php echo $bill['bill_remarks']?> </textarea>
    </div>
    
    
    <div class="form-group">
        <input type="file" name="billimage"/>
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
