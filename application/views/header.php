<body>
	<header>
	<?php if($this->session->flashdata('warning')) : ?>
		<div class="message-container text-center warning">
			<p><?=$this->session->flashdata('warning');?></p>
		</div>
	<?php endif ?>
	<?php if($this->session->flashdata('message')) : ?>
		<div class="message-container text-center info">
			<p><?=$this->session->flashdata('message');?></p>
		</div>
	<?php endif ?>
		<div class="container">
			<ul class="pull-left">
				<li>
					<a href="<?=base_url();?>">
						<img class="logo" src="<?=base_url();?>custom/logo.svg" />
					</a>
				</li>
			</ul>
			<ul class="pull-right">
				<?php if(!$this->session->userdata('validated')) : ?>
				<li class="links">
					<a class="btn btn-primary" href="<?=base_url();?>login">
						<i class="material-icons icon">person</i>
						<span>Login</span>
					</a>
				</li>
				<?php endif ?>
					<?php if($this->session->userdata('validated')) : ?>
					<?php if($this->session->userdata('id_rolle') == 1) : ?>
					<li class="links">
						<a href="<?=base_url();?>profile/<?=$this->session->userdata('username');?>"
							 title="<?=ucwords($this->session->userdata('username'));?>">
							<img src="<?=base_url();?>custom/img/avatars/<?=$this->session->userdata('avatar'); ?>" />
						</a>
					</li>
					<?php endif ?>
				<li class="links">
					<a class="btn btn-primary" href="<?=base_url();?>logout">
						<i class="material-icons icon">power_settings_new</i>
						<span>Log out</span>
					</a>
				</li>
				<?php endif ?>
				<li class="links">
					<?php if(!$this->session->userdata('validated')) : ?>
					<a class="btn btn-raised btn-primary" href="<?=base_url() . 'login'; ?>" >
						<i class="material-icons icon">add</i>
						<span>New Card</span>
					</a>
					<?php else : ?>
						<?php if($this->session->userdata('id_rolle') == 1) : ?>
						<a class="btn btn-raised btn-primary" href="<?=base_url() . 'create'; ?>" >
							<i class="material-icons icon">add</i>
							<span>New Card</span>
						</a>
						<?php else : ?>
						<a class="btn btn-raised btn-primary" href="<?=base_url() . 'dashboard'; ?>" >
							<i class="material-icons icon">settings</i>
							<span>Dashboard</span>
						</a>
						<?php endif ?>
					<?php endif ?>
				</li>
				<li class="links">
					<a id="about-link" class="show" href="#">
						<i class="material-icons icon">info_outline</i>
					</a>
				</li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</header>
	<div class="modal" id="about" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							<i class="material-icons">close</i>
						</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">About</h4>
				</div>
				<div class="modal-body">
					<img src="<?=base_url();?>custom/img/masquetina.jpg" />
					<p>
						Hi!
					</p>
					<p>
						My name is Iva and I attend Web programming classes at ICT college Belgrade Serbia,
						spending my earthly time striving to become darned awesome Web developer, enduring through a number
						of challenges, often on the edge of sanity... But that's just local politics, if You
						know what I mean.
					</p>
					<p>
						This Web application is a student project, made out of sweat and tears,
						and some PHP, SQL, JavaScript, jQuery, HTML and CSS.
					</p>
					<div class="social">
						<ul>
							<li>
								<a href="https://dribbble.com/Masquetina" target="_blank">
									<i class="mdi mdi-dribbble"></i>
								</a>
							</li>
							<li>
								<a href="https://twitter.com/Masquetina" target="_blank">
									<i class="mdi mdi-twitter"></i>
								</a>
							</li>
						</ul>
					</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<script>
	$(document).ready(function() {
		$('#about-link').click(function() {
				$('#about').modal('show');
		});
	});
</script>
