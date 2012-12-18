<?php
class Faculty_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_faculty_details()
	{
		$user_id  = $this->session->userdata('user_id');
		$this->db->select('faculty_profile.faculty_fname,
							faculty_profile.faculty_mname,
							faculty_profile.faculty_lname,
							faculty_profile.faculty_address,
							faculty_profile.faculty_contactno,
							faculty_profile.faculty_bday,
							faculty_profile.faculty_age,
							faculty_profile.faculty_nationality,
							faculty_profile.faculty_religion,
							user_account.username,
							user_account.password');
		$this->db->from('user_account');
		$this->db->join('faculty_profile','faculty_profile.faculty_id = user_account.user_id');
		$this->db->where('user_account.user_id',$user_id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function change_profile_details()
	{
		//ETO YUNG MGA DATA NA IUUPDATE NATIN MGA SIR :) 
		$teacher_username = $this->security->xss_clean($this->input->post('teacher_username'));
		$teacher_password = $this->security->xss_clean($this->input->post('teacher_password'));
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

		$this->db->where('faculty_id',$user_id);
		$this->db->update('faculty_profile',$teacher_profile);
		/*
		 eto naman para sa user account kasi may dalawa tayong tables dba
		 isa sa profile nung account isa naman dun sa mismong account :))))) YOLOS
		*/
		$user_account = array(
			'username' => $teacher_username,
			'password' => $teacher_password
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

	public function get_faculty_class($slug = FALSE)
	{
		if($slug === FALSE)
		{
			$this->db->select('SecDet.section_details_id,SecDet.section_school_year,section.section_name,section.section_year_level,fp.faculty_fname,fp.faculty_mname,fp.faculty_lname');
			$this->db->from("faculty_profile fp");
			$this->db->join('section_details SecDet','SecDet.faculty_id = fp.faculty_id');
			$this->db->join('section','section.section_id = SecDet.section_id');
			$this->db->where('fp.faculty_id',$this->session->userdata('user_id'));
			$query = $this->db->get();
			if($query->num_rows == 0)
			{
				//return show_404();
			}
			return $query->result_array();
		}
			$this->db->select('SecDet.section_details_id,SecDet.section_school_year,section.section_name,section.section_year_level,fp.faculty_fname,fp.faculty_mname,fp.faculty_lname');
			$this->db->from("faculty_profile fp");
			$this->db->join('section_details SecDet','SecDet.faculty_id = fp.faculty_id');
			$this->db->join('section','section.section_id = SecDet.section_id');
			$this->db->where('fp.faculty_id',$this->session->userdata('user_id'));
			$this->db->where('SecDet.section_details_id',$slug);
			$query = $this->db->get();
			if($query->num_rows == 0)
			{
				return show_404();
			}
			return $query->row_array();

	}	

	public function get_student_list($slug1 = FALSE)
	{
		if($slug1 === FALSE)
		{
			return show_404();
		}
		$this->db->select("*");
		$this->db->from("student_profile sp");
		$this->db->join('student_section StudSec','StudSec.student_id = sp.student_id');
		$this->db->where('StudSec.section_details_id',$slug1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_subject_list($class_id = FALSE,$student_id = FALSE)
	{
		if($class_id === FALSE)
		{
			return show_404();
		}
		$this->db->select('subject.subject_id,subject.subject_name,SubDet.subject_start,SubDet.subject_end,SubDet.room_number');
		$this->db->from("subject_details SubDet");
		$this->db->join('section_details SecDet','SecDet.section_details_id = SubDet.section_details_id');
		$this->db->join('student_section StudSec','StudSec.section_details_id = SecDet.section_details_id');
		$this->db->join('subject','subject.subject_id = SubDet.subject_id');
		$this->db->where('SubDet.section_details_id',$class_id);
		$this->db->where('SecDet.faculty_id',$this->session->userdata('user_id'));
		//$this->db->where('StudSec.student_id',$student_id);
		$query = $this->db->get();
		if($query->num_rows() == 0)
		{
			return show_404();
		}
		return $query->result_array();
	}

	public function count_student_in_class($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}
		$this->db->select('*');
		$this->db->from('student_section');
		$this->db->where('student_section.section_details_id',$slug);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function add_grade($slug = FALSE)
	{
		if($slug === FALSE)
		{
			//return show_404();
		}
		$section_details_id = $this->security->xss_clean($this->input->post('section_details'));
		$subject_name = $this->security->xss_clean($this->input->post('subject_name'));
		$subject_grade = $this->security->xss_clean($this->input->post('subject_grade'));
		$grade_quarter = $this->security->xss_clean($this->input->post('grade_quarter'));

		$grade_info_array = array(
			'section_details_id' =>$section_details_id,
			'student_id' => $slug,
			'subject_name' => $subject_name,
			'subject_grade' => $subject_grade,
			'subject_quarter' => $grade_quarter
			);

		$this->db->insert('student_grades',$grade_info_array);
	}

	
}
?>