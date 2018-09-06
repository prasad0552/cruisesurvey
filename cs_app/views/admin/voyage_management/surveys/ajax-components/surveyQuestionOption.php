<?php if($question_type == "RATING") { ?>
    <label>
    	<input class="survey-question-option" type="hidden" id="section_<?php echo $section_count; ?>_question_<?php echo $question_count; ?>_option_<?php echo $option_count; ?>" name="sections[<?php echo $section_count; ?>][questions][<?php echo $question_count; ?>][options][<?php echo $option_count; ?>]" value="" />
        <h4 class="radio_btm"></h4>
    </label>
<?php } elseif($question_type == "RADIOBUTTONS") { ?>
        <label>
            <input class="circle_left survey-question-option" type="text" id="section_<?php echo $section_count; ?>_question_<?php echo $question_count; ?>_option_<?php echo $option_count; ?>" name="sections[<?php echo $section_count; ?>][questions][<?php echo $question_count; ?>][options][<?php echo $option_count; ?>]" value="" placeholder="Enter option">
        </label>
<?php } else { ?>
        <label>
            <input class="checkbox_left survey-question-option" type="text" id="section_<?php echo $section_count; ?>_question_<?php echo $question_count; ?>_option_<?php echo $option_count; ?>" name="sections[<?php echo $section_count; ?>][questions][<?php echo $question_count; ?>][options][<?php echo $option_count; ?>]" value="" placeholder="Enter option">
        </label>
<?php } ?>