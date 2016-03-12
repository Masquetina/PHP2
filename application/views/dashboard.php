<div class="line"></div>
<ul class="nav-tabs">
  <li role="presentation" class="active">
    <a href="#cards" aria-controls="cards" role="tab" data-toggle="tab">
      Cards
    </a>
  </li>
  <li role="presentation">
    <a href="#users" aria-controls="users" role="tab" data-toggle="tab">
      Users
    </a>
  </li>
</ul>
<div class="container">
  <div class="tab-content col-xs-12 col-md-12 col-lg-12">
    <div role="tabpanel" class="tab-pane fade active" id="cards">
      <?php if(isset($cards)) : ?>
        <?php foreach($cards as $card) : ?>
          <div class="<?=$card->id_card;?> col-xs-12 col-md-6 col-lg-4">
            <div class="panel panel-default">
              <div class="panel-heading" <?=$card->color;?> >
                <ul class="info-bar">
                  <li class="unflag" data-for="<?=$card->id_card;?>"
                      data-author="<?=$card->id_user_author;?>"
                      data-flager="<?=$card->id_user_flager;?>">
                    <i class="material-icons link">check</i>
                  </li>
                  <li class="delete" data-for="<?=$card->id_card;?>"
                      data-author="<?=$card->id_user_author;?>"
                      data-flager="<?=$card->id_user_flager;?>">
                    <i class="material-icons link">close</i>
                  </li>
                </ul>
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
        <h2 id="no-cards">There's no Cards</h2>
      <?php endif ?>
    </div>
    <div role="tabpanel" class="tab-pane fade in" id="users">
      <?php if(isset($users)) : ?>
        <?php foreach($users as $user) : ?>
          <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="panel panel-default panel-user" data-username="<?=$user->username;?>">
              <a href="<?=base_url();?>profile/<?=$user->username;?>"
                title="<?=ucwords($user->username);?>">
                <img class="interactions avatar" src="<?=base_url();?>custom/img/avatars/<?=$user->avatar;?>" />
              </a>
              <p><?=ucwords($user->username);?></p>
              <p class="date"><?=($user->ban_time);?></p>
              <a href="#" class="pull-right">
                <i class="material-icons link">close</i>
              </a>
            </div>
          </div>
        <?php endforeach ?>
      <?php else : ?>
        <h2 id="no-users">There's no Users</h2>
      <?php endif ?>
    </div>
  </div>
</div>
<script type="text/javascript">
  var base_url = '<?php print base_url();?>';
  $(document).ready(function() {
    var is_banned;
    var users = [];
    $('.panel-user').each(function(){
      users.push($(this).attr('data-username'));
    });
    $('.delete').click(function() {
      var id_card = $(this).attr('data-for');
      var id_user_author = $(this).attr('data-author');
      var id_user_flager = $(this).attr('data-flager');
      $.ajax({
        url: base_url + 'dashboard/delete/' + id_card + '/' + id_user_author + '/' + id_user_flager,
        type: "POST",
        success: function(data) {
          var value = JSON.parse(data);
          if(users == '') {
            is_banned = false;
          } else {
            for(var i = 0; i < users.length; i++) {
              if(users[i] == value.username) {
                is_banned = true;
                break;
              }
            }
          }
          if(!is_banned) {
            $('#users').append(
              '<div class="col-xs-12 col-md-6 col-lg-4">' +
                '<div class="panel panel-default panel-user" data-username=' + value.username + '>' +
                  '<a href="' + '<?=base_url();?>' + 'profile/' + value.username + '"' + 'title="' + value.username + '">' +
                    '<img class="interactions avatar" src="' + '<?=base_url();?>' + 'custom/img/avatars/' + value.avatar + '" />' +
                  '</a>' +
                  '<p>' + value.username + '</p>' +
                  '<p class="date">' + value.ban_time + '</p>' +
                  '<a href="#" class="pull-right">' +
                    '<i class="material-icons link">close</i>' +
                  '</a>' +
                '</div>' +
              '</div>'
            );
            users.push(value.username);
          }
          $('#no-users').remove();
          $('.' + id_card).fadeOut(3000);
        }
      });
    });
    $('.unflag').click(function() {
      var id = $(this).attr('data-for');
      var id_user_author = $(this).attr('data-author');
      var id_user_flager = $(this).attr('data-flager');
      $.ajax({
        url: base_url + 'dashboard/unflag/' + id_card + '/' + id_user_author + '/' + id_user_flager,
        type: "POST",
        success: function() {
          $('.' + id_card).fadeOut(3000);
        }
      });
    });
  });
</script>
