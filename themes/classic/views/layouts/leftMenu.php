<aside class="left-menu">
	<div class="content" style="height:240px;">
		<ul>

			<li><?php  echo CHtml::link('Золото та срібло', array('/gold-and-silver.html'), array('class'=>'first')); ?></li>
			<li><?php  echo CHtml::link('Мобільні телефони', array('/phones.html'), array('class'=>'')); ?></li>
			<li><?php  echo CHtml::link('Побутова та оргтехніка', array('/tehnika.html'), array('class'=>'')); ?></li>
			<li><?php  echo CHtml::link('Предмети живопису та антикваріат', array('/old-art.html'), array('class'=>'')); ?></li>
			<li><?php  echo CHtml::link('Годинники', array('/watchs.html'), array('class'=>'')); ?></li>
			<li><?php  echo CHtml::link('Авто мото техніка', array('/avto.html'), array('class'=>'')); ?></li>
			
			


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
		<?php $this->action->id == 'index' ? $this->widget('SliderWidget') : ''; ?>
	</div>
</aside>