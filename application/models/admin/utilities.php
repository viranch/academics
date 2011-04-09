<?php
class Utilities extends CI_model{
  function insert_dates(){
    $startdate= $this->input->post('start_date');
    $enddate=$this->input->post('end_date');
    $description=$this->input->post('description');
    $data = array('start_date' => $startdate,
                  'end_date' => $enddate,
                  'description' => $description);
    try{
      if(!$this->db->insert('acad_important_dates',$data)){
        echo "Sorry the data is not inserted";
      }
    }
    catch (Exception $e) {
              return;
    }

    
  }
  function get_important_dates()
  {
    $query="select * from acad_important_dates";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function delete_dates()
  {
    $dates=$this->input->post('dates');
    if(!empty($dates)){
      foreach ($dates as $row) {
        $query="delete from acad_important_dates where id=".$row;
        $query = $this->db->query($query);
      }
    }
  }
}
?>
