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
  function course_create()
  {
    $data = array('category' => $this->input->post('category'),
      'course_name'=>$this->input->post('course_name'),
      'course_id'=>$this->input->post('course_id'),
      'pass_course'=>$this->input->post('pass'),
      'credits'=>$this->input->post('credits'),
      'description'=>$this->input->post('description'));
    
    $this->db->insert('acad_courses',$data);
  }
  function delete_course()
  {
    $courses=$this->input->post('courses');
    if(!empty($courses)){
    foreach ($courses as $row) {
      $query="delete from acad_courses where course_id='".$row."'";
      $query = $this->db->query($query);
	  $path=realpath(APPPATH.'../lectures/'.$row.'/');
	  $this->deleteDir($path.'/');
	  
    }
  }
  }
  function deleteDir($dir)
		{
		if ($handle = opendir($dir))
		{
		$array = array();
		
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
		
				if(is_dir($dir.$file))
				{
					if(!rmdir($dir.$file)) // Empty directory? Remove it
					{
					//deleteDir($dir.$file.'/'); // Not empty? Delete the files inside it
					}
				}
				else
				{
				   unlink($dir.$file);
				}
			}
		}
		closedir($handle);
		
		rmdir($dir);
		}
	}

}
?>
