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
    <div class ="row">
        <div class="col-md-4">
            <div class="form-check form-check-inline">
              <label style="padding-right:20px">House<input type="radio" class ="form-control" name="origin" value ="House"></label>
                <br>
              <label>Senate<input type="radio" class ="form-control" name="origin" value ="Senate"></label>
            </div>
            
            <div class="form-group">
                <label>Number</label> <input type = "text" class ="form-control" name="billNumber" required/>
            </div>
            
            <div class="form-group">Sponsor
                <select class ="form-control" name="billSponsor" id="billSponsor">
                  <?php foreach($legistlators as $rep):?>
                      <option value="<?php echo $rep['id']?>">
                          <?php echo $rep['name']?>
                      </option>
                  <?php endforeach;?>
                </select>
            </div>
            
            <div class="form-group">
                <label>Full Text</label>
                <input type = "text" class ="form-control" name="billFulltext" required/>
            </div>        
             <div class="form-group">
                <label>Topic 1</label>
                <input type = "text" class ="form-control" name="billTopic1" id="billTopic1" required/>
            </div>

            <div class="form-group">
                <label>Topic 2</label>
                <input type = "text" class ="form-control" name="billTopic2" id="billTopic2"/>
            </div>

            <div class="form-group">
                <label>Topic 3</label>
                <input type = "text" class ="form-control" name="billTopic3" id="billTopic3"/>
            </div>
            <div class="form-group">
                <label>Status</label>
                 <select class ="form-control" name="billStatus" id="billStatus">
                     <option value="in consideration">In Consideration</option>
                      <option value="passed">Passed</option>
                     <option value="thrown out">Thrown Out</option>
                </select>
            </div>

            <div class="form-group">
                <label>First Reading</label>
                <input type = "date" class ="form-control" name="billFirstreading" required/>
            </div>


            <div class="form-group">
                <label>Second Reading</label>
                <input type = "date" class ="form-control" name="billSecondreading"/>
            </div>

            <div class="form-group">
                <label>Reffered to:</label>
                <select class ="form-control" name="billCommittee" id="billCommittee">
                  <?php foreach($committees as $com):?>
                      <option value="<?php echo $com['id']?>">
                          <?php echo $com['com_name']?>
                      </option>
                  <?php endforeach;?>
                </select>
            </div>

            <div class="form-group">
                <label>Report out of Committee</label>
                <input type = "date" class ="form-control" name="billReportoutofcommittee"/>
            </div>


            <div class="form-group">
                <label>Third Reading</label>
                <input type = "date" class ="form-control" name="billThirdreading"/>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="form-group">
                <label>Question</label><input type = "text" class ="form-control" name="billQuestion" required/>
            </div>
            <div class="form-group">
                <label>Title</label><input type = "text" class ="form-control" name="billTitle" required/>
            </div>
                <div class="form-group">
                    <label>Summary</label>
                    <textarea class ="form-control" name="billSummary" rows='6' required> </textarea>
                </div>

                <div class="form-group">
                    <label>Additional Info</label>
                    <textarea class ="form-control" name="billAdditionalinfo" rows='6'> </textarea>
                </div>
                <div class="form-group">
                    <label>Impact</label>
                     <textarea class ="form-control" name="billImpact" rows='6' required> </textarea>
                </div>
                <div class="form-group">
                    <label>News</label>
                    <textarea class ="form-control" name="billNews" rows='6'> </textarea>
                </div>        
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class ="form-control" name="billRemarks" rows='6'> </textarea>
                </div>
        </div>
    </div>

    
    
    
    
    <div class="form-group">
        <input type="file" name="billimage"/>
    </div>
    
        <input class="button" class="form-control" type="submit" value="Save"/>

  </div>
    <footer class="footer" style="bottom: 0;height: 45px;background: #fafafa; padding: 10px; border-top: solid 1px #eee;">
      <div class="container">
        <span class="text-muted">© 2018 Copyright: Assemblify.</span>
		<span class="text-muted" style="float:right">Powered by Tinqe</span>
      </div>
</footer>
</body>
</html>
