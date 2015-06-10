<header class="page">
      <div id="logo">
        <a href="/"></a>
      </div>
      <div class="banner">
        <img src="http://mlombard.com.ua/top-banners/top-banner-green.png" style="display: none;">
        <img src="http://mlombard.com.ua/top-banners/top-banner-silver.png" style="display: none;">
        <img src="http://mlombard.com.ua/top-banners/top-banner-gold.png" style="display: block;">
      </div>
      <div id="phones">
        <div>Підтримка клієнтів <span>(000) 000-00-00</span></div>
      </div>
    </header>
  <nav id="menu">
    	<ul class="gradient" style="margin-left:0px;">
        
        <li><a href="/" class="first"></a></li>
        <li><?php  echo CHtml::link('Про нас', array('/about.html'), array('class'=>''.(Yii::app()->request->requestUri=='/about.html')?'active':'')); ?></li>
        <li><?php  echo CHtml::link('Умови кредитування', array('/rules.html'), array('class'=>''.(Yii::app()->request->requestUri=='/rules.html')?'active':'')); ?></li>
        <li><?php  echo CHtml::link('Дисконт', array('/discont.html'), array('class'=>''.(Yii::app()->request->requestUri=='/discont.html')?'active':'')); ?></li>
        <li><?php  echo CHtml::link('Акції', array('/action'), array('class'=>''.(Yii::app()->request->requestUri=='/action')?'active':'')); ?></li>
        <li><?php  echo CHtml::link('Розпродаж', array('/sale'), array('class'=>''.(Yii::app()->request->requestUri=='/sale')?'active':'')); ?></li>
        <li><?php  echo CHtml::link('Контакти', array('/contact.html'), array('class'=>'last '.(Yii::app()->request->requestUri=='/contact.html')?'active':'')); ?></li>
      </ul>
    </nav>