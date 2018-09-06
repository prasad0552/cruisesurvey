<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Post Content
					============================================= -->

            <div class="exit_survey">
                <button class="confirm" onclick="exitSurvey();"><?php echo translate('exit-survey'); ?><i class="i-plain icon-switch"></i></button>
            </div>
			
            <?php if(count($all_questions) > 0) { ?>
            <form class="" method="post" >
            <div class="cruise_blocks">

                <div class="row">
                    <!-- Sections -->
                    <?php $section_count = 1; foreach($all_questions['sections'] as $section_id => $section) { ?>
                    <div class="col-md-12 cruise_form">
                        <h4><span><?php echo $section_count; ?></span><?php echo translate($section['language_variable']); ?></h4>
                        
                        <?php $outputData= array('section_id' => $section_id, 'section' => $section); 
							  $this->load->view(TEMPLATE_FOLDER.'/surveys/components/questions',$outputData); 
						?>

						<!-- Section Comment -->
                        <div class="form-group textarea_ocean">
                            <label for="message"><?php echo translate('comments-regarding'); ?> <?php echo translate($section['language_variable']); ?></label>
                            <textarea type="text" name="comments[<?php echo $section_id; ?>]" rows="5" class="form-control required" placeholder="<?php echo translate('enter-your-message'); ?>"><?php echo (isset($survey_comments[$section_id]['comment']))?$survey_comments[$section_id]['comment']:""; ?></textarea>
                        </div>
                    </div>
                    <?php $section_count++; } ?>
                </div>
                
            </div>
            
            <div class="bottom_btns">
            	<ul>
                    <li>
                        <input type="submit" name="save" class="btn btn-block btn-primary" value="<?php echo translate('save-survey'); ?>">
                    </li>
                     <li>
                        <input type="button" id="quit-survey" name="quit"  class="btn btn-block btn-primary" data-href="<?php echo site_url('surveys/quit_survey/'.$survey->survey_id); ?>" onclick="quitSurvey();" value="<?php echo translate('quit-survey'); ?>">
                    </li>     
                    <li>
                        <input type="submit" name="finish" class="btn btn-block btn-primary" value="<?php echo translate('finish-survey'); ?>">
                    </li>
                </ul>
            </div>
            </form>
            <!-- .postcontent end -->
            <?php } else { ?>
            	<div class="no_results">
                <h2> <?php echo translate('no-questions-found'); ?> </h2>
                </div>
            <?php } ?>
        </div>

    </div>

</section>

<script type="text/javascript">
function exitSurvey()
{
	msg = '<?php echo translate('are-you-sure-want-to-exit-survey'); ?>';
	Lobibox.confirm({
		title: "<?php echo translate('confirm'); ?>",									
		msg: msg,
		buttons: {
			ok: {
				'class': 'lobibox-btn lobibox-btn-default',
				text: '<?php echo translate('yes'); ?>',
				closeOnClick: true
			},
			cancel: {
				'class': 'lobibox-btn lobibox-btn-cancel',
				text: '<?php echo translate('no'); ?>',
				closeOnClick: true
			}
		},
		callback: function ($this, type, ev) {
		if(type == "ok")
		{
			window.location="<?php echo site_url('surveys'); ?>";
		}
		}
	});		
}

function quitSurvey()
{
	msg = '<?php echo translate('are-you-sure-want-to-quit-survey'); ?>';
	Lobibox.confirm({
		title: "<?php echo translate('confirm'); ?>",									
		msg: msg,
		buttons: {
			ok: {
				'class': 'lobibox-btn lobibox-btn-default',
				text: '<?php echo translate('yes'); ?>',
				closeOnClick: true
			},
			cancel: {
				'class': 'lobibox-btn lobibox-btn-cancel',
				text: '<?php echo translate('no'); ?>',
				closeOnClick: true
			}
		},
		callback: function ($this, type, ev) {
		if(type == "ok")
		{
			var url = $("#quit-survey").attr('data-href');
			window.location= url;
		}
		}
	});		
}
</script>