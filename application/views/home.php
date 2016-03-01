<div class="cover">
  <div class="container">
    <h1 class="text-center">QuoteApp</h1>
		<h3 class="text-center">Side text to tell something</h3>
		<?php if(!$this->session->userdata('validated')) : ?>
		<a class="call-to-action btn btn-raised btn-primary" href="<?=base_url() . 'signup'; ?>" >
			<span>Join Us Now</span>
		</a>
		<?php endif ?>
  </div>
</div>
<div class="container">
	<h2 class="text-center">Quote Cards</h2>
	<?php if(isset($cards)) : foreach($cards as $card) : ?>
		<div class="col-xs-12 col-md-6 col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading" <?=$card->color;?> >
					<div class="interactions-group">
						<a href="<?=base_url();?>profile/<?=$card->username;?>"
							 title="<?=ucwords($card->username);?>">
							<img class="interactions avatar" src="<?=base_url();?>custom/img/avatars/<?=$card->avatar;?>" />
						</a>
					</div>
					<img class="img" src="<?=base_url();?>custom/img/cards/<?=$card->img;?>" />
					<small class="author"><?=$card->author;?></small>
					<div class="info-block" <?=$card->color;?> >
						<i class="material-icons icon">expand_more</i>
						<div class="text">
							<p class="text-left"><?=$card->info;?></p>
						</div>
					</div>
				</div>
				<div class="panel-body" <?=$card->color;?> >
					<h2 class="text-right">
						<i class="material-icons quotations">format_quote</i>
						<?=$card->quote;?>
					</h2>
				</div>
			</div>
			<ul class="info-bar">
				<li>
					<i class="material-icons link favorite">favorite</i>
					<small><?=$card->likes;?></small>
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
