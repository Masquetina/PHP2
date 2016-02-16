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
	<script>
		$(document).ready(function(){
			$.material.init();
			$('input:text:visible:first')[0].focus();
			$(".form-control").focus(function() {
				$(this).val('');
			});
			$('.message-container').delay(3000).fadeOut(3000);
		});
	</script>
</body>
</html>
