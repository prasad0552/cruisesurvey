<?php 

class Settings extends CI_Controller {
	
	public $outputData;		
	 
	function __construct() 
	{
        parent::__construct();
    }
	
	function index()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		redirect_admin('settings/general');	
	}
	
	//General
	function general()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		if($this->input->post())
		{
			
				//Code to upload logo
				if($this->input->post('cruise_logo_alternate_text') != "")
				{
					$uploading_file_name = url_title(convert_accented_characters(strip_tags(trim($this->input->post('cruise_logo_alternate_text')))), 'dash', true);
				}
				else
				{
					$uploading_file_name = url_title(convert_accented_characters(strip_tags(trim($this->input->post('cruise_name')))), 'dash', true);
				}
									
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['upload_path'] 	= 'images/logo/';
				$config['file_name']	= $uploading_file_name;
				
				if (!is_dir($config['upload_path'])) {
						mkdir($config['upload_path'], 0777, TRUE);
				}
				
				$this->upload->initialize($config);
				if(!empty($_FILES['cruise_logo']['name']))
				{
					if($this->upload->do_upload('cruise_logo'))
					{
						if($this->input->post('uploaded_cruise_logo'))
						{
							unlink(FCPATH. 'images/logo/'.$this->input->post('uploaded_cruise_logo'));
						}
						$image = $this->upload->data('file_name');
					}
				}
				else
				{
					$image= $this->input->post('uploaded_cruise_logo');
				}
				
				//Code to upload fav icon					
				$config['allowed_types'] = 'ico';
				$config['upload_path'] 	= 'images/fav_icon/';
				$config['encrypt_name']	= TRUE;
				
				if (!is_dir($config['upload_path'])) {
						mkdir($config['upload_path'], 0777, TRUE);
				}
				
				$this->upload->initialize($config);
				if(!empty($_FILES['fav_icon']['name']))
				{
					if($this->upload->do_upload('fav_icon'))
					{
						$fav_icon = $this->upload->data('file_name');
					}
				}
				else
				{
					$fav_icon= $this->input->post('uploaded_fav_icon');;
				}
					
				$update_data=array(
					'cruise_name' 		=> $this->input->post('cruise_name'),
					'cruise_code' 		=> $this->input->post('cruise_code'),
					'cruise_logo' 		=> $image,
					'cruise_logo_alternate_text' => $this->input->post('crise_logo_alternate_text'),
					'fav_icon' 	=> $fav_icon,
					'is_survey_editable' => ($this->input->post('is_survey_editable'))?$this->input->post('is_survey_editable'):"N",
					'active_voyage_id' => $this->input->post('active_voyage_id'),
					'guest_password_scheme' => $this->input->post('guest_password_scheme'),
					'site_offline' 		=> ($this->input->post('site_offline'))?$this->input->post('site_offline'):"N",
					'cruise_admin_email' => $this->input->post('cruise_admin_email')
				);
			
				$update_cond=array(
					'setting_id'	=>	1
				);
					
				$this->settings_model->updateGeneral($update_data,$update_cond);
				
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Your changes have been saved.'));
			redirect_admin('settings/general');
		}			
		
		$params = array('setting_id' => 1);	
		$this->outputData['general']			= $this->settings_model->getGeneral($params)->row();
		$this->outputData['main_content'] 		= 'admin/settings/general';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function ajaxDeleteLogo()
	{
		$file_to_remove	= $this->input->post('file_to_remove');
		
		$data['status'] = "ERROR";
		if(!empty($file_to_remove))
		{
			unlink(FCPATH. 'images/logo/'.$file_to_remove);
			
			$update_data=array(
					'cruise_logo' => "",
					'cruise_logo_alternate_text' => ""
			);
								
			$update_cond=array(
					'setting_id'	=>	1
			);
					
			$this->settings_model->updateGeneral($update_data,$update_cond);
			$data['status'] = "SUCCESS";
		}
		
		echo json_encode($data);
		exit;
	}
	
	function ajaxDeleteFavicon()
	{
		$file_to_remove	= $this->input->post('file_to_remove');
		
		$data['status'] = "ERROR";
		if(!empty($file_to_remove))
		{
			unlink(FCPATH. 'images/fav_icon/'.$file_to_remove);
			
			$update_data=array(
					'fav_icon' => "",
			);
								
			$update_cond=array(
					'setting_id'	=>	1
			);
					
			$this->settings_model->updateGeneral($update_data,$update_cond);
			$data['status'] = "SUCCESS";
		}
		
		echo json_encode($data);
		exit;
	}
}


/* End of file settings.php */
/* Location: ./system/application/controllers/company/settings.php */
?>