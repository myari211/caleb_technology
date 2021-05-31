<!DOCTYPE html>
<html lang="en">
<head>
<title>Content Management System - <?php echo PROJECT_NAME;?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo IMAGES_BASE_URL; ?>/favicon.ico" rel="shortcut icon" type="image/x-icon" />

<!-- Bootstrap core CSS -->
<link href="<?php echo CSS_BASE_URL; ?>/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo CSS_BASE_URL; ?>/bootstrap-reset.min.css" rel="stylesheet">
<!--external css-->
<link href="<?php echo TOOLS_BASE_URL; ?>/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="<?php echo CSS_BASE_URL; ?>/table-responsive.min.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="<?php echo CSS_BASE_URL; ?>/style_backend.css" rel="stylesheet"> 
<link href="<?php echo CSS_BASE_URL; ?>/style-responsive.min.css" rel="stylesheet" />
<script src="<?php echo JS_BASE_URL; ?>/jquery-1.11.0.min.js"></script>
<script src="<?php echo JS_BASE_URL; ?>/jquery-ui.1.8.11.min.js"></script>

<!-- ckeditor and kcfinder -->
<script src="<?php echo TOOLS_BASE_URL; ?>/ckeditor/ckeditor.js"></script>
<script type="text/javascript">

function reset_value(field) {
	document.getElementById(field).value = '';
	$("."+field).html('');
}
</script>
<!-- end ckeditor and kcfinder -->
</head>