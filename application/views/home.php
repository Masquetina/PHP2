<div class="container">
	<?php if(isset($cards)) : foreach($cards as $card) : ?>
	<div class="col-sm-12 col-md-6 col-lg-6">
		<div class="panel panel-default">
			<div class="panel panel-default">
				<div class="panel-heading" <?=$card->color; ?> >
					<img class="quote-img" src="<?=base_url();?>custom/img/<?=$card->img; ?>" />
					<small><?=$card->author; ?></small>
				</div>
				<div class="panel-body" <?=$card->color; ?> >
					<h3 class="text-right">
						<cite>
							<?=$card->quote; ?>
						</cite>
					</h3>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach ?>
	<?php else : ?>

	<?php endif ?>
</div>
