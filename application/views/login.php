	<?php if(!is_null($message)) : ?>
		<div class="message-container text-center">
			<p><?=$message;?></p>
		</div>
	<?php endif ?>
<div class="line"></div>
<div class="container container-form">
	<div class="col-xs-12 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
		<div class="panel panel-default">
			<div class="panel-body text">
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
					$data = array(
						'id'					=> 'inputEmail',
						'name'				=> 'email',
						'maxlength'   => '20',
						'size'        => '15',
						'class' 			=> 'form-control'
					);
					$value = $this->input->post('email');
					echo form_input($data, $value);

					$label_text= 'Email';
					$id= 'inputEmail';
					$attributes = array(
						'class' => 'control-label'
					);
					echo form_label($label_text, $id, $attributes);
					?>
				</div>

				<div class="form-group">
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

					$label_text= 'Password';
					$id= 'inputPassword';
					$attributes = array(
						'class' => 'control-label'
					);
					echo form_label($label_text, $id, $attributes);
					?>
				</div>

				<div class="form-group">
					<?php
					$data = 'submit';
					$value = 'Submit';
					$extra = array(
						'class' => 'btn btn-primary btn-raised btn-block btn-lg'
					);
					echo form_submit($data, $value, $extra);
					?>
				</div>
				<?php
				echo form_fieldset_close();
				echo form_close();
				?>
			</div>
		</div>
		<div>
			<p class="text-muted text-center">Don't have an account?
				<a class="text-primary" href="<?=base_url();?>signup">Sign up</a>
			</p>
		</div>
		<a class="logo-form" href="<?=base_url();?>">
			<img src="<?=base_url();?>custom/logo.svg" />
		</a>
	</div>
</div>
<script type="text/javascript">

</script>
