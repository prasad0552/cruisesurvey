<?php  
class Login extends CI_Controller {

	public $outputData;
	 
	function __construct() 
	{
        parent::__construct();
		//$this->load->model('admin/settings_model','settings_model',TRUE);
    }
	
	public function Login()
	{
		parent::Controller();
			
		//Get Config Details From Db
		$this->config->db_config_fetch();
		
		$this->outputData['login'] = 'TRUE';
		
	}
	
	public function index()
	{
		if(isAdmin())
			redirect_admin('home');

		if($this->input->post())
		{
			
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
				
			$conditions = array('email'=>$email,'password'=>$password,'status'=>'A');
				
			if($this->admin_auth_model->loginAsAdmin($conditions))
			{
				//Set Session For Admin
				$this->admin_auth_model->setAdminSession($conditions);
				redirect_admin('home');
			} 
			else
			{
				//Log in attempt failed
			  	$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Credentials!'));
			 	redirect_admin('login');
			}
		}
		
		//function to load the home page
		$this->load->view('admin/auth/login',$this->outputData);
		
	} //Function Index End
	
}
//Class Login End 

/* End of file login.php */
/* Location: ./system/application/controllers/admin/login.php */