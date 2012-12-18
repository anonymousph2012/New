<?php
class Portal_login extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function validate_account()
	{
		//kukunin po natin ang user input at lilinisin to avoid SQL INJECTION!
		$username =  $this->security->xss_clean($this->input->post('username'));
		$password =  $this->security->xss_clean($this->input->post('password'));

		/*
		Note : kung mapapansin nyo eh hindi ako gumamit ng SQL..ginamit ko kasi ang Active Record Class
		ng Code Igniter :D..pero actually SQL yan behind that method :D
		*/

		$this->db->where('username',$username);
		$this->db->where('password',$password);

		//irrun na po natin ang query mga tropa 
		$query = $this->db->get('user_account');

		//check natin ngayon kung may nahanap mga idol! :D
		if($query->num_rows == 1)
		{
			
			/*
				kapag may nakita tayong result magsstore tayo ngayon ng session
				para san ba to si session ? :D

				this will check kung sino yung nag login? kung nakalogin ba sya? basta ganon
				HAHAHA!..
			*/
			$row = $query->row();
			//ilalagay natin sya sa array para astig dba?! :DD
			$data = array(
				'id' => $row->id,
				'user_id' => $row->user_id,
				'username' => $row->username,
				'password' => $row->password,
				'account_status' =>$row->account_status,
				'type_of_user' => $row->account_type
				);

			//ilalagay na natin sya sa session! :DD
			$this->session->set_userdata($data);
			return true;
		}
		//kapag wala syang nahanap dito sya pupunta :D 
		return false;
	}

	
}
?>