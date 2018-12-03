<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class legistlators extends CI_Controller {

	public function getLegistlators($source, $filter)
	{
        $this->load->helper('url');
        $data['page']="".$source."-".$filter.""; 
        $data['source'] = $source;
        $data['filter'] = $filter; 
        $this->load->view('index', $data);                    
	}
    
    public function fetch($source, $filter)
    {
        $output = '';
        $this->load->model('legistlators_model');
        $data = $this->legistlators_model->fetch_legistlators_model($this->input->post('limit'), $this->input->post('start'), $filter);
        if($data->num_rows() > 0)
            
      {
            foreach(array_chunk($data->result(), 2) as $pair) {
                $output .='<div class="row">';
                foreach ($pair as $row)
       {
        
        $theme="#437F97"; $sub_theme="#EEFAF9";
        if ($row->chamber=="senate"){$theme = "#F6511D"; $sub_theme="#F9F7EF";}
                    
        $output .= '<div class="col-lg-6"><div class="nopadding card shadow p-3 mb-5 rounded " style ="text-align:center;margin-bottom: 20px; padding:0px 0px 0px 0px;background-color:'.$sub_theme.'"><div class="card-header" style="padding:0; background:#ffffff"><h5>'.$row->name.'</h5></div><div>Representing '.$row->constituency.', '.$row->state.' State</div><a class=" btn" style="background:'.$theme.'; color:white" href="'.site_url('bills/legistlatorBills/').$row->id.'" role="button">View Sponsored Bills</a></div></div>';
       }
                $output .='</div>';
            }
      }
      echo $output;
    }
}
?>