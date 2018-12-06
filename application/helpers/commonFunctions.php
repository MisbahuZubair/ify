 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

function billTags($tag1, $tag2, $tag3){
$tags="";
if($row->bill_tag1!=""){$tags.="<a href='".site_url('bills/tag/'.$row->bill_tag1)."'>#".$row->bill_tag1."</a> ";}
if($row->bill_tag2!=""){$tags.="<a href='".site_url('bills/tag/'.$row->bill_tag2)."'>#".$row->bill_tag2."</a> ";}
if($row->bill_tag3!=""){$tags.="<a href='".site_url('bills/tag/'.$row->bill_tag3)."'>#".$row->bill_tag3."</a> ";}
return $tags;
}
 
function billStatus($status){
$status="";
if($row->bill_status=="Passed"){$status.='<i class="fas fa-check-circle"></i>';}
else if($row->bill_status=="In consideration"){$status.='<i class="fa fa-clock"></i>';}
else if($row->bill_status=="Thrown out"){$status.='<i class="fa fa-ban"></i>';}
return $status;
}

function billPublish($status){
$pub_text="Publish";
if($row->publish==1){$pub_text = "Unpublish";}
}
                    
$sub_theme="house_subtheme";
if($row->bill_origin=="Senate"){$sub_theme="senate_subtheme";}

?>