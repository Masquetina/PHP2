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
				</ul>
		</div>
		<div class="clearfix"></div>
	</header>
