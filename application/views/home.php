<div class="container">
	<?php if(isset($cards)) : foreach($cards as $card) : ?>
	<div class="col-xs-12 col-md-6 col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading" <?=$card->color; ?> >
				<div class="interactions-group">
					<a href="#" title="">
						<img class="interactions avatar" src="http://placehold.it/64/fff.png" />
					</a>
				</div>
				<img class="img" src="<?=base_url();?>custom/img/cards/<?=$card->img; ?>" />
				<small class="author"><?=$card->author; ?></small>
				<div class="info-block" <?=$card->color; ?> >
					<i class="material-icons icon">add</i>
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
		<ul class="info-bar text-muted">
			<li>
				<i class="material-icons link favorite">favorite</i>
				<small><?=$card->likes; ?></small>
			</li>
			<li>
				<i class="material-icons link">edit</i>
			</li>
			<li>
				<i class="material-icons link">delete</i>
			</li>
		</ul>
	</div>
	<?php endforeach ?>
	<?php endif ?>
</div>
