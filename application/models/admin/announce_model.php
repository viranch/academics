<?php
class announce_model extends CI_model{
  function get_program(){
    $query="select program from acad_batch group by program";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
  function get_year()
  {
    $query="select batch_year from acad_batch group by batch_year";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  
  }
  function announce_courses()
  {
    $query="select course_id,course_name from acad_courses";
    $query = $this->db->query($query);
     if($query->num_rows() > 0) {
        return $query->result_array();
     }
  }
}
?>
