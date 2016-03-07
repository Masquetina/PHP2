<div class="line"></div>
<div class="container-fluid">
  <div class="col-xs-2 col-md-2 col-lg-2">
    <ul class="nav-tabs">
      <li>
        <a href="#"></a>
      </li>
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
  </div>
  <div class="tab-content col-xs-10 col-md-10 col-lg-10">
    <div role="tabpanel" class="tab-pane fade in" id="users">
      <?php if(isset($users)) : ?>
        <?php foreach($users as $user) : ?>
          <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="panel panel-default panel-user">
              <a href="<?=base_url();?>profile/<?=$user->username;?>"
                title="<?=ucwords($user->username);?>">
                <img class="interactions avatar" src="<?=base_url();?>custom/img/avatars/<?=$user->avatar;?>" />
              </a>
              <p><?=ucwords($user->username);?></p>
              <a href="#" class="pull-right">
                <i class="material-icons link">close</i>
              </a>
            </div>
          </div>
        <?php endforeach ?>
      <?php else : ?>
        <h2 class="text-center">There's no Users</h2>
      <?php endif ?>
    </div>
    <div role="tabpanel" class="tab-pane fade active" id="cards">
      <?php if(isset($cards)) : ?>
        <?php foreach($cards as $card) : ?>
          <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="panel panel-default">
              <div class="panel-heading" <?=$card->color;?> >
                <ul class="info-bar">
                  <li>
                    <a href="#">
                      <i class="material-icons link">check</i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="material-icons link">close</i>
                    </a>
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
      <?php endif ?>
    </div>
  </div>
</div>
