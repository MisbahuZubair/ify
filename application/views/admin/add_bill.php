<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Assemblify Dashboard | <?php if($page==1){echo "Edit";}else {{echo "Add bill";}} ?></title>
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
<body onload ="getTermLegistlators()"> 
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
    
<div class="container" >
<!--<form method ="post"> -->
<?php echo form_open_multipart(''); ?>
    <div class ="row">
        <div class ="col-md-3">
            <div class="form-group">
                <label><b>Chamber</b></label>
                <div class="radio" name="origin" onchange="getTermLegistlators()" >
                    <label><input type="radio" name="origin" id="h" value="house" 
                                  <?php if($page==1){if($bill['bill_origin']=='House') {echo 'checked' ;}} ?>>
                                  House</label>

                    <label><input type="radio"name="origin" id="s" value="senate"
                        <?php if($page==1){if($bill['bill_origin']=='Senate') {echo 'checked' ;}}?>>
                        Senate</label>
                </div>
            </div>
        </div>
        <div class ="col-md-2">
            <div class="form-group">
                <label><b>Transmitted</b></label>
                <div class="radio" name="trans" >
                    <label><input type="radio" name="trans" id="trans_false" value=false
                       <?php if($page==1){if($bill['bill_trans']==false) {echo 'checked' ;}}?>>
                        False</label>
                    
                    <label><input type="radio" name="trans" id ="trans_true" value=true
                                  <?php if($page==1){if($bill['bill_trans']==true) {echo 'checked' ;}}?>>
                                  True</label>
                </div>
            </div>
        </div>
        <div class ="col-md-4">
            <div class="form-group">
                <label><b>Assembly</b></label>
                <select class ="form-control" name="billTerm" id="billTerm"  onchange="getTermLegistlators()">
                <?php  foreach($info as $rep):?>
                      <option value="<?php echo $rep?>" <?php if($page==1){if($bill['bill_term']==$rep) {echo 'selected' ;}}?>>
                          <?php echo $rep?>
                      </option>
                  <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class ="col-md-3">
            <div class="form-group">
                <label><b>Status</b></label>
                 <select class ="form-control" name="billStatus" id="billStatus">
                     <option value="in consideration">In Consideration</option>
                      <option value="passed">Passed</option>
                     <option value="thrown out">Thrown Out</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class ="row">
        <div class ="col-md-4">
            <div class="form-group"> 
                <label><b>Sponsor</b></label>
                <select class ="form-control" name="billSponsor" id="billSponsor">  
                </select>
            </div>
        </div>
        <div class ="col-md-4">
            <div class="form-group">
                <label><b>Number</b></label> <input type = "text" class ="form-control" name="billNumber" value="<?php if($page==1){echo $bill['bill_number'] ;}?>" required/>
            </div>
        </div>
        <div class ="col-md-4">
            <div class="form-group">
                <label><b>Full Text</b></label>
                <input type = "text" class ="form-control" name="billFulltext" value="<?php if($page==1){echo $bill['bill_fulltext'] ;}?>" required/>
            </div>
        </div>
    </div>
    
    <div class ="row">
        <div class="col-md-6">
            <div class="form-group">
                <label><b>Question</b></label><textarea rows="4" cols="50" maxlength="200" class ="form-control" name="billQuestion" value=" "required><?php if($page==1){echo $bill['bill_question'] ;}?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><b>Title</b></label><textarea rows="4" cols="50" maxlength="250" class ="form-control" name="billTitle" value="" required><?php if($page==1){echo $bill['bill_title'] ;}?></textarea>
            </div>
        </div>
    </div>
    
    <div class ="row">
        <div class ="col-md-4">
           <div class="form-group">
               <label><b>Tag 1</b></label>
                <select class ="form-control" name="billTag1" id="billTag1" required ></select>
            </div>
        </div>
        <div class ="col-md-4">
            <div class="form-group">
                <label><b>Tag 2</b></label>
                <select class ="form-control" name="billTag2" id="billTag2"></select>
            </div>
        </div>
        <div class ="col-md-4">
            <div class="form-group">
                <label><b>Tag 3</b></label>
                <select class ="form-control" name="billTag3" id="billTag3"></select>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 form-group">
            <label><b>Summary</b></label>
            <textarea class ="form-control" name="billSummary" rows='6' value="" required> <?php if($page==1){echo $bill['bill_summary'] ;}?></textarea>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label><b>First Reading</b></label>
                <input type = "date" class ="form-control" name="billFirstreading" value="<?php if($page==1){echo $bill['bill_firstreading'] ;}?>"required/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label><b>Second Reading</b></label>
                <input type = "date" class ="form-control" name="billSecondreading"/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label><b>Reffered to:</b></label>
                <select class ="form-control" name="billCommittee" id="billCommittee">
                  <?php foreach($committees as $com):?>
                      <option value="<?php echo $com['id']?>">
                          <?php echo $com['com_name']?>
                      </option>
                  <?php endforeach;?>
                </select>
            </div>
        </div>
    </div>
    
    <div class ="row">
        <div class="col-md-3">
            <div class="form-group">
                <label><b>Report out of Committee</b></label>
                <input type = "date" class ="form-control" name="billReportoutofcommittee" value="<?php if($page==1){echo $bill['bill_committeereport'] ;}?>"/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label><b>Third Reading</b></label>
                <input type = "date" class ="form-control" name="billThirdreading"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><b>Remarks</b></label>
                <input type ="text" class ="form-control" name="billRemarks"/>
            </div>
        </div>
    </div>    
    
    <div class="form-group">
        <label><b>Bill Image</b></label><br/>
        <input type="file" name="billimage" id="billimage"/>
        <img id="image_upload_preview" src="<?php if($page==1){echo site_url('application/uploads/').$bill['bill_img'];}else{echo 'http://placehold.it/100x100';}?>" alt="your image" /> 
    </div>    
        
<input class="btn btn-secondary" class="form-control" type="submit" value="Save"/>
<div class="container">
    <div id="load_data"></div>
    <div id="load_data_message">
    </div></div>
    <footer class="footer" style="bottom: 0;height: 45px;background: #fafafa; padding: 10px; border-top: solid 1px #eee;">
      <div class="container">
        <span class="text-muted">© 2018 Copyright: Assemblify.</span>
		<span class="text-muted" style="float:right">Powered by Tinqe</span>
      </div>
</footer>
    </div>
</body>
    
    <script type="text/javascript">
    function updateTags()
    {
        var tag1 =""+<?php if ($page==1){echo '"'.$bill['bill_tag1'].'"';} else echo '""';?>;
        getTags(tag1, 'billTag1', 'tag1');
        var tag2 =""+<?php if ($page==1){echo '"'.$bill['bill_tag2'].'"';} else echo '""';?>;
        getTags(tag2, 'billTag2', 'tag2');
        var tag3 =""+<?php if ($page==1){echo '"'.$bill['bill_tag3'].'"';} else echo '""';?>;
        getTags(tag3, 'billTag3','tag3');
    }
    
    function getTags(selected_tag, tag_id, tag_column){
        $.ajax({
        url:"<?php echo base_url(); ?>admin/dashboard/getTags/",
        method:"POST",
        data:{selected_tag: selected_tag,tag_id: tag_id, tag_column:tag_column},
        cache: false,
        success:function(data){
            if(data == '')
          {
            $('#load_data_message').html('<h3>No More Result Found</h3>');
            action = 'active';
              console.log("no"+chamber);
          }
          else
          {
            console.log(data);
            console.log('data');
               $('#'+tag_id).html("");
             $('#'+tag_id).append(data);
            action = 'inactive';}
        }})}
        
        
    function getTermLegistlators()
    {
        var term = $("#billTerm option:selected" ).text();
        term= $.trim(term);
        var sponsor =""+<?php if ($page==1){echo '"'.$bill['bill_sponsor'].'"';} else echo '""'?>;
        var chamber ="";
        
        if($('#s').is(':checked')){console.log("inside");  chamber="senate";}
        else if ($('#h').is(':checked')){chamber="house";}
        
        console.log("its:"+chamber);
        
        $.ajax({
        url:"<?php echo base_url(); ?>admin/dashboard/getTermLegistlators/",
        method:"POST",
        data:{term: term, sponsor: sponsor, chamber:chamber},
        cache: false,
        success:function(data){
            if(data == '')
          {
            $('#load_data_message').html('<h3>No More Result Found</h3>');
            action = 'active';
              console.log("no"+chamber);
          }
          else
          {
            console.log(data);
            console.log('data');
               $('#billSponsor').html("");
             $('#billSponsor').append(data);
            action = 'inactive';}
        }})}
        
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#billimage").change(function () {
        readURL(this);
    });
        $(document).ready(function() {
        updateChamber();
            updateTrans();
            updateTags();
    });
        function updateChamber(){
        if($('#s').is(':checked')||$('#h').is(':checked')) {} else {$('#h').attr('checked','checked');}
    }
         function updateTrans(){
        if($('#trans_true').is(':checked')||$('#trans_false').is(':checked')) {} else {$('#trans_false').attr('checked','checked');}
    } 
    </script>
</html>
