<?php 
$general_settings = getGeneralSettings();
$output_data = array('general_settings' => $general_settings);
?>

<?php $this->load->view(TEMPLATE_FOLDER.'/inserts/header',$output_data); ?>

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<?php $this->load->view(TEMPLATE_FOLDER.'/'.$main_content,$output_data); ?>

<?php 	$this->load->view(TEMPLATE_FOLDER.'/inserts/footer.php',$output_data); ?>