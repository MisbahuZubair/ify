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
<link rel="stylesheet" type="text/css" href="<?php echo  site_url('application/views')?>/styles.css">
  
</head>
<body> 
<div class="container">
<nav class="navbar navbar-expand-xl navbar-dark shadow-sm p-3 mb-5 bg-secondary rounded">
    <a class="navbar-left" href="#">
        <a href="<?php echo site_url('bills/getBills/all/all'); ?>"><img src="<?php echo site_url('application/views/logo.svg'); ?>" class="logo" alt=""></a>
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse float-right" id="navbars">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('admin/dashboard');?>"> Manage Bills</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('admin/dashboard/addBill');?>">Add Bill</a>
          </li>
              <li class="nav-item">
            <a class="nav-link" style="<?php if(isset($legistlator)){}else{echo 'color:white';}?>" href="<?php echo site_url('admin/dashboard/addLegistlator');?>">Add Legistlator</a>
          </li>
            <li class="nav-item">
            <a class="nav-link"  style="<?php if(isset($legistlator)){echo 'color:white';}?>" href="<?php echo site_url('admin/dashboard/manageLegistlators');?>">Manage Legistlators</a>
          </li>         
        </ul>
      </div>
    <a href="<?php echo site_url('auth/logout');?>" class="btn btn-light">Logout</a>
</nav>
</div>
    
<div class="container">
<!--<form method ="post"> -->
<?php echo form_open_multipart('');?>
    <div class ='row'>
        <div class='col'>
             <div class="form-group">
                <label><b>Chamber</b></label>
                <div class="radio" name="chamber">
                    <label><input type="radio" name="chamber" id="h" value="house" 
                                  <?php if(isset($legistlator)){if ($legistlator['chamber']=="house"){echo "checked";}}?>>
                                  House</label>

                    <label><input type="radio"name="chamber" id="s" value="senate"
                        <?php if(isset($legistlator)){if ($legistlator['chamber']=="senate"){echo "checked";}}?>>
                        Senate</label>
                </div>
            </div>
        </div>
        <div class='col-md-4'>
            <div class="form-group">
                <label><b>State</b></label>
                 <select class ="form-control" name="state" id="state" onchange='updateCons()'>
                    
                </select>
            </div>
        </div>
        <div class='col-md-4'>
            <div class="form-group">
                <label><b>Constituency</b></label>
                <select class ="form-control" name="cons_id" id="cons_id" value= ""> </select>
                <input type="hidden" id="cons_name" name="cons_name" value="">
            </div>
        </div>
    </div>
   
    <div class ='row'>
        <div class="col-md-9">
            <div class="form-group">
                <label><b>Name</b></label>
                <input type = "text" class ="form-control" name="name"  <?php if(isset($legistlator)){echo "value='".$legistlator['name']."'";}?> required/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label><b>Party</b></label>
                <select class ="form-control" name="party" id="party" required ></select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
    <div class="form-group">
        <label><b>Term(s)</b></label><br/>
        <input type="hidden" id="legistlator_term" name="legistlator_term" value="new">
        
         <?php if(isset($legistlator)){$terms = explode(',', $legistlator['term']);} ?>
         <?php foreach($info as $rep):?>
             <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name='term' onchange='updateTerms()' id="<?php echo $rep?>" value="<?php echo $rep?>" <?php  if(isset($legistlator)){foreach($terms as $term){if($term == $rep) {echo 'checked';}}} ?>>
                 <label class="form-check-label" for="<?php echo $rep?>"><?php echo $rep?></label>
                 </div>
                  <?php endforeach;?>
    </div>
    </div>
    </div>

<input class="btn btn-secondary" type="submit" value="Save"/>```
  </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">© 2018 Copyright: Assemblify.</span>
      </div>
    </footer>

<script type="text/javascript">
    $(document).ready(function() {
        updateChamber();
        getStates();
        getParties();
        updateConsName();
    });
    
    $("#s").click(function(){
    updateCons();
});
       $("#h").click(function(){
    updateCons();
});
    function updateConsName(){
        $('#cons_name').val($("#cons_id option:selected").text());
    }
    
    $('#cons_id').on('change', function() {
        updateConsName();
});
    
    function getParties(){
        var column ="party";
        var party =""+<?php if (isset($legistlator)){echo '"'.$legistlator['party'].'"';} else echo '""'?>;
        console.log(party);
        $.ajax({
        url:"<?php echo base_url(); ?>admin/dashboard/getOptionsFromInfo/",
        method:"POST",
        data:{selected: party, column:column},
        cache: false,
        success:function(data){
             $('#party').html("");
             $('#party').append(data);
            action = 'inactive';}
        })
    }
    
    function getStates()
    {
        var state =""+<?php if (isset($legistlator)){echo '"'.$legistlator['state'].'"';} else echo '""'?>;
        $.ajax({
        url:"<?php echo base_url(); ?>admin/dashboard/getStates/",
        method:"POST",
        data:{state: state},
        cache: false,
        success:function(data){
            if(data == '')
          {
            $('#load_data_message').html('<h3>None</h3>');
            action = 'active';
          }
          else
          {
             $('#state').html("");
             $('#state').append(data);
            action = 'inactive';}
        }})
        
        if(state==""){state='Abia';}
        updateCons(state);
    }
    
    function updateChamber(){
        if($('#s').is(':checked')||$('#h').is(':checked')) {} else {$('#h').attr('checked','checked');}
    }
    
    function getSelectedChamber(){
        if($('#h').is(':checked')){return 'house'} else return 'senate';
    }
    
    
    function updateCons(state){
        if(state){}else{var state =$("#state option:selected").val();}
        var chamber_cons = getSelectedChamber();
        console.log($("#state option:selected").text());
        var cons =""+<?php if (isset($legistlator)){echo '"'.$legistlator['cons'].'"';} else echo '""'?>;
        $.ajax({
        url:"<?php echo base_url(); ?>admin/dashboard/getCons/",
        method:"POST",
        data:{cons: cons, chamber_cons: chamber_cons, state:state},
        cache: false,
        success:function(data){
            if(data == '')
          {
            $('#load_data_message').html('<h3>None</h3>');
            action = 'active';
          }
          else
          {
            console.log(data);
            console.log('data');
            $('#cons_id').html("");
            $('#cons_id').append(data);
            action = 'inactive';}
        }})
    }
    
    function updateTerms(){
        var termString='';
       var terms = document.getElementsByName("term");
        if (terms[0].checked == true){termString +=terms[0].value + ',';}
        for (var i = 1;i < terms.length; i++) {
            if (terms[i].checked == true){
                termString +=terms[i].value + ',';
            }
    }
        //termString = termString.trim()
        termString = termString.slice(0, -1);
       document.getElementById("legistlator_term").value = termString;
        console.log(termString);
    }
          
</script>
    
    </body>
</html>
