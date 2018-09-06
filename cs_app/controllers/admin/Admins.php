<?php 

class Admins extends CI_Controller {
	
	public $outputData;		
	 
	function __construct() 
	{
        parent::__construct();
    }
	
	function index()
	{
		if(!isAdmin())
			redirect('login');
			
		redirect_admin('admins/manageAdmins');	
	}
	
	/* Admins */
	function manageAdmins()
	{
		if(!isAdmin())
			redirect('login');
		
		$params = array('not_admin_type' => 'S');
		$this->outputData['admins']		= $this->admin_model->getAdmins($params);
		$this->outputData['main_content'] 	= 'admin/admins/manageAdmins';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	function addAdmin()
	{
		if(!isAdmin())
			redirect('login');

		if($this->input->post())
		{
				//Check the email already exists or not
				$condition=array(
					'email'	=> $this->input->post('email')
				);
			
				$check_email = $this->admin_model->checkAdminExists($condition);
						
				if($check_email > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Email Id already exists.'));
					redirect_admin('admins/addAdmin');
				}
				
				$email		= $this->input->post('email');
				$password	= md5($this->input->post('password'));
				$admin_key	= md5($password.$email).uniqid();
			
				$insert_data=array(
					'firstname' 		=> $this->input->post('firstname'),
					'lastname' 			=> $this->input->post('lastname'),
					'email' 			=> $email,
					'password' 			=> $password,
					'admin_key'			=> $admin_key,
					'phone'				=> $this->input->post('phone'),
					'address' 			=> $this->input->post('address'),
					//'role_id' 			=> $this->input->post('role_id'),
					'status' 		=> $this->input->post('status'),
					'created_at'		=> strtotime(date('Y-m-d H:i:s'))
				);

				$admin_id = $this->admin_model->insertAdmin($insert_data);
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Admin was added.'));
				redirect_admin('admins/editAdmin/'.$admin_id);
		}	
		
		//$this->outputData['roles'] 			= $this->roles_model->getRoles();
		
		$this->outputData['admins'] 		= $this->admin_model->getAdmins();
		$this->outputData['main_content'] 	= 'admin/admins/addAdmin';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function editAdmin($admin_id)
	{
		if(!isAdmin())
			redirect('login');
			
		if(empty($admin_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Admin.'));
			redirect_admin('admins/manageAdmins');	
		}
		
		//Check the admin already exists or not
		$condition=array(
			'admin_id'=> $admin_id
		);
		$check_admin = $this->admin_model->checkAdminExists($condition);
		if($check_admin == 0)
		{
			redirect('admin_access_denied');
		}	

		if($this->input->post())
		{
				//Check the Admin email already exists or not
				$condition=array(
					'admin_id != '	=> $admin_id,
					'email'	=> $this->input->post('email')
				);
			
				$check_email = $this->admin_model->checkAdminExists($condition);
						
				if($check_email > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Email Id already exists.'));
					redirect_admin('admins/editAdmin/'.$admin_id);
				}
				
			
				$update_data=array(
					'firstname' 	=> $this->input->post('firstname'),
					'lastname' 		=> $this->input->post('lastname'),
					'email'			=> $this->input->post('email'),
					'phone'			=> $this->input->post('phone'),
					'address' 		=> $this->input->post('address'),
					//'role_id' 		=> $this->input->post('role_id'),
					'status' 		=> $this->input->post('status')
				);
				
				if($this->input->post('password'))
				{
					$update_data['password'] = md5($this->input->post('password'));
				}
				
				$update_cond=array(
					'admin_id'	=>	$admin_id
				);
					
				$this->admin_model->updateAdmin($update_data,$update_cond);
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Your changes have been saved.'));
				redirect_admin('admins/editAdmin/'.$admin_id);
		}	
		
		//$this->outputData['roles'] 			= $this->roles_model->getRoles();
		
		$admin = $this->admin_model->getAdminById($admin_id);
		
		$this->outputData['admin']		= $admin; 
		$this->outputData['main_content'] 	= 'admin/admins/editAdmin';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function deleteAdmin($admin_id)
	{
		if(!isAdmin())
			redirect('login');
			
		//Check the admin already exists or not
		$condition=array(
			'admin_id'=> $admin_id
		);
		$check_admin = $this->admin_model->checkAdminExists($condition);
		if($check_admin == 0)
		{
			redirect('admin_access_denied');
		}	
			
		$condition = array(
			'admin_id'	=>	$admin_id
		);
		
		$this->admin_model->deleteAdmin($condition);
		$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Admin was deleted successfully.'));
		redirect_admin('admins/manageAdmins');
	}
	
	function checkAdminEmailExists()
	{
		
		$email 		= $this->input->get('email');
		$admin_id	= $this->input->get('admin_id');
		
		$params 	= array ('email' => $email);
		if(!empty($admin_id))
		{
			$params['not_admin_id'] = $admin_id;
		}
		
		$admin_result = $this->admin_model->getAdmins($params); 
		
		if($admin_result->num_rows() > 0)
			$data = array($_REQUEST['fieldId'],false,'Email ID Already Exists');
		else
			$data = array($_REQUEST['fieldId'],true);	
		
		echo json_encode($data);

	}
}


/* End of file admins.php */
/* Location: ./system/application/controllers/admin/admins.php */
?>