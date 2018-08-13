<div class = "row column">
    <h3>Edit Bill</h3>
    <div class = "row column text-left">
        
    <?php echo form_open_multipart(''); ?>
    <div class="form-group">
        <label>Bill Number</label>
        <input type = "text" name="billNumber" value="<?php echo $bill['bill_number']?>"/>
    </div>
    
    <div class="form-group">
        <label>Bill Title</label>
        <input type = "text" name="billTitle" value="<?php echo $bill['bill_title']?>"/>
    </div>
    
    <div class="form-group">
        <label>Bill Sponsor</label>
        <input type = "text" name="billSponsor" value="<?php echo $bill['bill_sponsor']?>"/>
    </div>
    
    <div class="form-group">
        <label>Bill Summary</label>
        <input type = "textarea" name="billSummary" value="<?php echo $bill['bill_summary']?>"/>
    </div>
    
    <div class="form-group">
        <label>Bill Facts</label>
        <input type = "textarea" name="billFacts" value="<?php echo $bill['bill_facts']?>"/>
    </div>
    
     <div class="form-group">
        <input type="file" name="billimage"/> value="<?php echo $bill['bill_img']?>"
    </div>
    
        <input class="button" type="submit" value="Save"/>

    </div>
    </div>
</div>