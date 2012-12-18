<?php
class Administrator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->check_user_access();
		//$this->load->view('templates/header');
	}

	private function check_user_access()
	{
		if($this->session->userdata('type_of_user') != 'administrator')
		{
			redirect(base_url());
		}	
	}
	public function index()
	{
		
		$this->load->model('administrator_model');
		$data['announcements_info'] = $this->administrator_model->get_announcements();
		$this->load->view('portal/administrator/main',$data);
	}

	public function profile_settings($message = NULL)
	{
		$this->load->model('administrator_model');
		$data['admin_profile'] =  $this->administrator_model->get_admin_details();
		$data['notif_message'] = $message;
		$this->load->view('portal/administrator/profile_settings',$data);	
	}

	public function modify_profile()
	{
		$this->load->model('administrator_model');
		$this->administrator_model->change_profile_details();
		$message = '<div class="alert alert-success">
					  <i class="icon-ok-circle"></i>Update Success
					</div>';
		$this->profile_settings($message);
	}


	public function student($slug = NULL,$msg = NULL)
	{
		$this->load->model('administrator_model');
		$data['student_id'] = $this->administrator_model->generate_student_id();
		if($slug != NULL)
		{
			$data['student_profile'] = $this->administrator_model->get_student_details($slug);
			$data['student_section'] = $this->administrator_model->get_student_section($slug);
			$this->load->view('portal/administrator/view_student_details',$data);
		}else
			{
			$data['student_profile'] = $this->administrator_model->get_student_details();
			$data['msg'] = $msg;
			$this->load->view('portal/administrator/student',$data);
			}	
	}

	public function modify_student_details($slug)
	{
		$this->load->model('administrator_model');
		$this->administrator_model->modify_student_details($slug);
		$msg = '<div class="alert alert-block">Student ID '.$slug.' has been updated</div>';
		$this->student(NULL,$msg);
	}

	public function search_student_details()
	{
		$search_user_id = $this->input->post('student_id',TRUE);
		$this->student($search_user_id,NULL);
	}

	public function add_student()
	{
		$this->load->model('administrator_model');
		$this->administrator_model->set_student_details();
		redirect(base_url().'portal/administrator/user_account');
	}

	public function modify_student_grade($slug)
	{	
		$this->load->model('administrator_model');
		$this->administrator_model->modify_grade_student($slug);
		redirect($this->input->post('redirect'));
	}

	public function teacher($slug = NULL,$msg = NULL)
	{
		$this->load->model('administrator_model');
		$data['teacher_id'] = $this->administrator_model->generate_faculty_id();
		if($slug != NULL)
		{
			$data['class_information'] = $this->administrator_model->get_faculty_class_admin($slug);
			$data['faculty_profile'] = $this->administrator_model->get_teacher_details($slug);
			$this->load->view('portal/administrator/view_teacher_details',$data);
		}else
			{
			$data['faculty_profile'] = $this->administrator_model->get_teacher_details();
			$data['msg'] = $msg;
			$this->load->view('portal/administrator/teacher',$data);
			}	
	}

	public function modify_teacher_details($slug)
	{
		$this->load->model('administrator_model');
		$this->administrator_model->modify_teacher_details($slug);
		$msg = '<div class="alert alert-block">teacher ID '.$slug.' has been updated</div>';
		$this->teacher(NULL,$msg);
	}

	public function search_teacher_details()
	{
		$search_user_id = $this->input->post('teacher_id',TRUE);
		$this->teacher($search_user_id,NULL);
	}

	public function add_teacher()
	{
		$this->load->model('administrator_model');
		$this->administrator_model->set_faculty_details();
		redirect(base_url().'portal/administrator/user_account');
	}

	public function subject($slug = NULL,$msg = NULL)
	{
		$this->load->model('administrator_model');
		if($slug != NULL)
		{
			$data['subject_info'] = $this->administrator_model->get_subject($slug);
			$this->load->view('portal/administrator/view_subject_details',$data);
		}else
			{
			$data['subject_info'] = $this->administrator_model->get_subject();
			$data['msg'] = $msg;
			$this->load->view('portal/administrator/subject',$data);
			}	
	}

	public function add_subject()
	{
		$this->load->model('administrator_model');
		$this->administrator_model->set_subject();
		redirect(base_url().'portal/administrator/subject');
	}

	public function modify_subject_details($slug)
	{
		$this->load->model('administrator_model');
		$this->administrator_model->modify_subject_details($slug);
		$msg = '<div class="alert alert-block">Subject ID '.$slug.' has been updated</div>';
		$this->subject(NULL,$msg);
	}

	public function section($slug = NULL,$msg = NULL)
	{
		$this->load->model('administrator_model');
		if($slug != NULL)
		{
			$data['section_info'] = $this->administrator_model->get_section($slug);
			$this->load->view('portal/administrator/view_section_details',$data);
		}else
			{
			$data['section_info'] = $this->administrator_model->get_section();
			$data['msg'] = $msg;
			$this->load->view('portal/administrator/section',$data);
			}	
	}

	public function add_section()
	{
		$this->load->model('administrator_model');
		$this->administrator_model->set_section();
		redirect(base_url().'portal/administrator/section');
	}

	public function modify_section_details($slug)
	{
		$this->load->model('administrator_model');
		$this->administrator_model->modify_section_details($slug);
		$msg = '<div class="alert alert-block">Section ID '.$slug.' has been updated</div>';
		$this->section(NULL,$msg);
	}


	public function announcements($slug = NULL,$msg = NULL)
	{
		$this->load->model('administrator_model');
		if($slug != NULL)
		{
			$data['announcements_info'] = $this->administrator_model->get_announcements($slug);
			$this->load->view('portal/administrator/view_announcements_details',$data);
		}else
			{
			$data['announcements_info'] = $this->administrator_model->get_announcements();
			$data['msg'] = $msg;
			$this->load->view('portal/administrator/announcements',$data);
			}	
	}

	public function add_announcements()
	{
		$this->load->model('administrator_model');
		$this->administrator_model->set_announcements();
		redirect(base_url('portal/administrator/announcements'));
	}

	public function modify_announcements_details($slug)
	{
		$this->load->model('administrator_model');
		$this->administrator_model->modify_announcements_details($slug);
		$msg = '<div class="alert alert-block">Announcement ID '.$slug.' has been updated</div>';
		$this->announcements(NULL,$msg);
	}

	public function class_management($slug = NULL,$msg = NULL)
	{
		$this->load->model('administrator_model');
		if($slug != NULL)
		{	
			$data['student_information'] =  NULL;
			$data['class_information'] = $this->administrator_model->get_section_details($slug);
			$data['student_information'] = $this->administrator_model->get_student_in_class($slug);
			$data['subject_information'] = $this->administrator_model->get_subject_in_class($slug);
			$data['number_of_student'] = $this->administrator_model->count_student_in_class($slug);
			$this->load->view('portal/administrator/class',$data);
		}else
			{
			$data['class_information'] = $this->administrator_model->get_section_details();
			$data['section_school_year'] = $this->administrator_model->get_section_school_year();
			$data['get_all_faculty'] = $this->administrator_model->get_all_faculty();
			$data['get_all_subject'] = $this->administrator_model->get_all_subject();
			$data['section_info'] = $this->administrator_model->get_section();
			$data['msg'] = $msg;
			$this->load->view('portal/administrator/class_management',$data);
			}	
	}

	public function add_class()
	{
		$this->load->model('administrator_model');
		$this->administrator_model->set_section_details();
		$msg = '<div class="alert alert-block">A new section  has been added</div>';
		$this->class_management(NULL,$msg);
	}

	public function student_in_class($slug_class = NULL,$slug_student = NULL,$msg = NULL)
	{
		//-----------------------------------------
		$slugss = array($slug_class,$slug_student);
		$data['slug_express'] = $slugss;
		//-----------------------------------------

		$this->load->model('administrator_model');
		$data['msg'] = $msg;
		$data['student_grade'] = $this->administrator_model->get_grade_student($slug_class,$slug_student);
		$this->load->view('portal/administrator/student_in_class',$data);
	}

	public function add_student_in_class()
	{
		$this->load->model('administrator_model');
		$this->administrator_model->set_student_in_class();
		redirect(base_url($this->input->post('redirect_url')));
	}






	/*

	USER ACCOUNT

	*/
	public function user_account($slug = NULL,$msg = NULL)
	{
		$this->load->model('user_account');
		if($slug != NULL)
		{
			$data['account_user'] = $this->user_account->get_user_account($slug);
			$this->load->view('portal/administrator/view_user_account',$data);
		}else
			{
			$data['account_user'] = $this->user_account->get_user_account();
			$data['msg'] = $msg;
			$this->load->view('portal/administrator/user_account',$data);
			}	
	}

	public function modify_user_account($slug)
	{
		$this->load->model('user_account');
		$this->user_account->modify_user_account($slug);
		$msg = '<div class="alert alert-block">User Account Updated</div>';
		$this->user_account(NULL,$msg);
	}

	public function search_user_account()
	{
		$search_user_id = $this->input->post('user_id',TRUE);
		$this->user_account($search_user_id,NULL);
	}

	public function enable_account($slug)
	{
		$this->load->model('user_account');
		$this->user_account->modify_enable_account($slug);
		$msg = '<div class="alert alert-info">User ID '.$slug.' has been enabled</div>';
		$this->user_account(NULL,$msg);
	}

	public function disable_account($slug)
	{
		$this->load->model('user_account');
		$this->user_account->modify_disable_account($slug);
		$msg = '<div class="alert alert-block">User ID'.$slug.' has been disabled</div>';
		$this->user_account(NULL,$msg);
	}

	/*

	USER ACCOUNT

	*/
	

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
?>