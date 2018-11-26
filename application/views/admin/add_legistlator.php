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
<body onload ="updateAll()"> 
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
<?php echo form_open_multipart('');?>
    <div class ='row'>
        <div class='col'>
             <div class="form-group">
                <label><b>Chamber</b></label>
                <div class="radio" name="chamber" onload ="" onchange="updateCommittee()">
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
                 <select class ="form-control" name="state" id="state"  value="<?php if(isset($legistlator)){echo $legistlator['constituency'];} ?>" onchange='updateConstituency()'>
                    <option value="Abia" <?php if(isset($legistlator)){if($legistlator['state']=="Abia"){echo "selected";} }?>>Abia</option>
                    <option value="Adamawa" <?php if(isset($legistlator)){if($legistlator['state']=="Adamawa"){echo "selected";} }?>>Adamawa</option>
                    <option value="Akwa-ibom" <?php if(isset($legistlator)){if($legistlator['state']=="Akwa-Ibom"){echo "selected";} }?>>Akwa-Ibom</option>
                    <option value="Anambra" <?php if(isset($legistlator)){if($legistlator['state']=="Anambra"){echo "selected";} }?>>Anambra</option>
                    <option value="Bauchi" <?php if(isset($legistlator)){if($legistlator['state']=="Bauchi"){echo "selected";} }?>>Bauchi</option>
                    <option value="Bayelsa" <?php if(isset($legistlator)){if($legistlator['state']=="Bayelsa"){echo "selected";} }?>>Bayelsa</option>
                    <option value="Benue" <?php if(isset($legistlator)){if($legistlator['state']=="Benue"){echo "selected";} }?>>Benue</option>
                    <option value="Borno" <?php if(isset($legistlator)){if($legistlator['state']=="Borno"){echo "selected";} }?>>Borno</option>
                    <option value="Cross River" <?php if(isset($legistlator)){if($legistlator['state']=="Cross River"){echo "selected";} }?>>Cross River</option>
                    <option value="Delta" <?php if(isset($legistlator)){if($legistlator['state']=="Delta"){echo "selected";} }?>>Delta</option>
                    <option value="Ebonyi" <?php if(isset($legistlator)){if($legistlator['state']=="Ebonyi"){echo "selected";} }?>>Ebonyi</option>
                    <option value="Edo" <?php if(isset($legistlator)){if($legistlator['state']=="Edo"){echo "selected";} }?>>Edo</option>
                    <option value="Ekiti" <?php if(isset($legistlator)){if($legistlator['state']=="Ekiti"){echo "selected";} }?>>Ekiti</option>
                    <option value="Enugu" <?php if(isset($legistlator)){if($legistlator['state']=="Enugu"){echo "selected";} }?>>Enugu</option>
                    <option value="Gombe" <?php if(isset($legistlator)){if($legistlator['state']=="Gombe"){echo "selected";} }?>>Gombe</option>
                    <option value="Imo" <?php if(isset($legistlator)){if($legistlator['state']=="Imo"){echo "selected";} }?>>Imo</option>
                    <option value="Jigawa" <?php if(isset($legistlator)){if($legistlator['state']=="Jigawa"){echo "selected";} }?>>Jigawa</option>
                    <option value="Kaduna" <?php if(isset($legistlator)){if($legistlator['state']=="Kaduna"){echo "selected";} }?>>Kaduna</option>
                    <option value="Kano"<?php if(isset($legistlator)){if($legistlator['state']=="Kano"){echo "selected";} }?>>Kano</option>
                    <option value="Katsina" <?php if(isset($legistlator)){if($legistlator['state']=="Katsina"){echo "selected";} }?>>Katsina</option>
                    <option value="Kebbi" <?php if(isset($legistlator)){if($legistlator['state']=="Kebbi"){echo "selected";} }?>>Kebbi</option>
                    <option value="Kogi" <?php if(isset($legistlator)){if($legistlator['state']=="Kogi"){echo "selected";} }?>>Kogi</option>
                    <option value="Kwara" <?php if(isset($legistlator)){if($legistlator['state']=="Kwara"){echo "selected";} }?>>Kwara</option>
                    <option value="Lagos" <?php if(isset($legistlator)){if($legistlator['state']=="Lagos"){echo "selected";} }?>>Lagos</option>
                    <option value="Nasarawa" <?php if(isset($legistlator)){if($legistlator['state']=="Nasarawa"){echo "selected";} }?>>Nasarawa</option>
                    <option value="Niger" <?php if(isset($legistlator)){if($legistlator['state']=="Niger"){echo "selected";} }?>>Niger</option>
                    <option value="Ogun" <?php if(isset($legistlator)){if($legistlator['state']=="Ogun"){echo "selected";} }?>>Ogun</option>
                    <option value="Ondo" <?php if(isset($legistlator)){if($legistlator['state']=="Ondo"){echo "selected";} }?>>Ondo</option>
                    <option value="Osun" <?php if(isset($legistlator)){if($legistlator['state']=="Osun"){echo "selected";} }?>>Osun</option>
                    <option value="Oyo" <?php if(isset($legistlator)){if($legistlator['state']=="Oyo"){echo "selected";} }?>>Oyo</option>
                    <option value="Plateau" <?php if(isset($legistlator)){if($legistlator['state']=="Plateau"){echo "selected";} }?>>Plateau</option>
                    <option value="Rivers" <?php if(isset($legistlator)){if($legistlator['state']=="Rivers"){echo "selected";} }?>>Rivers</option>
                    <option value="Sokoto" <?php if(isset($legistlator)){if($legistlator['state']=="Sokoto"){echo "selected";} }?>>Sokoto</option>
                    <option value="Taraba" <?php if(isset($legistlator)){if($legistlator['state']=="Taraba"){echo "selected";} }?>>Taraba</option>
                    <option value="Yobe" <?php if(isset($legistlator)){if($legistlator['state']=="Yobe"){echo "selected";} }?>>Yobe</option>
                    <option value="Zamfara" <?php if(isset($legistlator)){if($legistlator['state']=="Zamfara"){echo "selected";} }?>>Zamfara</option>
                    <option value="Federal Capital Territory" <?php if(isset($legistlator)){if($legistlator['state']=="Federal Capital Territory"){echo "selected";} }?>>Federal Capital Territory</option>
                </select>
            </div>
        </div>
        <div class='col-md-4'>
            <div class="form-group">
                <label><b>Constituency</b></label>
                <select class ="form-control" name="constituency" id="constituency" value= "Kano-South"> </select>
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
                <input type = "text" class ="form-control" name="party" <?php if(isset($legistlator)){echo "value='".$legistlator['party']."'";}?> required/>
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

    
    <input class="btn btn-secondary" type="submit" value="Save"/>

  </div>
    <footer class="footer" style="position: fixed;left: 0;bottom: 0;height: 45px;background: #fafafa; padding: 10px; border-top: solid 1px #eee;">
      <div class="container">
        <span class="text-muted">© 2018 Copyright: Assemblify.</span>
		<span class="text-muted" style="float:right">Powered by Tinqe</span>
      </div>
</footer>

<script type="text/javascript">
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

    function clearOptions(select_name)
    {
        $('#constituency').empty();
    }
    
    function updateAll(){
        updateConstituency();
    }
 
function updateConstituency() {
    cons = '<?php if(isset($legistlator)){echo $legistlator['constituency'];}?>';
    var x = document.getElementById("state").value;
    var y = document.getElementById("constituency");
    clearOptions('constituency');
    updateConsOptions(x,y);}
    
function updateConsOptions(x,y){  
    if (x=="Abia") {
        if(document.getElementById("s").checked == true)
            {
                var option1= document.createElement("option");
                option1.text = "Abia-Central";
                option1.value ="abia-central";
                y.add(option1);
                
                var option2= document.createElement("option");
                option2.text = "Abia-South";
                option2.value ="abia-south";
                y.add(option2);
            }
    }
    else if(x=="Kano") {
        if(document.getElementById("s").checked == true)
            {
                var option1= document.createElement("option");
                option1.text = "Kano-Central";
                option1.value ="Kano-Central";
                y.add(option1);
                
                var option2= document.createElement("option");
                option2.text = "Kano-South";
                option2.value ="Kano-South";
                y.add(option2);
                
                var option3= document.createElement("option");
                option3.text = "Kano-North";
                option3.value ="Kano-North";
                y.add(option3);
            } 
    }
    y.value=cons;}
    
</script>
    
    </body>
</html>
