<?php if(!$this->session->userdata('validated')) : ?>
<div class="cover">
  <div class="container">
    <h1 class="text-center">QuoteApp</h1>
		<h3 class="text-center">Side text to tell something</h3>
		<a class="call-to-action btn btn-raised btn-primary" href="<?=base_url() . 'signup'; ?>" >
			<span>Join Us Now</span>
		</a>
  </div>
</div>
<?php endif ?>
<div class="clearfix"></div>
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
      				<li>
                <a class="flag" for="<?=$card->id_card;?>">
  								<i class="material-icons link">flag</i>
  							</a>
      				</li>
      			  <?php endif ?>
            <?php endif ?>
            <?php if( $this->session->userdata('id_rolle') == 1 &&
                      $this->session->userdata('id_user') == ($card->id_user) ) : ?>
              <li>
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
  var author   = '<?php print $card->id_user?>';

  $(document).ready(function() {
    $('.delete').click(function() {
      var id = $(this).attr('for');
      $.ajax({
        url: base_url + 'card/delete/' + id,
        type: "GET",
        success: function() {
          // UBACITI NEKI MALI LOADER KOJII SE VRTI
          $('.' + id).fadeOut(1000);
        }
      });
    });
    $('.flag').click(function() {
      var id = $(this).attr('for');
      $.ajax({
        url: base_url + 'card/flag/' + id + '/' + author,
        type: "GET",
        success: function() {
          alert('blabla');
        }
      });
    });
  });
</script>
