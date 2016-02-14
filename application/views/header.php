<body>
	<header>
		<div class="container">
				<ul class="pull-left">
					<li class="links">
						<a class="" href="<?=base_url();?>">

						</a>
					</li>
				</ul>
				<ul class="pull-right">
					<?php if(!$this->session->userdata('validated')) : ?>
					<li class="links btn btn-primary">
						<a href="<?=base_url();?>index.php/account">Login</a>
					</li>
					<?php endif ?>
					<?php if($this->session->userdata('validated')) : ?>
					<li class="links dropdown">
						<span class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?=base_url();?>custom/img/avatars/<?=$this->session->userdata('avatar'); ?>" />
						</span>
						<ul class="dropdown-menu">
							<li>
								<a href="#">My Profile</a>
							</li>
							<li>
								<a href="#">Settings</a>
							</li>
							<li>
								<a href="<?=base_url();?>index.php/account/logout/">Log out</a>
							</li>
						</ul>
					</li>
					<?php endif ?>
					<li class="links btn btn-raised btn-primary">
						<a href="<?=base_url();?>index.php/quote/create">New Card</a>
					</li>
				</ul>
		</div>
	</header>
	<div class="clearfix"></div>
