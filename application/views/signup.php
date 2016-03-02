
<div class="line"></div>
<div class="container container-form">
	<div class="col-xs-12 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
		<a class="logo-form" href="<?=base_url();?>">
			<img src="<?=base_url();?>custom/logo.svg" />
		</a>
		<div class="panel panel-default">
			<div class="panel-body text">
				<?php
				$action = "signup";
				$attributes = array(
					'class' => 'form-horizontal'
				);
				echo form_open($action, $attributes);
				echo form_fieldset('Create Account');
				?>

				<div class="form-group">
					<?php
					$data = array(
						'id'				=> 'inputUsername',
						'name'			=> 'username',
						'maxlength'	=> '20',
						'size'      => '15',
						'class' 		=> 'form-control'
					);
					$value = $this->input->post('Username');
					echo form_input($data, $value);

					$label_text= 'Username';
					$id= 'inputUsername';
					$attributes = array(
						'class' => 'control-label, text-primary'
					);
					echo form_label($label_text, $id, $attributes);
					?>
				</div>

				<div class="form-group">
					<?php
					$data = array(
						'id'				=> 'inputEmail',
						'name'			=> 'email',
						'maxlength' => '20',
						'size'      => '15',
						'class' 		=> 'form-control'
					);
					$value = $this->input->post('email');
					echo form_input($data, $value);

					$label_text= 'Email';
					$id= 'inputEmail';
					$attributes = array(
						'class' => 'control-label, text-primary'
					);
					echo form_label($label_text, $id, $attributes);
					?>
				</div>

				<div class="form-group">
					<?php
					$data = array(
						'id'				=> 'inputPassword',
						'name'			=> 'password',
						'maxlength' => '20',
						'size'      => '15',
						'class' 		=> 'form-control'
					);
					$value = $this->input->post('password');
					echo form_password($data, $value);

					$label_text= 'Password';
					$id= 'inputPassword';
					$attributes = array(
						'class' => 'control-label, text-primary'
					);
					echo form_label($label_text, $id, $attributes);
					?>
				</div>

				<div class="form-group">
					<?php
					$data = array(
						'id'				=> 'repeatPassword',
						'name'			=> 'repeatPassword',
						'maxlength' => '20',
						'size'      => '15',
						'class' 		=> 'form-control'
					);
					$value = $this->input->post('repeatPassword');
					echo form_password($data, $value);

					$label_text= 'Repeat password';
					$id= 'repeatPassword';
					$attributes = array(
						'class' => 'control-label, text-primary'
					);
					echo form_label($label_text, $id, $attributes);
					?>
				</div>

				<div class="form-group">
					<?php
					$data = 'submit';
					$value = 'Create Account';
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
		<div class="text-center">
			<small class="text-muted">By clicking Create Account, I agree to the
				<a id="ToS-link" class="text-primary" href="#" data-toggle="modal" data-target="ToS"> Terms of Service</a>
			</small>
		</div>
		<div class="text-center">
			<small class="text-muted">Already have an account?
				<a class="text-primary" href="<?=base_url();?>login">Login</a>
			</small>
		</div>
	</div>
</div>
<div class="modal fade" id="ToS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						<i class="material-icons">close</i>
					</span>
				</button>
        <h4 class="modal-title" id="myModalLabel">Terms of Service</h4>
      </div>
      <div class="modal-body">
        <p>
					...
        </p>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
	$('#ToS-link').click(function() {
			$('#ToS').modal('show');
	});
});
</script>
