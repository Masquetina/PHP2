<div class="container">
	<div class="col-xs-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
		<?php if(!is_null($message)) echo $message;?>
		<div class="panel panel-default">
			<div class="panel-body">
				<?php
				$action = "index.php/login/login";
				$attributes = array(
					'class' => 'form-horizontal'
				);
				echo form_open($action, $attributes);
				echo form_fieldset('Login');
				?>

				<div class="form-group">
					<?php
					$label_text= 'Email';
					$id= 'inputEmail';
					$attributes = array(
						'class' => 'control-label'
					);
					echo form_label($label_text, $id, $attributes);
					?>

					<?php
					$data = array(
						'id'					=> 'inputEmail',
						'name'				=> 'email',
						'maxlength'   => '20',
						'size'        => '15',
						'class' 			=> 'form-control'
					);
					$value = $this->input->post('email');
					echo form_input($data, $value);
					?>
				</div>

				<div class="form-group">
					<?php
					$label_text= 'Password';
					$id= 'inputPassword';
					$attributes = array(
						'class' => 'control-label'
					);
					echo form_label($label_text, $id, $attributes);
					?>

					<?php
					$data = array(
						'id'					=> 'inputPassword',
						'name'				=> 'password',
						'maxlength'   => '20',
						'size'        => '15',
						'class' 			=> 'form-control'
					);
					$value = $this->input->post('password');
					echo form_password($data, $value);
					?>
				</div>

				<div class="form-group">
					<?php
					$data = 'reset';
					$value = 'Reset';
					$extra = array(
						'class' => 'btn btn-default'
					);
					echo form_reset($data, $value, $extra);

					$data = 'submit';
					$value = 'Submit';
					$extra = array(
						'class' => 'btn btn-primary'
					);
					echo form_submit($data, $value, $extra);
					?>
				</div>
				<?php
				echo form_fieldset_close();
				echo form_close();


				//form_button([$data = ''[, $content = ''[, $extra = '']]])
				//$js = 'onClick="some_function()"';
				?>
			</div>
		</div>
		<div class="text-muted">
			<p>Don't have an account?
				<a href="<?=base_url();?>signup">Sign up</a>
			</p>
		</div>
	</div>
</div>
