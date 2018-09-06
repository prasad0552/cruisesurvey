<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2018-2020 <a href="http://www.samolasystems.com/">Samola Systems</a>.</strong> All rights reserved.
      </footer>



    </div><!-- ./wrapper -->
    
    <?php $uri1= $this->uri->segment(1); $uri2 = $this->uri->segment(2); $uri3 = $this->uri->segment(3); ?>

    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo admin_assets_url(); ?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo admin_assets_url(); ?>/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo admin_assets_url(); ?>/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo admin_assets_url(); ?>/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo admin_assets_url(); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo admin_assets_url(); ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo admin_assets_url(); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?php echo admin_assets_url(); ?>/plugins/chartjs/Chart.min.js"></script>
    
    <?php if($uri2 == "home" && empty($uri3)) { ?>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo admin_assets_url(); ?>/dist/js/pages/dashboard2.js"></script>
    <?php } ?>
    
    <script>
		var base_url 		= "<?php echo base_url(); ?>";
		var admin_url 		= "<?php echo admin_url(); ?>";
	</script>
    
    <!-- DataTables -->
    <script src="<?php echo admin_assets_url(); ?>/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo admin_assets_url(); ?>/plugins/datatables/media/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo admin_assets_url(); ?>/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		var oTable =  $('.data-table-responsive').DataTable({
			 responsive: true,
			 stateSave: true
		});
		
	});	
	</script>
    
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo admin_assets_url(); ?>/dist/js/demo.js"></script>
    
    <!-- Jquery confirm -->
    <script src="<?php echo admin_assets_url(); ?>/plugins/confirm/jquery.confirm.js"></script>
    
    <!-- Tiny MCE Editor -->
    <script src="<?php echo common_assets_url(); ?>/tinymce/tinymce.min.js"></script>
    
    <!-- Dropify -->
    <script src="<?php echo common_assets_url(); ?>/dropify/js/dropify.min.js"></script>
    
    <!-- jQuery Form Validation -->
	<script src="<?php echo common_assets_url(); ?>/formValidator/jquery.validationEngine.js?v=1"></script>
	<script src="<?php echo common_assets_url(); ?>/formValidator/languages/jquery.validationEngine-en.js?v=1"></script>
    
    <!-- Lobibox -->
	<script src="<?php echo common_assets_url(); ?>/lobibox/js/lobibox.min.js"></script>
    <script src="<?php echo common_assets_url(); ?>/lobibox/js/messageboxes.min.js"></script>
    <script src="<?php echo common_assets_url(); ?>/lobibox/js/notifications.min.js"></script>
        
    <script>
		$(document).ready(function(){
			
			<!-- Hide Notifications -->
			setTimeout(function(){
  				$('.callout').slideUp();
			}, 8000);
			
			$('.callout').click(function(){
				$('.callout').slideUp();
			});
			
			<!-- form validation -->
			$('form').validationEngine();
			
			$(document).on('click', '.formErrorContent', function(){ 
				$(this).parents('.formError').remove();
			}); 
			
			<!-- confirm -->
			$(".confirm").confirm();
			
			$('.paginate_button').on("click",function() {
				$(".confirm").confirm();
			});
			
			<!-- Data tables -->
			$('.data-table').DataTable();
			
		});
	</script>
    
    <!-- Tiny MCE Editor -->
    <script type="text/javascript">
		tinymce.init({
			selector: ".cleditor",
			relative_urls : false,
			remove_script_host : false,
			plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste responsivefilemanager"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | responsivefilemanager",
			external_filemanager_path:"<?php echo site_url(); ?>assets/common/tinymce-filemanager/filemanager/",
			filemanager_title:"Filemanager" ,
			external_plugins: { "filemanager" : "<?php echo base_url(); ?>assets/common/tinymce-filemanager/filemanager/plugin.min.js"}
			});
	</script>
    
    <!-- Browse Button Dropify -->
	<script type="text/javascript">
    $(document).ready(function() {
        $('.dropify').dropify();
    });
    </script>
    
    <script type="text/javascript">
		$(document).ajaxStop(function(event) {
  			$('#ajax_spinner').remove();
		});
	</script>

  </body>
</html>
