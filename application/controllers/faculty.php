<?php
class Faculty extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->check_user_access();
		$this->check_account_status();
		//$this->load->view('templates/header');
	}

	private function check_user_access()
	{
		if($this->session->userdata('type_of_user') != 'faculty')
		{
			redirect('http://bagumbonghighschool.com');
		}	
	}
	private function check_account_status()
	{
		if($this->session->userdata('account_status') == 'disable')
				{
					$data['error_message'] =  '<font color=red>Your Account is Disabled.Please contact the Webmaster for further assistance</font><br />';
					redirect(base_url().'/login');
				}
	}
	public function index()
	{
		
		$this->load->model('student_model');
		$data['announcement'] = $this->student_model->get_announcements();
		$this->load->view('portal/faculty/main',$data);
	}

	public function announcement($slug = NULL)
	{
		if($slug != NULL)
		{
			$this->load->model('student_model');
			$data['announcement'] = $this->student_model->get_announcements($slug);
			$this->load->view('portal/faculty/announcement',$data);
		}else{
			redirect(base_url('portal/faculty'));
		}
	}

	public function profile_settings($message = NULL)
	{
		$this->load->model('faculty_model');
		$data['faculty_profile'] = $this->faculty_model->get_faculty_details();
		$data['notif_message'] = $message;
		$this->load->view('portal/faculty/profile_settings',$data);
	}

	public function modify_profile()
	{
		$this->load->model('faculty_model');
		$this->faculty_model->change_profile_details();
		$message = '<div class="alert alert-success">
					  <i class="icon-ok-circle"></i>Update Success
					</div>';
		$this->profile_settings($message);
	}


	public function my_class($slug = NULL)
	{
		if($slug == NULL)
		{
		$this->load->model('faculty_model');
		$data['faculty_class'] = $this->faculty_model->get_faculty_class();
		$this->load->view('portal/faculty/class_list',$data);
		}else
			{
			$this->load->model('faculty_model');
			$data['class_information'] = $this->faculty_model->get_faculty_class($slug);
			$data['student_list'] =  $this->faculty_model->get_student_list($slug);
			$data['subject_list'] = $this->faculty_model->get_subject_list($slug);
			$data['number_of_student'] = $this->faculty_model->count_student_in_class($slug);
			$this->load->view('portal/faculty/my_class',$data);
			}
	}

	public function student_in_class($slug1 = NULL,$slug2 =  NULL)
	{
		$this->load->model('faculty_model');
		$data['subject_list'] = $this->faculty_model->get_subject_list($slug1,$slug2);
		$this->load->view('portal/faculty/student_in_class',$data);
	}

	public function add_grade($slug = NULL)
	{
		if($slug == NULL)
		{
			//return show_404();
		}
		$this->load->model('faculty_model');
		$this->faculty_model->add_grade($slug);
		redirect($this->input->post('redirect'));
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
?>