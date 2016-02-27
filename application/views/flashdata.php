<?php if($this->session->flashdata('warning')) : ?>
<div class="message-container text-center warning">
	<p><?=$this->session->flashdata('warning');?></p>
</div>
<?php endif ?>
<?php if($this->session->flashdata('message')) : ?>
<div class="message-container text-center greeting">
	<p><?=$this->session->flashdata('message');?></p>
</div>
<?php endif ?>
