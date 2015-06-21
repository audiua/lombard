<div class="header">


	<nav class="navbar navbar-default navbar-static-top " role="navigation">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <?php echo CHtml::link('Inside', '/inside', array('class'=>'navbar-brand')); ?>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="<?php echo $this->id == 'clas' ? 'active' : '' ; ?>"><?php echo CHtml::link('Page', '/inside/page/'); ?></li>
			<li class="<?php echo $this->id == 'subject' ? 'active' : '' ; ?>"><?php echo CHtml::link('Category', '/inside/category/'); ?></li>
			<li class="<?php echo $this->id == 'subject' ? 'active' : '' ; ?>"><?php echo CHtml::link('Article', '/inside/article/'); ?></li>
			<li class="<?php echo $this->id == 'subject' ? 'active' : '' ; ?>"><?php echo CHtml::link('Left Menu', '/inside/leftMenu/'); ?></li>
			<li class="<?php echo $this->id == 'subject' ? 'active' : '' ; ?>"><?php echo CHtml::link('Culk', '/inside/culk/'); ?></li>
			
	      </ul>
	     
	      <ul class="nav navbar-nav navbar-right">
	        <!-- <li><a href="#">Link</a></li> -->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo Yii::app()->user->name; ?> <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><?php echo CHtml::link('Сайт', '/',array('target'=>'_blanck')); ?></li>
	            
	            <li class="divider"></li>
	            <li><?php echo CHtml::link('Выйти', '/site/logout'); ?></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div>