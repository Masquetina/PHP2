<body>
	<header>
		<div class="container-fluid">
				<ul class="pull-left">
					<li class="links">
						<a class="" href="<?=base_url();?>">

						</a>
					</li>
				</ul>
				<ul class="pull-right">
					<?php if(!$this->session->userdata('validated')) : ?>
					<li class="links btn btn-primary">
						<a href="<?=base_url();?>index.php/login">
							<i class="material-icons icon">person</i>
							<span>Login</span>
						</a>
					</li>
					<?php endif ?>

					<?php if($this->session->userdata('validated')) : ?>
						<?php if($this->session->userdata('id_rolle') == 1) : ?>
						<li class="links">
							<a>
								<img src="<?=base_url();?>custom/img/avatars/<?=$this->session->userdata('id_user'); ?>.jpg" />
							</a>
						</li>
						<?php endif ?>
					<li class="links btn btn-primary">
						<a href="<?=base_url();?>index.php/login/logout/">
							<i class="material-icons icon">power_settings_new</i>
							<span>Log out</span>
						</a>
					</li>
					<?php endif ?>
					<li class="links btn btn-raised btn-primary">
						<?php if(!$this->session->userdata('validated')) : ?>
						<a href="<?=base_url() . 'index.php/login/'; ?>" >
							<i class="material-icons icon">add</i>
							<span>New Card</span>
						</a>
						<?php else : ?>
							<?php if($this->session->userdata('id_rolle') == 1) : ?>
							<a href="<?=base_url() . 'index.php/login/'; ?>" >
								<i class="material-icons icon">add</i>
								<span>New Card</span>
							</a>
							<?php else : ?>
							<a href="<?=base_url() . 'index.php/dashboard/'; ?>" >
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
