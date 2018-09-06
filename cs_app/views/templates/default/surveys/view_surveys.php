<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Post Content
					============================================= -->

            <div class="cruise_survey">

                <div class="row">

                    <div class="col-md-12">
                    <?php if($surveys->num_rows() > 0) { ?>
                        <div class="survey_main">
                        <?php foreach($surveys->result() as $survey) { ?>
                        	<a href="<?php echo site_url('surveys/'.$survey->survey_id); ?>">
                            <div class="survey_list col-md-4">
                                <h1><?php echo translate($survey->language_variable); ?></h1>
                                <div class="img_bg">
                                <?php if(!empty($survey->survey_image)) { ?>
                                    <img src="<?php echo image_url('surveys/'.$survey->voyage_id.'/'.$survey->survey_image); ?>" onerror="this.src='<?php echo image_url('no_images/item_no_image.png'); ?>';" /> 
                                 <?php } else { ?> 
                                 	<img src="<?php echo image_url('no_images/item_no_image.png'); ?>"  />
                                 <?php } ?>
                                 </div>
                            </div>
                            </a>
                        <?php } ?>

                            <p><?php echo translate('fill-out-our-survey'); ?></p>
                        </div>
                    <?php } else { ?>
                    	<div class="no_results">
                        <h2> <?php echo translate('no-surveys-found'); ?> </h2>
                      	</div>
                    <?php } ?>    
                    </div>
                </div>
            </div>
            <!-- .postcontent end -->
        </div>

    </div>

</section>