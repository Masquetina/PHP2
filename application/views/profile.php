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
      <div class="<?=$card->id_card;?> col-xs-12 col-md-6 col-lg-4">
  			<div class="panel panel-default">
  				<div class="panel-heading" <?=$card->color;?> >
  					<div class="interactions-group">
  						<a href="<?=base_url();?>profile/<?=$card->username;?>"
  							 title="<?=ucwords($card->username);?>">
  							<img class="interactions avatar" src="<?=base_url();?>custom/img/avatars/<?=$card->avatar;?>" />
  						</a>
              <ul class="info-bar">
              <?php if( ! $this->session->userdata('validated') ||
                          $this->session->userdata('id_user') == ($card->id_user) ||
                          $this->session->userdata('id_rolle') != 1 ) : ?>
                <li>
  							  <p class="count"><?=$card->likes;?></p>
  						  </li>
          			<li>
          				<i class="unclicable material-icons link favorite">favorite</i>
          			</li>
              <?php endif ?>
              <?php if( $this->session->userdata('id_rolle') == 1 &&
                        $this->session->userdata('id_user') != ($card->id_user) ) : ?>
                <li>
  							  <p class="count"><?=$card->likes;?></p>
  						  </li>
                <li>
            		  <i class="material-icons link favorite">favorite</i>
            		</li>
                <?php if( $this->session->userdata('id_rolle') == 1 ) : ?>
        				<li class="flag" for="<?=$card->id_card;?>" author="<?=$card->id_user;?>">
    							<i class="material-icons link">flag</i>
        				</li>
        			  <?php endif ?>
              <?php endif ?>
              <?php if( $this->session->userdata('id_rolle') == 1 &&
                        $this->session->userdata('id_user') == ($card->id_user) ) : ?>
                <li class="delete" for="<?=$card->id_card;?>">
            		  <i class="material-icons link favorite">delete</i>
            		</li>
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
      <h2 class="text-center">There's no Quote Cards</h2>
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
      var id_card = $(this).attr('for');
      $.ajax({
        url: base_url + 'card/delete/' + id_card,
        type: "GET",
        success: function() {
          $('.' + id_card).fadeOut(1);
          $('.message')
  					.show()
  					.html('<div class="message-container text-center info">' +
  									'<p>You deleted a card.</p>' +
  								'</div>')
            .delay(3000)
            .fadeOut(1);
        }
      });
    });
    $('.flag').click(function() {
      var id_card = $(this).attr('for');
      var id_user_author = $(this).attr('author');
      $.ajax({
        url: base_url + 'card/flag/' + id_card + '/' + id_user_author,
        type: "GET",
        success: function() {
          $('.message')
  					.show()
  					.html('<div class="message-container text-center info">' +
  									'<p>You flaged a card. Admin is going to review it.</p>' +
  								'</div>')
  					.delay(3000)
            .fadeOut(1);
        }
      });
    });
  });
</script>
