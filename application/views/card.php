<div class="message"></div>
<div class="content">
	<div class="container">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<div class="panel panel-default">
				<div class="panel-body text">
					<?php
					$action = "create/card";
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
							'name'			=> 'description',
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

					<div class="form-group radio-group">
						<?php
						$data = array(
							'name'    => 'color',
							'id'      => 'brown',
							'value'   => '#3e2723',
							'checked' => FALSE,
						);
						echo form_radio($data);

						$label_text= '';
						$id = 'brown';
						$attributes = array(
							'class' => 'brown'
						);
						echo form_label($label_text, $id, $attributes);
						?>

						<?php
						$data = array(
							'name'    => 'color',
							'id'      => 'pink',
							'value'   => '#880e4f',
							'checked' => FALSE,
						);
						echo form_radio($data);

						$label_text= '';
						$id = 'pink';
						$attributes = array(
							'class' => 'pink'
						);
						echo form_label($label_text, $id, $attributes);
						?>

						<?php
						$data = array(
							'name'    => 'color',
							'id'      => 'yellow',
							'value'   => '#',
							'checked' => FALSE,
						);
						echo form_radio($data);

						$label_text= '';
						$id = 'yellow';
						$attributes = array(
							'class' => 'yellow'
						);
						echo form_label($label_text, $id, $attributes);
						?>

						<?php
						$data = array(
							'name'    => 'color',
							'id'      => 'green',
							'value'   => '#827717',
							'checked' => FALSE,
						);
						echo form_radio($data);

						$label_text= '';
						$id = 'green';
						$attributes = array(
							'class' => 'green'
						);
						echo form_label($label_text, $id, $attributes);
						?>

						<?php
						$data = array(
							'name'    => 'color',
							'id'      => 'blue',
							'value'   => '#263238',
							'checked' => FALSE,
						);
						echo form_radio($data);

						$label_text= '';
						$id = 'blue';
						$attributes = array(
							'class' => 'blue'
						);
						echo form_label($label_text, $id, $attributes);
						$value = $this->input->post('color');
						?>
					</div>

					<div class="form-group">
						<?php
						$atributes = array(
							'id'		=> 'File',
							'name'	=> 'userfile',
						);
						echo form_upload($atributes);

						$label_text= 'Image';
						$id = 'File';
						$attributes = array(
							'class' => 'text-primary btn btn-primary btn-raised'
						);
						echo form_label($label_text, $id, $attributes);
						?>
						<span id="file-name" class="text-primary">No file selected</span>
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
</div>
<script>
	$(document).ready(function() {
		$('input:text:visible:first')[0].focus();
		$('.form-control').focus(function() {
			$(this).val('').toggleClass('active');
		});
		var type;
		$(':file').change(function() {
			var file = this.files[0];
			var name = file.name;
			var size = file.size;
			type		 = file.type;
			$('#file-name').html(name);
		});
		$(':submit').click(function() {
			var author = $('#inputAuthor').val();
			var quote = $('#inputQuote').val();
			var description = $('#inputDescription').val();
			var color = $('input[name="color"]:checked').val();
			var image = $('#file-name').html();
			if(	(author == '') |
					(quote == '') |
					(description == '')
			) {
				$('.message')
				.show()
				.html('<div class="message-container text-center warning">' +
								'<p>Please, fill all the text fields!</p>' +
							'</div>')
				.delay(3000)
			  .fadeOut(1);
				return false;
			}
			if(!color) {
				$('.message')
				.show()
				.html('<div class="message-container text-center warning">' +
								'<p>Please, choose a color!</p>' +
							'</div>')
				.delay(3000)
			  .fadeOut(1);
				return false;
			}
			if(	(image == 'No file selected') |
					(type != 'image/jpeg')
				) {
					$('.message')
					.show()
					.html('<div class="message-container text-center warning">' +
									'<p>Please, choose a JPG file!</p>' +
								'</div>')
					.delay(3000)
				  .fadeOut(1);
					return false;
			} else {
				return true;
			}
		});
	});
</script>
