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
<?php echo form_open_multipart('');?>
     
    <div class="form-group">
        <label>Chamber</label>
        <div class="radio" name="chamber" onload ="" onchange="updateCommittee()">
            <label><input type="radio" class ="form-control" name="chamber" id="h" value="house" 
                          <?php if(isset($legistlator)){if ($legistlator['chamber']=="house"){echo "checked";}}?>>
                          House</label>
            <br>
            <label><input type="radio" class ="form-control" name="chamber" id="s" value="senate"
                <?php if(isset($legistlator)){if ($legistlator['chamber']=="senate"){echo "checked";}}?>>
                Senate</label>
        </div>
    </div>
    
    <div class="form-group">
        <label>Name</label>
        <input type = "text" class ="form-control" name="name"  <?php if(isset($legistlator)){echo "value='".$legistlator['name']."'";}?> required/>
    </div>
    
    <div class="form-group">
        <label>Party</label>
        <input type = "text" class ="form-control" name="party" <?php if(isset($legistlator)){echo "value='".$legistlator['party']."'";}?> required/>
    </div>
    
    <div class="form-group">
        <label>State</label>
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
    
    <div class="form-group">
        <label>Constituency</label>
        <select class ="form-control" name="constituency" id="constituency" value= "Kano-South"> </select>
    </div>
    
    <div class="form-group">
        <label>Active</label>
        <div class="radio" name="active">
            <label><input type="radio" class ="form-control" name="active" value =1 id="t"
                    <?php if(isset($legistlator)){if ($legistlator['active']=="1"){echo "checked";}}?>>Yes</label>
            <br>
            <label><input type="radio" class ="form-control" name="active" value =0 id="f"
                    <?php if(isset($legistlator)){if ($legistlator['active']=="0"){echo "checked";}}?>>No</label>
        </div>
    </div>
    
    <input class="button" class="form-control" type="submit" value="Save"/>

  </div>
    <footer class="footer" style="bottom: 0;height: 45px;background: #fafafa; padding: 10px; border-top: solid 1px #eee;">
      <div class="container">
        <span class="text-muted">© 2018 Copyright: Assemblify.</span>
		<span class="text-muted" style="float:right">Powered by Tinqe</span>
      </div>
</footer>

<script type="text/javascript">

    function clearOptions(select_name)
    {
        var select = document.getElementById(select_name);
        var length = select.options.length;
        for (i = 0; i < length; i++) {
            select.options[i] = null;
        }
        console.log("cleared"+select_name);
    }
    
    function updateAll(){
        updateConstituency();
    }
 
function updateConstituency() {
    cons = '<?php if(isset($legistlator)){echo $legistlator['constituency'];}?>';
    var x = document.getElementById("state").value;
    var y = document.getElementById("constituency");
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
