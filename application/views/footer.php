<footer>
	<div class="container">
		<div class="social menu pull-left">
			<?php if(isset($socials)) : ?>
			<ul>
				<?php foreach($socials as $social) : ?>
				<li>
					<a href="<?=$social->path;?>" target="_blank"
						 title="Find me on <?=ucwords($social->name);?>">
						<i class="mdi mdi-<?=$social->name;?>"></i>
					</a>
				</li>
				<?php endforeach ?>
			</ul>
			<?php endif ?>
		</div>
		<div class="regular menu pull-right">
			<ul>
				<li>
					<a href="https://github.com/Masquetina/QuoteApp" target="_blank">
						<p>QuoteApp on GitHub</p>
					</a>
				</li>
			</ul>
		</div>
		<div class="clearfix"></div>
		<div class="">
			<p class="text-center copy">Iva Dopuđ 2016 | All rights reserved</p>
		</div>
	</div>
</footer>
