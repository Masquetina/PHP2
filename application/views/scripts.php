	<script>
		$(document).ready(function() {
			$('.message-container').delay(3000).fadeOut(1,
				function() {
					$(this).remove();
				});

			$(".info-block").click(function() {
				$(this).toggleClass('active');
			});

			$('input:text:visible:first')[0].focus();
			$('.form-control').focus(function() {
				$(this).val('').toggleClass('active');
			});
		});
	</script>
</body>
</html>
