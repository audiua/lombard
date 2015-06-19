<div id="slideshowHolder" style="display: none;">
	<div class="badge"></div>
	<div class="tabs">
		<?php foreach( $this->model as $page ): ?>
		<div class="tab" style="display: block;">
			<img alt="" src="<?= $page->getThumb(); ?>" width="300" height="200">
			<div class="text">
				<h4 style="text-align: center;"><?= $page->page->title; ?></h4>
				<p style="text-align: center;">
					<?= $page->description; ?>
				</p>
				<!-- <p style="text-align: right;">
					<a style="color: rgb(9, 3, 24);" href="<?= $page->page->url; ?>"> <em>детальніше</em>
					</a>
				</p> -->
			</div>
		</div>
	<?php endforeach; ?>
	</div>
</div>