<div class="floatbox">
	<h3>
		<?php echo CHtml::link($data->title, array($data->url)); ?>
	</h3>
	<aside class="content-items">
		<div class="sale"></div>
		<div class="content">
		<?php echo CHtml::link( CHtml::image($data->getMainImg(250,167),$data->title, array('title'=>$data->title)), $data->url ); ?>
		</div>
	</aside>
	<?php echo $data->description; ?>
	<div class="news-list-date">Опубліковано: <strong><?php echo date('Y.m.d H:i:s', $data->create_time) ?></strong></div>
</div>
