<!-- Questions Start -->
<?php if(isset($section['questions']) && count($section['questions']) > 0) { foreach($section['questions'] as $question_id => $question) { ?>
<div class="radio_btns">
	<div class="fields_blk">
		<h5><?php echo translate($question['language_variable']); ?></h5>
        
        <input type="hidden" name="sections[<?php echo $section_id; ?>][<?php echo $question_id; ?>][question_type]" value="<?php echo $question['question_type']; ?>" />
		
         <?php $outputData= array('section_id' => $section_id, 'question_id' => $question_id, 'question' => $question); 
				$this->load->view(TEMPLATE_FOLDER.'/surveys/components/options',$outputData); 
		?>
	</div>
</div>
<?php } } ?>
<!-- Questions End -->