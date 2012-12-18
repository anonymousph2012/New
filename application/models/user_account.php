<?php
class User_account extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_user_account($slug = FALSE)
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
			$query = $this->db->get('user_account');
			return $query->result_array();
		}
			$query = $this->db->get_where('user_account',array('user_id' => $slug));
			if($query->num_rows == 0)
			{
				return show_404();
			}else{
			return $query->row_array();
			}
	}

	public function modify_user_account($slug)
	{
		$account_username  =  $this->security->xss_clean($this->input->post('account_username'));
		$account_password =  $this->security->xss_clean($this->input->post('account_password'));
		$user_account_profile = array(
			'username' => $account_username,
			'password' => $account_password
			);
		$this->db->where('user_id',$slug);
		$this->db->update('user_account',$user_account_profile);
	}

	
	public function modify_enable_account($slug)
	{
		$user_status = array(
			'account_status' => 'enable');
		$this->db->where('user_id',$slug);
		$this->db->update('user_account',$user_status);
	}

	public function modify_disable_account($slug)
	{
		$user_status = array(
			'account_status' => 'disable');
		$this->db->where('user_id',$slug);
		$this->db->update('user_account',$user_status);
	}



}

?>