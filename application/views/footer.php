	<footer class="">
		<div class="container">
			<div class="panel-body">
				<p class="text-center text-warning"></p>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="<?=base_url();?>vendor/js/bootstrap.js"></script>
	<script>
		$(document).ready(function(){
			$(".info-block").click(function() {
				$(this).toggleClass("active");
			});

			$('input:text:visible:first')[0].focus();
			
			$(".form-control").focus(function() {
				$(this).val('').toggleClass("active");
			});
		});
	</script>
</body>
</html>
