<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$page_title;?></title>
	<link href="<?=base_url();?>vendor/css/bootstrap.css" type="text/css" rel="stylesheet">
	<link href="<?=base_url();?>vendor/css/material.css" type="text/css" rel="stylesheet">
	<link href="<?=base_url();?>vendor/css/ripples.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div id="container">
		<h1>Home</h1>
		<button type="submit" class="btn btn-raised btn-primary">Link</button>

		<script type="text/javascript" src="<?=base_url();?>vendor/js/jquery.js"></script>
		<script type="text/javascript" src="<?=base_url();?>vendor/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?=base_url();?>vendor/js/arrive.js"></script>
		<script type="text/javascript" src="<?=base_url();?>vendor/js/material.js"></script>
		<script type="text/javascript" src="<?=base_url();?>vendor/js/ripples.js"></script>
		<script>
			// Initialise Material Design for Bottstrap
			$(document).ready(function(){
				$.material.init();
			});
		</script>
</body>
</html>
