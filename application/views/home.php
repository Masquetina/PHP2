<div class="cover"></div>
<div class="container">
	<div class="">
		<h2 class="text-center">Quotation Cards</h2>
	</div>
	<?php if(isset($cards)) : foreach($cards as $card) : ?>
	<div class="col-xs-12 col-md-6 col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading" <?=$card->color; ?> >
				<div class="interactions-group">
					<a href="#" title="">
						<img class="interactions avatar" src="<?=base_url();?>custom/img/avatars/<?=$card->id_user; ?>.jpg" />
					</a>
				</div>
				<img class="img" src="<?=base_url();?>custom/img/cards/<?=$card->img; ?>" />
				<small class="author"><?=$card->author; ?></small>
				<div class="info-block" <?=$card->color; ?> >
					<i class="material-icons icon">expand_more</i>
					<div class="text">
						<p class="text-left"><?=$card->info; ?></p>
					</div>
				</div>
			</div>
			<div class="panel-body" <?=$card->color; ?> >
				<h2 class="text-right">
					<i class="material-icons quotations">format_quote</i>
					<?=$card->quote; ?>
				</h2>
			</div>
		</div>
		<ul class="info-bar">
			<li>
				<i class="material-icons link favorite"
				<?php if($this->session->userdata('validated')) : ?>
					<?php if(($card->id_user) == $this->session->userdata('id_user')) {
						echo 'style = "color: #ba68c8"';
					} ?>
					<?php endif ?> >favorite</i>
				<small><?=$card->likes; ?></small>
			</li>
			<?php if($this->session->userdata('validated')) : ?>
				<?php if($this->session->userdata('id_user') != ($card->id_user)) : ?>
					<li>
						<a href="#">
							<i class="material-icons link">flag</i>
						</a>
					</li>
				<?php endif ?>
			<?php endif ?>
		</ul>
	</div>
	<?php endforeach ?>
	<?php endif ?>
</div>
