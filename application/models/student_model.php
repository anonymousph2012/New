<?php
class Student_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_student_details()
	{
		$user_id  = $this->session->userdata('user_id');
		$this->db->select('student_profile.student_fname,
							student_profile.student_mname,
							student_profile.student_lname,
							student_profile.student_address,
							student_profile.student_contactno,
							student_profile.student_bday,
							student_profile.student_age,
							student_profile.student_nationality,
							student_profile.student_religion,
							student_profile.student_guardian_name,
							student_profile.student_guardian_contactno,
							student_profile.student_guardian_relationship,
							user_account.username,
							user_account.password');
		$this->db->from('user_account');
		$this->db->join('student_profile','student_profile.student_id = user_account.user_id');
		$this->db->where('user_account.user_id',$user_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function change_profile_details()
	{
		//ETO YUNG MGA DATA NA IUUPDATE NATIN MGA SIR :) 
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
		//eto naman para madetermine kung kanino iuupdate ;) 
		$user_id = $this->session->userdata('user_id');

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

		$this->db->where('student_id',$user_id);
		$this->db->update('student_profile',$student_profile);
		/*
		 eto naman para sa user account kasi may dalawa tayong tables dba
		 isa sa profile nung account isa naman dun sa mismong account :))))) YOLOS
		*/
		$user_account = array(
			'username' => $student_username,
			'password' => $student_password
			);
		$this->db->where('user_id',$user_id);
		$this->db->update('user_account',$user_account);
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
			//getting all the necessary information about the user accounts
			$this->db->select('announcements.announcement_id,announcements.announcement_title,announcements.announcement_content,administrator.administrator_name');
			$this->db->from('announcements');
			$this->db->join('user_account','user_account.user_id = announcements.announcement_posted_by');
			$this->db->join('administrator','administrator.user_id = user_account.user_id');
			$this->db->where('announcement_id',$slug);
			$query = $this->db->get();
			if($query->num_rows == 0)
			{
				return show_404();
			}else{
			return $query->row_array();
			}
	}

	public function get_grades($user_id = FALSE,$class_slug = FALSE)
	{
		if($user_id === FALSE || $class_slug === FALSE)
		{
			return show_404();
		}
		$this->db->select("section.section_year_level,sg.id,sg.subject_name,sg.subject_grade,sg.subject_quarter");
		$this->db->from('student_profile sp');
		$this->db->join('student_grades sg','sg.student_id = sp.student_id');
		$this->db->join('section_details SecDet','SecDet.section_details_id = sg.section_details_id');
		$this->db->join('section','section.section_id = SecDet.section_id');
		$this->db->where('sg.student_id',$user_id);
		$this->db->where('sg.section_details_id',$class_slug);
		$this->db->order_by('SecDet.section_school_year','asc');
		$query = $this->db->get();
		return $query->result_array();
	}	

	public function get_student_year_level($user_id = FALSE)
	{
		$this->db->select("section.section_year_level,section.section_name,SecDet.section_school_year");
		$this->db->from('section');
		$this->db->join('section_details SecDet','SecDet.section_id = section.section_id');
		$this->db->join('student_section StudSec','StudSec.section_details_id = SecDet.section_details_id');
		$this->db->where('StudSec.student_id' , $user_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	

	public  function get_section_details($user_id = FALSE)
	{
			$this->db->select('SecDet.section_details_id,SecDet.section_school_year,section.section_name,section.section_year_level,faculty_profile.faculty_fname,faculty_profile.faculty_mname,faculty_profile.faculty_lname');
			$this->db->from('student_section StudSec');
			$this->db->join('section_details SecDet','SecDet.section_details_id = StudSec.section_details_id ');
			$this->db->join('section','section.section_id = SecDet.section_id');
			$this->db->join('faculty_profile','faculty_profile.faculty_id = SecDet.faculty_id');
			$this->db->where('StudSec.student_id',$user_id);
			$query= $this->db->get();
			return $query->result_array();
	}
}
?>