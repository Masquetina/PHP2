	<footer class="">
		<div class="container">
			<div class="panel-body">
				<p class="text-center"></p>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="<?=base_url();?>vendor/js/jquery.js"></script>
	<script type="text/javascript" src="<?=base_url();?>vendor/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?=base_url();?>vendor/js/arrive.js"></script>
	<script type="text/javascript" src="<?=base_url();?>vendor/js/material.js"></script>
	<script type="text/javascript" src="<?=base_url();?>vendor/js/ripples.js"></script>
	<script>
		$(document).ready(function(){
			$.material.init();
			$(function() {
				$(".info-block").click(function() {
					$(this).toggleClass("active");
				});
			});
		});
	</script>
</body>
</html>
