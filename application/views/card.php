<div class="container">
	<div class="col-xs-12 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
		<div class="panel panel-default">
			<div class="panel-body text">
				<?php
				$action = "create";
				$attributes = array(
					'class' => 'form-horizontal card',
				);
				echo form_open_multipart($action, $attributes);
				echo form_fieldset('Create Card');
				?>

				<div class="form-group">
					<?php
					$data = array(
						'id'				=> 'inputAuthor',
						'name'			=> 'author',
						'maxlength'	=> '20',
						'size'      => '15',
						'class' 		=> 'form-control'
					);
					$value = $this->input->post('author');
					echo form_input($data, $value);

					$label_text= 'Author';
					$id = 'inputAuthor';
					$attributes = array(
						'class' => 'text-primary'
					);
					echo form_label($label_text, $id, $attributes);
					?>
				</div>

				<div class="form-group">
					<?php
					$data = array(
						'id'				=> 'inputQuote',
						'name'			=> 'quote',
						'maxlength' => '70',
						'cols'      => '20',
						'rows'			=> '2',
						'class' 		=> 'form-control'
					);
					$value = $this->input->post('quote');
					echo form_textarea($data, $value);

					$label_text= 'Quote';
					$id = 'inputQuote';
					$attributes = array(
						'class' => 'text-primary'
					);
					echo form_label($label_text, $id, $attributes);
					?>
				</div>


				<div class="form-group">
					<?php
					$data = array(
						'id'				=> 'inputDescription',
						'name'			=> 'quote',
						'maxlength' => '70',
						'cols'      => '20',
						'rows'			=> '2',
						'class' 		=> 'form-control'
					);
					$value = $this->input->post('description');
					echo form_textarea($data, $value);

					$label_text= 'Description';
					$id = 'inputDescription';
					$attributes = array(
						'class' => 'text-primary'
					);
					echo form_label($label_text, $id, $attributes);
					?>
				</div>

				<div class="form-group">
					<?php
					$atributes = array(
						'id'				=> 'File',
						'name'			=> 'upload-card',
						'class' 		=> 'form-control'
					);
					 echo form_upload($atributes);

					$label_text= 'Quote image';
 					$id = 'File';
 					$attributes = array(
 						'class' => 'text-primary btn btn-primary btn-raised'
 					);
 					echo form_label($label_text, $id, $attributes);
					?>
				</div>


				<div class="form-group">
					<?php
					$data = array(
        		'name'          => 'color',
						'id'            => 'red',
        		'value'         => '#f00',
        		'checked'       => FALSE,
					);
					echo form_radio($data);

					$label_text= '';
					$id = 'red';
					$attributes = array(
						'class' => ''
					);
					echo form_label($label_text, $id, $attributes);
					?>

					<?php
					$data = array(
        		'name'          => 'color',
						'id'            => 'green',
        		'value'         => '#0f0',
        		'checked'       => FALSE,
					);
					echo form_radio($data);
					?>

					<?php
					$data = array(
        		'name'          => 'color',
        		'id'            => 'blue',
        		'value'         => '#00f',
        		'checked'       => FALSE,
					);
					echo form_radio($data);
					?>
				</div>

				<div class="form-group">
					<?php
					$data = 'submit';
					$value = 'Create Card';
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
	</div>
</div>
