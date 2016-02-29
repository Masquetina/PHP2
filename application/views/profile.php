<div class="cover">
  <div class="container">
    <div class="multipart text-center">
    <?php if($this->session->userdata('id_user') == $user->id_user) : ?>
      <?=form_hidden('username', $user->username);?>
      <img src="<?=base_url();?>custom/img/avatars/<?=$user->avatar;?>" />
      <span class="upload">

      </span>
      <?php
      $attributes = array(
        'title' => 'Clickk to change'
      );
      echo form_upload('userfile', $attributes);
      ?>
  	<?php endif ?>
    </div>
    <h2 class="text-center"><?=ucwords($user->username);?></h2>
  </div>
</div>
<div class="container">
	<h2 class="text-center"><?=ucwords($user->username);?>'s Quote Cards</h2>
	<?php if(isset($cards)) : foreach($cards as $card) : ?>
		<div class="col-xs-12 col-md-6 col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading" <?=$card->color;?> >
					<div class="interactions-group">
						<a href="<?=base_url();?>profile/<?=$card->username;?>" title="<?=ucwords($user->username);?>">
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
					<i class="material-icons link favorite"
					<?php if($this->session->userdata('validated')) : ?>
						<?php /*if(($card->id_user) == $this->session->userdata('id_user')) {
							echo 'style = "color: #ba68c8"';
						}*/ ?>
					<?php endif ?> >favorite</i>
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
<script type="text/javascript" src="<?=base_url();?>vendor/js/jquery.js"></script>
<script>
  $(document).ready(function() {
    $(':file').hover(function() {
      $(this).attr('title',' ');
      $('.upload').toggleClass('visible');
    });

    var base_url = '<?php print base_url() ?>';

    var file = ;
    $(':file').on('change', prepareUpload);
    function prepareUpload(event) {
      file = event.target.file;
    }
    $.post(base_url + 'settings', file {

    });


  });
</script>
