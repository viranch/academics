<legend>Create user</legend>
    <?php 

    echo form_open('admin/admin/val_user_data');
      
      echo form_label('userid','Userid');
      echo form_input('userid',set_value('userid','user_id'));
    
      echo form_label('password','Password');
      echo form_password('password','');
    
      echo form_label('confpassword','Confpassword');
      echo form_password('confpassword',''); 
    

      echo form_label('user_type','Usertype');
      $options = array('student'  => 'Student',
                      'admin'    => 'Admin',
                      'faculty' => 'Faculty'
                      );
      echo form_dropdown('user_type', $options, 'student');
  
      echo form_label('email_id','Emailid');
      echo form_input('emailid',set_value('email_id','')); 
    
      echo form_label('first)name','firstaname');
      echo form_input('first_name',set_value('first_name','')); 

      echo form_label('last_name','Lastname');
      echo form_input('last_name',set_value('last_name','')); 

      echo form_label('dob','DOB');
      echo form_input('dob',set_value('dob','')); 

      echo form_label('gender','Gender');
      $options = array('male'  => 'Male',
                      'female'    => 'Female' 
                      );
      echo form_dropdown('gender', $options, 'male');
  
    
      echo form_label('address','Address');
      echo form_input('address',set_value('address','')); 

      echo form_label('emergencyaddress','Emergency address');
      echo form_input('emergencyaddress',set_value('emergency_address','')); 
    
      echo form_label('city','city');
      echo form_input('city',set_value('city','')); 
    
       echo form_label('country','country');
      echo form_input('country',set_value('country','')); 
    
      echo form_label('phone','phone');
      echo form_input('phone',set_value('phone','')); 
  
      echo form_label('creation_date','creation_date');
      echo form_input('creation_date',set_value('creation_date','')); 
    
      echo form_submit('submit','Submit');  
      echo form_close(); 
?>    
