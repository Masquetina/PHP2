<div id="login">
	<?php
		echo form_open('index.php/login/validate');
		echo form_input('email', 'email@example.com');
		echo form_password('password', 'test');
		echo form_submit('submit', 'Login');
	?>
</div>
