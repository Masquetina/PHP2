<div class="container">
	<div class="col-xs-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
		<?php if(!is_null($message)) echo $message;?>
		<div class="panel panel-default">
			<div class="panel-body">
				<?php
				$form = array(
					'class' => 'form-horizontal'
				);
				echo form_open('index.php/account/login', $form);
				echo form_fieldset('Login');
				?>
				<div class="form-group">
					<?php
					$attributes = array(
						'class' => 'control-label',
					);
					echo form_label('Email', 'inputEmail', $attributes);
					?>
					<?php
					$email = array(
						'id'					=> 'inputEmail',
						'name'				=> 'email',
						'maxlength'   => '20',
						'size'        => '15',
						'value' 			=> $this->input->post('email'),
						'class' 			=> 'form-control'
					);
					echo form_input($email);
					?>
				</div>
				<div class="form-group">
					<?php
					$attributes = array(
						'class' => 'control-label',
					);
					echo form_label('Password', 'inputPassword', $attributes);
					?>
					<?php
					$password = array(
						'id'					=> 'inputPassword',
						'name'				=> 'password',
						'maxlength'   => '20',
						'size'        => '15',
						'value' 			=> $this->input->post('password'),
						'class' 			=> 'form-control'
					);
					echo form_password($password);
					?>
					</div>
					<div class="form-group">
						<?php
						$reset = array(
							'name' => '',
							'value' => 'true',
							'type' => 'reset',
							'content' => 'Reset',
							'class' => 'btn btn-default'
						);
						echo form_button($reset);
						$submit = array(
							'name'  => '',
							'value' => 'Login',
							'class' => 'btn btn-primary'
						);
						echo form_submit($submit);
						?>
					</div>
					<?php
					echo form_fieldset_close();
					echo form_close();
					?>
				</div>
			</div>
			<div class="text-muted">
				<p>Don't have an account?
					<a href="<?=base_url();?>account/signup">Sign up</a>
				</p>
			</div>
		</div>
	</div>
