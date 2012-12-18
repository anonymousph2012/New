<?php
class Change_password extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function modify_admin_profile()
	{
		$this->load->model('administrator_model');
		$this->administrator_model->change_profile_details();
		redirect('http://localhost/bagumbonghs/portal/administrator/profile_settings');
	}
}
?>