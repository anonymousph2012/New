<?php
class Student extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->check_user_access();
		//$this->load->view('templates/header');
	}

	private function check_user_access()
	{
		if($this->session->userdata('type_of_user') != 'student')
		{
			redirect(base_url());
		}	
	}

	public function main()
	{
			$this->load->model('student_model');
			$data['announcement'] = $this->student_model->get_announcements();
			$this->load->view('portal/student/main',$data);
		
	}

	public function announcement($slug = NULL)
	{
		if($slug != NULL)
		{
			$this->load->model('student_model');
			$data['announcement'] = $this->student_model->get_announcements($slug);
			$this->load->view('portal/student/announcement',$data);
		}else{
			redirect(base_url('portal/student'));
		}
	}

	public function profile_settings($message = NULL)
	{
		$this->load->model('student_model');
		$data['student_profile'] = $this->student_model->get_student_details();
		$data['notif_message'] = $message;
		$this->load->view('portal/student/profile_settings',$data);
	}

	public function modify_profile()
	{
		$this->load->model('student_model');
		$this->student_model->change_profile_details();
		$message = '<div class="alert alert-success">
					  <i class="icon-ok-circle"></i>Update Success
					</div>';
		$this->profile_settings($message);
	}

	public function grades()
	{
		$this->load->model('student_model');
		$data['slug_express'] = $this->session->all_userdata();
		$data['section_details'] = $this->student_model->get_section_details($this->session->userdata('user_id'));
		//$data['list_of_student_year_level'] = $this->student_model->get_student_year_level($this->session->userdata('user_id'));
		$this->load->view('portal/student/grades',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	public function class_details($slug = NULL)
	{
		if($slug === NULL)
		{
			return show_404();
		}
		$this->load->model('student_model');
		$data['section_details'] = $this->student_model->get_section_details($slug);
		$data['student_grade'] = $this->student_model->get_grades($this->session->userdata('user_id'),$slug);
		$this->load->view('portal/student/class',$data);
	}
}


?>