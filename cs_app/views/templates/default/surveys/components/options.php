<!-- options start -->        
<?php if($question['question_type'] == "RATING" || $question['question_type'] == "RADIOBUTTONS") { ?>

<!-- Single Choice question options -->
<div class="main_option">
    <?php if(isset($question['options']) && count($question['options']) > 0) { foreach($question['options'] as $option_id => $option) { ?>
    <?php if($option == "other") { ?>
    <div class="alignleft option_blocks">
            <input id="radio-<?php echo $option_id; ?>" class="radio-style" name="sections[<?php echo $section_id; ?>][<?php echo $question_id; ?>][option_id]" type="radio" value="<?php echo $option_id; ?>" <?php echo (isset($survey_single_choice_results[$section_id][$question_id]) && $survey_single_choice_results[$section_id][$question_id]['option_id'] == $option_id)?"checked":""; ?>>
            <label for="radio-<?php echo $option_id; ?>" class="radio-style-2-label"><?php echo translate($option); ?></label>
    </div>
    <div class="sub_check">
        <textarea class="required sm-form-control" id="template-contactform-message" name="sections[<?php echo $section_id; ?>][<?php echo $question_id; ?>][other_value]" rows="3" cols="10" aria-required="true" placeholder="<?php echo translate('other-please-specify-here'); ?>"><?php echo (isset($survey_single_choice_results[$section_id][$question_id]['other_value']))?$survey_single_choice_results[$section_id][$question_id]['other_value']:""; ?></textarea>
    </div>
    <?php } else { ?>
    <div class="alignleft option_blocks">
        <input id="radio-<?php echo $option_id; ?>" class="radio-style" name="sections[<?php echo $section_id; ?>][<?php echo $question_id; ?>][option_id]" type="radio" value="<?php echo $option_id; ?>" <?php echo (isset($survey_single_choice_results[$section_id][$question_id]) && $survey_single_choice_results[$section_id][$question_id]['option_id'] == $option_id)?"checked":""; ?> >
        <label for="radio-<?php echo $option_id; ?>" class="radio-style-2-label"><?php echo translate($option); ?></label>
    </div>
    <?php } ?>
    <?php } } ?>
</div>

<?php } elseif($question['question_type'] == "CHECKBOXES") { ?>

<!-- Multiple Choice question options -->
<div class="main_option">
    <div class="checkbox_blk">
    <?php if(isset($question['options']) && count($question['options']) > 0) { foreach($question['options'] as $option_id => $option) { ?>
    <?php if($option == "other") { ?>
    <div class="alignleft">
            <input id="checkbox-<?php echo $option_id; ?>" class="checkbox-style" name="sections[<?php echo $section_id; ?>][<?php echo $question_id; ?>][option_ids][]" type="checkbox" value="<?php echo $option_id; ?>" <?php echo (isset($survey_multiple_choice_results[$section_id][$question_id]) && in_array($option_id,$survey_multiple_choice_results[$section_id][$question_id]['option_ids']))?"checked":""; ?>>
            <label for="checkbox-<?php echo $option_id; ?>" class="checkbox-style-3-label"><?php echo translate($option); ?></label>
    </div>
    <div class="sub_check">
        <textarea class="required sm-form-control" id="template-contactform-message" name="sections[<?php echo $section_id; ?>][<?php echo $question_id; ?>][other_value]" rows="3" cols="10" aria-required="true" placeholder="<?php echo translate('other-please-specify-here'); ?>"><?php echo (isset($survey_multiple_choice_results[$section_id][$question_id]['other_value']))?$survey_multiple_choice_results[$section_id][$question_id]['other_value']:""; ?></textarea>
    </div>    
    <?php } else { ?>    
        <div class="alignleft">
            <input id="checkbox-<?php echo $option_id; ?>" class="checkbox-style" name="sections[<?php echo $section_id; ?>][<?php echo $question_id; ?>][option_ids][]" type="checkbox" value="<?php echo $option_id; ?>" <?php echo (isset($survey_multiple_choice_results[$section_id][$question_id]) && in_array($option_id,$survey_multiple_choice_results[$section_id][$question_id]['option_ids']))?"checked":""; ?>>
            <label for="checkbox-<?php echo $option_id; ?>" class="checkbox-style-3-label"><?php echo translate($option); ?></label>
        </div>
     <?php } ?>
     <?php } } ?>   
    </div>
</div>	

<?php } ?>
<!--options end-->