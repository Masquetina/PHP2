<div class="cover">
  <div class="container">
    <div class="multipart text-center">
      <img src="<?=base_url();?>custom/img/avatars/<?=$user->avatar;?>" />
      <?php if($this->session->userdata('id_user') == $user->id_user) : ?>
      <span class="upload">
        <i class="material-icons icon">settings</i>
      </span>
      <?=form_upload('userfile');?>
  	<?php endif ?>
    </div>
    <h2 class="text-center"><?=ucwords($user->username);?></h2>
  </div>
</div>
<div class="container">
	<?php $counter = 0; if(isset($cards)) : ?>
    <?php foreach($cards as $card) : ?>
      <?php
      $delete = $card->delete;
      if($delete == 0) {
        $counter++;
      }
      ?>
    <?php endforeach ?>
    <?php
    if($counter == 0) {
    ?>
      <h2 class="text-center">There's no Quote Cards</h2>
    <?php
    } else {
    ?>
  	<?php foreach($cards as $card) : ?>
    <?php if($card->delete == 0) : ?>
		<div class="<?=$card->id_card;?> col-xs-12 col-md-6 col-lg-6">
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
          <?php if($this->session->userdata('id_user') == ($card->id_user)) : ?>
						<li>
							<a href="#">
								<i class="material-icons link">edit</i>
							</a>
						</li>
            <li>
							<a id="<?=$card->id_card;?>" href="<?=base_url();?>card/<?=$card->id_card;?>">
								<i class="<?=$card->id_card;?> material-icons link delete">delete</i>
							</a>
						</li>
					<?php endif ?>
				<?php endif ?>
			</ul>
		</div>
    <?php endif ?>
	  <?php endforeach ?>
    <?php } ?>
  <?php endif ?>
</div>
<script>
  var base_url = '<?php print base_url();?>';
  var username = '<?php print $this->session->userdata('username');?>';
  $(document).ready(function() {
    $(':file').hover(function() {
      $(this).attr('title',' ');
      $('.upload').toggleClass('visible');
    });

    $(':file').change(function() {

      var file = this.files[0];
      var name = file.name;
      var size = file.size;
      var type = file.type;
      // PROVERA


      // OVO TREBA DOVRŠITI !!!
      $.POST(base_url + 'settings/' + username);
    });
  });
</script>
