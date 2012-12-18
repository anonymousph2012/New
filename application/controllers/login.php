<?php
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index($error_message = NULL)
	{
		/*
		the $error parameter serves as an error message 
		if there's no error it is null HEHEHE
		*/
		$data['error_message'] = $error_message;
		$this->load->view('login/main',$data);
	}

	public function process()
	{
		//this will load our AWWEESOMEEE model 
		$this->load->model('portal_login');
		//validate  logiiin! :DDDD 
		$result = $this->portal_login->validate_account();
		//verify our awesssommee result
		if(!$result)
		{
			/*
			if the user account did not *tengene hirap magenglish* 
			basta ganeto pag may error eto yung gagawin nia 
			eto si $error_message ibibgay kay index(); go to line 9
			makikita nyo si $error_message,As default,naka NULL sya 
			kasi wala pa namang error..okay?! :DDD 
			*/
			$error_msg = '<font color=red>Invalid username and/or password.</font><br />';
			$this->index($error_msg);
			
		}else{
			if($this->session->userdata('type_of_user') == 'administrator')
			{
				if($this->session->userdata('account_status') == 'disable')
				{
					$error_msg =  '<font color=red>Your Account is Disabled.Please contact the Webmaster for further assistance</font><br />';
					$this->index($error_msg);
				}else
					{
				redirect('portal/administrator');
					}
			}else if($this->session->userdata('type_of_user') == 'faculty')
			{
				if($this->session->userdata('account_status') == 'disable')
				{
					$error_msg =  '<font color=red>Your Account is Disabled.Please contact the Webmaster for further assistance</font><br />';
					$this->index($error_msg);
				}else
					{
				redirect('portal/faculty');
					}
			}else if($this->session->userdata('type_of_user') == 'student')
			{
				if($this->session->userdata('account_status') == 'disable')
				{
					$error_msg =  '<font color=red>Your Account is Disabled.Please contact the Webmaster for further assistance</font><br />';
					$this->index($error_msg);
				}else
				{
				redirect('portal/student');
				}
			}
			else
			{
				redirect(base_url('login'));
			}
		}
	}

	
	
}

?>