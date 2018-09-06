<?php if($question_type == "RATING") { ?>

<div class="form_labels radio_style survey-question-option-container">
<?php foreach($options as $key => $option) { ?>
    <label>
    	<input class="survey-question-option" type="hidden" id="section_<?php echo $section_count; ?>_question_<?php echo $question_count; ?>_option_<?php echo $key; ?>" name="sections[<?php echo $section_count; ?>][questions][<?php echo $question_count; ?>][options][<?php echo $key; ?>]" value="<?php echo $option; ?>" />
        <h4 class="radio_btm"><?php echo $option; ?></h4>
    </label>
<?php } ?>
</div>

<?php } elseif($question_type == "RADIOBUTTONS") { ?>

<div class="form_labels checkbox_main survey-question-option-container">
                        
    <div class="form-group">
    	<?php foreach($options as $key => $option) { ?>
        <label>
            <input class="circle_left survey-question-option" type="text" id="section_<?php echo $section_count; ?>_question_<?php echo $question_count; ?>_option_<?php echo $key; ?>" name="sections[<?php echo $section_count; ?>][questions][<?php echo $question_count; ?>][options][<?php echo $key; ?>]" value="<?php echo $option; ?>" placeholder="Enter option">
        </label>
        <?php } ?>
    </div>

</div>

<?php } else { ?>

<div class="form_labels checkbox_main survey-question-option-container">
                        
    <div class="form-group">
    	<?php foreach($options as $key => $option) { ?>
        <label>
            <input class="checkbox_left survey-question-option" type="text" id="section_<?php echo $section_count; ?>_question_<?php echo $question_count; ?>_option_<?php echo $key; ?>" name="sections[<?php echo $section_count; ?>][questions][<?php echo $question_count; ?>][options][<?php echo $key; ?>]" value="<?php echo $option; ?>" placeholder="Enter option">
        </label>
        <?php } ?>
    </div>

</div>

<?php } ?>