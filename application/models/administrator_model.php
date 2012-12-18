<?php
class Administrator_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_admin_details()
	{
		$user_id  = $this->session->userdata('user_id');
		$this->db->select('administrator.administrator_name,administrator.administrator_position,user_account.username,user_account.password');
		$this->db->from('user_account');
		$this->db->join('administrator','administrator.user_id = user_account.user_id');
		$this->db->where('user_account.user_id',$user_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function change_profile_details()
	{
		//ETO YUNG MGA DATA NA IUUPDATE NATIN MGA SIR :) 
		$admin_name  =  $this->security->xss_clean($this->input->post('admin_name'));
		$admin_position =  $this->security->xss_clean($this->input->post('admin_position'));
		$admin_username  =  $this->security->xss_clean($this->input->post('admin_username'));
		$admin_password =  $this->security->xss_clean($this->input->post('admin_password'));			
		//eto naman para madetermine kung kanino iuupdate ;) 
		$user_id = $this->session->userdata('user_id');

		//ilalagay po natin mga tropa yung mga data sa array para po astig
		$administrator_profile = array(
			'administrator_name' => $admin_name,
			'administrator_position' => $admin_position
			);

		$this->db->where('user_id',$user_id);
		$this->db->update('administrator',$administrator_profile);
		/*
		 eto naman para sa user account kasi may dalawa tayong tables dba
		 isa sa profile nung account isa naman dun sa mismong account :))))) YOLOS
		*/
		$user_account = array(
			'username' => $admin_username,
			'password' => $admin_password
			);
		$this->db->where('user_id',$user_id);
		$this->db->update('user_account',$user_account);
	}

	public function set_news_feed()
	{

	}

	public function get_news_feed()
	{
		
	}
	public function set_student_details()
	{
		$student_number = $this->security->xss_clean($this->input->post('student_number'));
		$student_username = $this->security->xss_clean($this->input->post('student_username'));
		$student_password = $this->security->xss_clean($this->input->post('student_password'));
		$student_first_name = $this->security->xss_clean($this->input->post('student_first_name'));
		$student_middle_name = $this->security->xss_clean($this->input->post('student_middle_name'));
		$student_last_name = $this->security->xss_clean($this->input->post('student_last_name'));
		$student_address = $this->security->xss_clean($this->input->post('student_address'));
		$student_contact_number = $this->security->xss_clean($this->input->post('student_contact_number'));
		$student_birth_date = $this->security->xss_clean($this->input->post('student_birth_date'));
		$student_age = $this->security->xss_clean($this->input->post('student_age'));
		$student_nationality = $this->security->xss_clean($this->input->post('student_nationality'));
		$student_religion = $this->security->xss_clean($this->input->post('student_religion'));
		$student_guardian_name = $this->security->xss_clean($this->input->post('student_guardian_name'));
		$student_guardian_contact_number = $this->security->xss_clean($this->input->post('student_guardian_contact_number'));
		$student_guardian_relationship = $this->security->xss_clean($this->input->post('student_guardian_relationship'));
		
		$student_profile = array(
			'student_id' => $student_number,
			'student_fname' => $student_first_name,
			'student_mname' => $student_middle_name,
			'student_lname' => $student_last_name,
			'student_address' => $student_address,
			'student_contactno' => $student_contact_number,
			'student_bday' => $student_birth_date,
			'student_age' => $student_age,
			'student_nationality' => $student_nationality,
			'student_religion' => $student_religion,
			'student_guardian_name' => $student_guardian_name,
			'student_guardian_contactno' => $student_guardian_contact_number,
			'student_guardian_relationship' => $student_guardian_relationship
			);
		$this->db->insert('student_profile',$student_profile);

		$user_account = array(
			'user_id' => $student_number,
			'username' => $student_username,
			'password' => $student_password,
			'account_type' => 'student',
			'account_status' => 'enable',
			'hasChangePassword' => 0
			);
		$this->db->insert('user_account',$user_account);
	}

	public function get_student_details($slug = FALSE)
	{
		/*

		si slug eto yung makikita nyo sa url 
		
		example 
		bagumbonghs.com/student/10500057
		
		yung 10500057 yun an tinatawag na slug:)
		*/
		if($slug === FALSE)
		{
			
			//getting all the necessary information about the user accounts
			$query = $this->db->get('student_profile');
			return $query->result_array();
		}
			$this->db->select('*');
			$this->db->from('student_profile');
			$this->db->where('student_profile.student_id',$slug);
			$query = $this->db->get();
			if($query->num_rows == 0)
			{
				return show_404();
			}else{
			return $query->row_array();
			}
	}

	public function get_student_section($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}
		/*
		Tables & Columns to be used
		
		table : section_details
		1.section_school_year
		
		table:  section
		1.section_name
		2.section_year_level
		
		table : faculty_profile
		1.faculty_fname
		2.faculty_mname
		3.faculty_lname

		*/
		$this->db->select('SecDet.section_details_id,SecDet.section_school_year,section.section_name,section.section_year_level,fp.faculty_fname,fp.faculty_mname,fp.faculty_lname');
		$this->db->from('student_section StudSec');
		$this->db->join('section_details SecDet','SecDet.section_details_id = StudSec.section_details_id');
		$this->db->join('section','section.section_id = SecDet.section_id');
		$this->db->join('faculty_profile fp','fp.faculty_id = SecDet.faculty_id');
		$this->db->where('StudSec.student_id',$slug);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function modify_student_details($slug)
	{
	//ETO YUNG MGA DATA NA IUUPDATE NATIN MGA SIR :) 
		$student_first_name = $this->security->xss_clean($this->input->post('student_first_name'));
		$student_middle_name = $this->security->xss_clean($this->input->post('student_middle_name'));
		$student_last_name = $this->security->xss_clean($this->input->post('student_last_name'));
		$student_address = $this->security->xss_clean($this->input->post('student_address'));
		$student_contact_number = $this->security->xss_clean($this->input->post('student_contact_number'));	
		$student_birth_date = $this->security->xss_clean($this->input->post('student_birth_date'));	
		$student_age = $this->security->xss_clean($this->input->post('student_age'));
		$student_nationality = $this->security->xss_clean($this->input->post('student_nationality'));
		$student_religion = $this->security->xss_clean($this->input->post('student_religion'));
		$student_guardian_name = $this->security->xss_clean($this->input->post('student_guardian_name'));
		$student_guardian_contact_number = $this->security->xss_clean($this->input->post('student_guardian_contact_number'));
		$student_guardian_relationship = $this->security->xss_clean($this->input->post('student_guardian_relationship'));
		//eto naman para madetermine kung kanino iuupdate ;) 
		

		//ilalagay po natin mga tropa yung mga data sa array para po astig
		$student_profile = array(
			'student_fname' => $student_first_name,
			'student_mname' => $student_middle_name,
			'student_lname' => $student_last_name,
			'student_address' => $student_address,
			'student_contactno' => $student_contact_number,
			'student_bday' => $student_birth_date,
			'student_age' => $student_age,
			'student_nationality' => $student_nationality,
			'student_religion' => $student_religion,
			'student_guardian_name' => $student_guardian_name,
			'student_guardian_contactno' => $student_guardian_contact_number,
			'student_guardian_relationship' => $student_guardian_relationship
			);

		$this->db->where('student_id',$slug);
		$this->db->update('student_profile',$student_profile);
	}

	public function set_faculty_details()
	{
		$faculty_number = $this->security->xss_clean($this->input->post('faculty_number'));
		$faculty_username = $this->security->xss_clean($this->input->post('faculty_username'));
		$faculty_password = $this->security->xss_clean($this->input->post('faculty_password'));
		$faculty_first_name = $this->security->xss_clean($this->input->post('faculty_first_name'));
		$faculty_middle_name = $this->security->xss_clean($this->input->post('faculty_middle_name'));
		$faculty_last_name = $this->security->xss_clean($this->input->post('faculty_last_name'));
		$faculty_address = $this->security->xss_clean($this->input->post('faculty_address'));
		$faculty_contact_number = $this->security->xss_clean($this->input->post('faculty_contact_number'));
		$faculty_birth_date = $this->security->xss_clean($this->input->post('faculty_birth_date'));
		$faculty_age = $this->security->xss_clean($this->input->post('faculty_age'));
		$faculty_nationality = $this->security->xss_clean($this->input->post('faculty_nationality'));
		$faculty_religion = $this->security->xss_clean($this->input->post('faculty_religion'));
		$faculty_guardian_name = $this->security->xss_clean($this->input->post('faculty_guardian_name'));
		$faculty_guardian_contact_number = $this->security->xss_clean($this->input->post('faculty_guardian_contact_number'));
		$faculty_guardian_relationship = $this->security->xss_clean($this->input->post('faculty_guardian_relationship'));
		
		$faculty_profile = array(
			'faculty_id' => $faculty_number,
			'faculty_fname' => $faculty_first_name,
			'faculty_mname' => $faculty_middle_name,
			'faculty_lname' => $faculty_last_name,
			'faculty_address' => $faculty_address,
			'faculty_contactno' => $faculty_contact_number,
			'faculty_bday' => $faculty_birth_date,
			'faculty_age' => $faculty_age,
			'faculty_nationality' => $faculty_nationality,
			'faculty_religion' => $faculty_religion
			);
		$this->db->insert('faculty_profile',$faculty_profile);

		$user_account = array(
			'user_id' => $faculty_number,
			'username' => $faculty_username,
			'password' => $faculty_password,
			'account_type' => 'faculty',
			'account_status' => 'enable',
			'hasChangePassword' => 0
			);
		$this->db->insert('user_account',$user_account);
	}

	public function get_teacher_details($slug = FALSE)
	{
		/*

		si slug eto yung makikita nyo sa url 
		
		example 
		bagumbonghs.com/student/10500057
		
		yung 10500057 yun an tinatawag na slug:)
		*/
		if($slug === FALSE)
		{
			
			//getting all the necessary information about the user accounts
			$query = $this->db->get('faculty_profile');
			return $query->result_array();
		}
			$query = $this->db->get_where('faculty_profile',array('faculty_id' => $slug));
			if($query->num_rows == 0)
			{
				return show_404();
			}else{
			return $query->row_array();
			}
	}

	public function modify_teacher_details($slug)
	{
		//ETO YUNG MGA DATA NA IUUPDATE NATIN MGA SIR :) 
		$teacher_first_name = $this->security->xss_clean($this->input->post('teacher_first_name'));
		$teacher_middle_name = $this->security->xss_clean($this->input->post('teacher_middle_name'));
		$teacher_last_name = $this->security->xss_clean($this->input->post('teacher_last_name'));
		$teacher_address = $this->security->xss_clean($this->input->post('teacher_address'));
		$teacher_contact_number = $this->security->xss_clean($this->input->post('teacher_contact_number'));	
		$teacher_birth_date = $this->security->xss_clean($this->input->post('teacher_birth_date'));	
		$teacher_age = $this->security->xss_clean($this->input->post('teacher_age'));
		$teacher_nationality = $this->security->xss_clean($this->input->post('teacher_nationality'));
		$teacher_religion = $this->security->xss_clean($this->input->post('teacher_religion'));
		//eto naman para madetermine kung kanino iuupdate ;) 
		$user_id = $this->session->userdata('user_id');

		//ilalagay po natin mga tropa yung mga data sa array para po astig
		$teacher_profile = array(
			'faculty_fname' => $teacher_first_name,
			'faculty_mname' => $teacher_middle_name,
			'faculty_lname' => $teacher_last_name,
			'faculty_address' => $teacher_address,
			'faculty_contactno' => $teacher_contact_number,
			'faculty_bday' => $teacher_birth_date,
			'faculty_age' => $teacher_age,
			'faculty_nationality' => $teacher_nationality,
			'faculty_religion' => $teacher_religion,
			);

		$this->db->where('faculty_id',$slug);
		$this->db->update('faculty_profile',$teacher_profile);
		
	}


	public function set_subject()
	{
	$subject_name = $this->security->xss_clean($this->input->post('subject_name'));

	$subject_info = array(
		'subject_name' => $subject_name
		);

	$this->db->insert('subject',$subject_info);

	}

	public function get_subject($slug = FALSE)
	{
		/*

		si slug eto yung makikita nyo sa url 
		
		example 
		bagumbonghs.com/student/10500057
		
		yung 10500057 yun an tinatawag na slug:)
		*/
		if($slug === FALSE)
		{
			
			//getting all the necessary information about the user accounts
			$query = $this->db->get('subject');
			return $query->result_array();
		}
			$query = $this->db->get_where('subject',array('subject_id' => $slug));
			if($query->num_rows == 0)
			{
				return show_404();
			}else{
			return $query->row_array();
			}
	}

	public function modify_subject_details($slug)
	{
	$subject_name = $this->security->xss_clean($this->input->post('subject_name'));

	$subject_info = array(
		'subject_name' => $subject_name
		);
	$this->db->where('subject_id',$slug);
	$this->db->update('subject',$subject_info);
	}

	public function set_section()
	{
	$section_name = $this->security->xss_clean($this->input->post('section_name'));
	$section_year_level = $this->security->xss_clean($this->input->post('section_year_level'));

	$section_info = array(
		'section_name' => $section_name,
		'section_year_level' => $section_year_level
		);

	$this->db->insert('section',$section_info);
	}

	public function get_section($slug = FALSE)
	{
		/*

		si slug eto yung makikita nyo sa url 
		
		example 
		bagumbonghs.com/student/10500057
		
		yung 10500057 yun an tinatawag na slug:)
		*/
		if($slug === FALSE)
		{
			
			//getting all the necessary information about the user accounts
			$query = $this->db->get('section');
			return $query->result_array();
		}
			$query = $this->db->get_where('section',array('section_id' => $slug));
			if($query->num_rows == 0)
			{
				return show_404();
			}else{
			return $query->row_array();
			}
	}

	public function modify_section_details($slug)
	{
	$section_name = $this->security->xss_clean($this->input->post('section_name'));
	$section_year_level = $this->security->xss_clean($this->input->post('section_year_level'));
	
	$section_info = array(
		'section_name' => $section_name,
		'section_year_level' => $section_year_level
		);
	$this->db->where('section_id',$slug);
	$this->db->update('section',$section_info);
	}


	public function set_announcements()
	{
	
	$announcements_title = $this->security->xss_clean($this->input->post('announcement_title'));
	$announcements_content = $this->security->xss_clean($this->input->post('announcement_content'));
	$announcements_posted_by	= $this->session->userdata('user_id');
	$announcements_info = array(
		'announcement_title' => $announcements_title,
		'announcement_content' => $announcements_content,
		'announcement_posted_by' => $announcements_posted_by
		);

	$this->db->insert('announcements',$announcements_info);
	}

	public function get_announcements($slug = FALSE)
	{
		/*

		si slug eto yung makikita nyo sa url 
		
		example 
		bagumbonghs.com/student/10500057
		
		yung 10500057 yun an tinatawag na slug:)
		*/
		if($slug === FALSE)
		{
			
			//getting all the necessary information about the user accounts
			$this->db->select('announcements.announcement_id,announcements.announcement_title,announcements.announcement_content,administrator.administrator_name');
			$this->db->from('announcements');
			$this->db->join('user_account','user_account.user_id = announcements.announcement_posted_by');
			$this->db->join('administrator','administrator.user_id = user_account.user_id');
			$query = $this->db->get();
			return $query->result_array();
		}
			$query = $this->db->get_where('announcements',array('announcement_id' => $slug));
			if($query->num_rows == 0)
			{
				return show_404();
			}else{
			return $query->row_array();
			}
	}

	public function modify_announcements_details($slug)
	{
	$announcements_title = $this->security->xss_clean($this->input->post('announcement_title'));
	$announcements_content = $this->security->xss_clean($this->input->post('announcement_content'));
	$announcements_posted_by	= $this->session->userdata('user_id');
	$announcements_info = array(
		'announcement_title' => $announcements_title,
		'announcement_content' => $announcements_content,
		'announcement_posted_by' => $announcements_posted_by
		);

	$this->db->where('announcement_id',$slug);
	$this->db->update('announcements',$announcements_info);
	}

	public function set_subject_in_class($section_details_id)
	{
		$subject_array =	(array) $this->security->xss_clean($this->input->post('subject'));
		$faculty_array =	(array) $this->security->xss_clean($this->input->post('faculty'));
		for($count = 0 ; $count < count($faculty_array) ; $count++)
		{
			$subject_details_array = array(
				'subject_id' => $subject_array[$count],
				'section_details_id' => $section_details_id,
				'faculty_id' => $faculty_array[$count],
				'subject_start' => '7:00AM',
				'subject_end' => '8:00AM',
				'room_number' => 'EB301'
				);
			$this->db->insert('subject_details',$subject_details_array);
		}

	}
	public function get_subject_in_class($slug = FALSE)
	{

		if($slug === FALSE)
		{
			$message = 'No subjects are available in this class';
			return $message;
		}
		/*
			Tables and Fields to be used
			table : subject
			1.subject_name

			table : faculty_profile
			1.faculty_fname
			2.faculty_mname
			3.faculty_lname

			table : subject_details
			1. subject_start
			2. subject_end
			3. room_number
		*/
		$this->db->select('subject.subject_name,fp.faculty_fname,fp.faculty_mname,fp.faculty_lname,SubDet.subject_start,SubDet.subject_end,SubDet.room_number');
		$this->db->from('subject_details SubDet');
		$this->db->join('subject','subject.subject_id = SubDet.subject_id');
		$this->db->join('faculty_profile fp','fp.faculty_id = SubDet.faculty_id');
		$this->db->where("SubDet.section_details_id",$slug);	
		$query = $this->db->get();
		return $query->result_array();
	}
	public function set_section_details()
	{
		$section_id = $this->security->xss_clean($this->input->post('section_name'));
		$school_year_level = $this->security->xss_clean($this->input->post('school_year_level'));
		$section_adviser = $this->security->xss_clean($this->input->post('section_adviser'));
		$section_details_array = array (
			'section_id' => $section_id,
			'faculty_id' => $section_adviser,
			'section_school_year' =>$school_year_level
			);
		$this->db->insert('section_details',$section_details_array);
		$this->set_subject_in_class($this->db->insert_id());
	}
	public function get_section_details($slug = FALSE)
	{
		/*

		si slug eto yung makikita nyo sa url 
		
		example 
		bagumbonghs.com/student/10500057
		
		yung 10500057 yun an tinatawag na slug:)
		*/
		if($slug === FALSE)
		{
			
			
			/*
			fields to be used 
			table : section_details
				1. section_details_id
				2.section_school_year
			table : section
				1. section_name
				2. section_year_level
			table : faculty_profile
				1.faculty_name

			*/
			$this->db->select('SecDet.section_details_id,SecDet.section_school_year,section.section_name,section.section_year_level,faculty_profile.faculty_fname,faculty_profile.faculty_lname');
			$this->db->from('section_details SecDet');
			$this->db->join('section','section.section_id = SecDet.section_id');
			$this->db->join('faculty_profile','faculty_profile.faculty_id = SecDet.faculty_id');
			$query = $this->db->get();
			return $query->result_array();
		}
			$this->db->select('SecDet.section_details_id,SecDet.section_school_year,section.section_name,section.section_year_level,faculty_profile.faculty_fname,faculty_profile.faculty_mname,faculty_profile.faculty_lname');
			$this->db->from('section_details SecDet');
			$this->db->join('section','section.section_id = SecDet.section_id');
			$this->db->join('faculty_profile','faculty_profile.faculty_id = SecDet.faculty_id');
			$this->db->where('SecDet.section_details_id',$slug);
			$query = $this->db->get();
			if($query->num_rows == 0)
			{
				return show_404();
			}else{
			return $query->row_array();
			}
	}

	public function get_student_in_class($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}
			$this->db->select('sp.student_id,
						sp.student_fname,
						sp.student_mname,
						sp.student_lname,
						SecDet.section_details_id');
			$this->db->from('section_details SecDet');
			$this->db->join('student_section StudSec','StudSec.section_details_id = SecDet.section_details_id');
			$this->db->join('student_profile sp','sp.student_id = StudSec.student_id');
			$this->db->where('SecDet.section_details_id',$slug);
			$query = $this->db->get();
			return $query->result_array();
			
		
	}

	public function set_student_in_class()
	{
		$student_number = $this->security->xss_clean($this->input->post('student_number'));
		$section_details_id = $this->security->xss_clean($this->input->post('section_details_id'));

		$student_in_class_config = array(
			'student_id' => $student_number,
			'section_details_id' => $section_details_id
			);

		$this->db->insert('student_section',$student_in_class_config);
	}
	public function get_section_school_year()
	{
		$this->db->select('section_details.section_school_year');
		$this->db->from('section_details');
		$this->db->group_by('section_details.section_school_year');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_grade_student($slug_class = FALSE , $slug_student = FALSE)
	{
		if($slug_class === FALSE && $slug_student === FALSE)
		{
			return show_404();
		}

		$this->db->select("sg.id,sg.subject_name,sg.subject_grade,sg.subject_quarter");
		$this->db->from('student_profile sp');
		$this->db->join('student_grades sg','sg.student_id = sp.student_id');
		$this->db->where('sg.student_id',$slug_student);
		$this->db->where('sg.section_details_id',$slug_class);
		$query = $this->db->get();
		return $query->result_array();

	}
	public function modify_grade_student($slug)
	{
		$subject_grade = $this->security->xss_clean($this->input->post('subject_grade'));
		$subject_grade_array = array(
			'subject_grade' => $subject_grade);
		$this->db->where('id',$slug);
		$this->db->update('student_grades',$subject_grade_array);

	}



/*

KUNG ANO ANONG FUNCTIONS DITO :)))

*/
	public function generate_student_id()
	{
	$year = date('Y');
	$randNum = ceil(rand(1000,999999)); 
	$seconds = ceil((date('s')+1)/2.1);
	$student_id = $year."".$randNum."".$seconds;
	return $student_id;
	}

	public function generate_faculty_id()
	{
	$year = date('Y');
	$month = date('m');
	$randNum = ceil(rand(0,1000)); 
	$seconds = ceil((date('s')+5)/2.1);
	$faculty_id = $year."".$month."".$randNum."".$seconds;
	return $faculty_id;
	}

	public function get_all_faculty()
	{
		$this->db->select("fp.faculty_id,fp.faculty_fname,fp.faculty_mname,fp.faculty_lname");
		$this->db->from("faculty_profile fp");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_all_subject()
	{
		$this->db->select("subject.subject_id,subject.subject_name");
		$this->db->from("subject");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function count_student_in_class($class_id)
	{
		$this->db->select('*');
		$this->db->from('student_section');
		$this->db->where('student_section.section_details_id',$class_id);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_faculty_class_admin($slug = FALSE)
	{
		
		
			$this->db->select('SecDet.section_details_id,SecDet.section_school_year,section.section_name,section.section_year_level,fp.faculty_fname,fp.faculty_mname,fp.faculty_lname');
			$this->db->from("faculty_profile fp");
			$this->db->join('section_details SecDet','SecDet.faculty_id = fp.faculty_id');
			$this->db->join('section','section.section_id = SecDet.section_id');
			$this->db->where('fp.faculty_id',$slug);
			$query = $this->db->get();
			if($query->num_rows == 0)
			{
				//return show_404();
			}
			return $query->result_array();
		
	}



}


?>