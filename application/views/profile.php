<div class="clearfix"></div>
<div class="container">
  <div class="profile col-xs-12 col-md-4 col-lg-4">
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
  <div class="col-xs-12 col-md-8 col-lg-8">
  </div>
  <div class="clearfix"></div>
</div>
<div class="container">
	<?php if(isset($cards)) : ?>
  	<?php foreach($cards as $card) : ?>
		<div class="<?=$card->id_card;?> col-xs-12 col-md-6 col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading" <?=$card->color;?> >
					<div class="interactions-group">
						<a href="<?=base_url();?>profile/<?=$card->username;?>" title="<?=ucwords($user->username);?>">
							<img class="interactions avatar" src="<?=base_url();?>custom/img/avatars/<?=$card->avatar;?>" />
						</a>
            <ul class="info-bar">
            <?php if(!$this->session->userdata('validated') || $this->session->userdata('id_user') == ($card->id_user)) : ?>
              <li>
                <p class="count"><?=$card->likes;?></p>
              </li>
              <li>
                <i class="unclicable material-icons link favorite">favorite</i>
              </li>
            <?php endif ?>
            <?php if($this->session->userdata('id_user') == ($card->id_user)) : ?>
              <li>
  							<a class="delete" id="<?=$card->id_card;?>">
  								<i class="material-icons link delete">delete</i>
  							</a>
  						</li>
  					<?php endif ?>
            <?php if($this->session->userdata('validated')) : ?>
              <?php if($this->session->userdata('id_user') != ($card->id_user)) : ?>
              <li>
                <p class="count"><?=$card->likes;?></p>
              </li>
              <li>
                <i class="material-icons link favorite">favorite</i>
              </li>
              <li>
                <i class="material-icons link">flag</i>
              </li>
              <?php endif ?>
            <?php endif ?>
            </ul>
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
    </div>
	  <?php endforeach ?>
  <?php else : ?>
    There is no cards.
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
      //alert(file + " " + name + " " + size + " " + type);
      // OVDE TREBA DA URADIM PROVERU PRVO

      $.ajax({
        url: base_url + 'settings/image/' + username,
        type: "POST",
        data: file,
        async: false,
        success: function() {
          alert(file)
        },
        cache: false,
        contentType: false,
        processData: false
      });
    });

    $('.delete').click(function() {
      var id = $(this).attr('id');
      $.ajax({
        url: base_url + 'card/' + id,
        type: "GET",
        success: function() {
          // UBACITI NEKI MALI LOADER KOJII SE VRTI
          $('.' + id).fadeOut(1000);
        }
      });
    });
  });
</script>
