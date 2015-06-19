<aside class="left-menu">
	<div class="content" style="height:240px;">
		<ul>

			<?php foreach( $this->model as $i => $page ): ?>

			<li><?= CHtml::link($page->page->title, array($page->page->url), array('class'=>($i===0)?'first':'')); ?></li>
			
			<?php endforeach; ?>


			<!-- <li class="first">
				<a href="http://mlombard.com.ua/page/11/zoloto-i-serebro.html" class="">Золото та срібло</a>
			</li>
			<li>
				<a href="http://mlombard.com.ua/page/10/telefoni-i-tehnika.html" class="active">Мобільні телефони<br>та побутова техніка</a>
			</li>
			<li>
				<a href="http://mlombard.com.ua/page/12/antikvariat.html" class="">Предмети живопису та антикваріат</a>
			</li>
			<li>
				<a href="http://mlombard.com.ua/page/17/chasy.html">Годинники</a>
			</li>
			<li>
				<a href="http://mlombard.com.ua/page/5/auto-lombard.html">Автомото техніка</a>
			</li>
			<li class="last">
				<a href="http://mlombard.com.ua/page/6/neruhomist.html" class="">Нерухомість</a>
			</li> -->
		</ul>
		<?php $this->controller->action->id == 'index' ? $this->widget('SliderWidget') : ''; ?>
	</div>
</aside>