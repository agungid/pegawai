<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="<?php echo $this->security->get_csrf_hash(); ?>">
    <link href="<?php echo base_url() ?>asset/img/icon.png" rel="icon" type="image/x-icon" />
    <title><?php echo isset($title)?$title:'Sistem Pendaftaran Wisuda Online'; ?></title>
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/dist/sweetalert.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/datables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/css/base/jquery.ui.all.css">
</head>
<body>
    <?php echo $header; ?>
    <div class="container">
        <?php echo $this->session->flashdata('pesan_public'); ?>
    </div>
    <div class="row" style="margin:10px; margin-bottom: 15px;">
        <?php echo $content; ?>
    </div>
    <?php echo $footer; ?>
    <script src="<?php echo base_url();?>asset/bootstrap/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>asset/bootstrap/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url();?>asset/bootstrap/js/ui/jquery.ui.core.js"></script>
    <script src="<?php echo base_url();?>asset/bootstrap/js/ui/jquery.ui.datepicker.js"></script>
    <script src="<?php echo base_url();?>asset/datables/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>asset/datables/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        base_url = '<?=base_url()?>';
        $(function() {
			$( "#datepicker" ).datepicker({
	                changeMonth: true,
	                dateFormat: 'yy-mm-dd',
	                changeYear: true
	              });

	                $( "#datepicker1" ).datepicker({
	                changeMonth: true,
	                dateFormat: 'yy-mm-dd',
	                changeYear: true
	                });

	                $( "#datepicker2" ).datepicker({
	                changeMonth: true,
	                dateFormat: 'yy-mm-dd',
	                changeYear: true
	                });
	                $( "#datepicker3" ).datepicker({
	                changeMonth: true,
	                dateFormat: 'yy-mm-dd',
	                changeYear: true
	                });

	                $( "#datepicker4" ).datepicker({
	                changeMonth: true,
	                dateFormat: 'yy-mm-dd',
	                changeYear: true
	                });
	                
	                $( "#datepicker5" ).datepicker({
	                changeMonth: true,
	                dateFormat: 'yy-mm-dd',
	                changeYear: true
	                });
	                
	                $( "#datepicker6" ).datepicker({
	                changeMonth: true,
	                dateFormat: 'yy-mm-dd',
	                changeYear: true
	                });
	                
	                $( "#datepicker7" ).datepicker({
	                changeMonth: true,
	                dateFormat: 'yy-mm-dd',
	                changeYear: true
	                });
		});
    </script>
    <script src="<?php echo base_url();?>asset/bootstrap/js/custom.js"></script>
</body>
</html>
