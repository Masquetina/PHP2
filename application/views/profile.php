<div class="clearfix"></div>
<div class="message"></div>
<div class="content">
  <div class="container">
    <div class="profile col-xs-12 col-md-12 col-lg-12">
      <div class="multipart text-center">
        <img src="<?=base_url();?>custom/img/avatars/<?=$user->avatar;?>" />
        <?php if($this->session->userdata('id_user') == $user->id_user) : ?>
          <span class="upload">
            <i class="material-icons icon">settings</i>
          </span>
          <?=form_open_multipart();?>
          <?php
            $atributes = array(
            'id'   => 'userfile',
            'name' => 'userfile'
            );
            echo form_upload($atributes);
          ?>
          <?=form_close();?>
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
                  <p id="count-<?=$card->id_card;?>" class="count"><?=$card->likes;?></p>
                </li>
                <li class="like" data-for="<?=$card->id_card;?>">
                  <i class="material-icons link favorite">favorite</i>
                </li>
                <?php if( $this->session->userdata('id_rolle') == 1 ) : ?>
                <li class="flag" data-for="<?=$card->id_card;?>" author="<?=$card->id_user;?>">
                  <i class="material-icons link">flag</i>
                </li>
                <?php endif ?>
                <?php endif ?>
                <?php if( $this->session->userdata('id_rolle') == 1 &&
                          $this->session->userdata('id_user') == ($card->id_user) ) : ?>
                <li class="delete" data-for="<?=$card->id_card;?>">
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
    // alert(file + " " + name + " " + size + " " + type);
    // OVDE TREBA PROVERA
    $.ajax({
      url: base_url + 'settings/image/' + username,
      type: 'POST',
      data: file,
      secureuri: false,
      fileElementId: 'userfile',
      success: function() {

      },
      cache: false,
      contentType: false,
      processData: false
    });
  });
  $('.like').click(function() {
    var id_card = $(this).attr('data-for');
    $.ajax({
      url: base_url + 'card/like/' + id_card,
      type: "POST",
      success: function() {
        var count = $('#count-' + id_card).html();
        count = parseInt(count);
        $('#count-' + id_card).html(count + 1);
      }
    });
  });
  $('.delete').click(function() {
    var id_card = $(this).attr('data-for');
    $.ajax({
      url: base_url + 'card/delete/' + id_card,
      type: "POST",
      success: function() {
        $('.' + id_card)
          .fadeOut(3000);
        $('.message')
          .show()
          .html('<div class="message-container text-center info">' +
                  '<p>Deleting a Card...</p>' +
                '</div>')
          .delay(3000)
          .fadeOut(1);
      }
    });
  });
  $('.flag').click(function() {
    var id_card = $(this).attr('data-for');
    var id_user_author = $(this).attr('author');
    $.ajax({
      url: base_url + 'card/flag/' + id_card + '/' + id_user_author,
      type: "POST",
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
