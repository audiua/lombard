<!DOCTYPE html>
<html lang="en" class="ie">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="<?php // echo CHtml::encode($this->description); ?>" />
        <meta name="keywords" content="<?php // echo CHtml::encode($this->keywords); ?>" />
        <base href="<?php  echo Yii::app()->createAbsoluteUrl('/'); ?>">
        <link rel="canonical" href="<?php // echo $this->canonical; ?>">

        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/jquery-ui-1.8.13.custom.min.css">
        
        
        <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>

        <?php 

            $path = Yii::app()->theme->basePath;
            $mainAssets = Yii::app()->AssetManager->publish($path);
            // Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/imagebox.js', CClientScript::POS_END);
            Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/effects.js', CClientScript::POS_END);
            Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/sys.js', CClientScript::POS_END);
            // Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/less.js');
            // Yii::app()->getClientScript()->registerCssFile($mainAssets.'/css/style.css');
            // Yii::app()->getClientScript()->registerCssFile($mainAssets.'/css/core.css');
            // Yii::app()->getClientScript()->registerCssFile($mainAssets.'/css/reset.css');

         ?>



        <!-- <script src="/js/effects.js"></script>
        <script src="/js/imagebox.js"></script>
        <script src="/js/sys.js"></script>
        <script src="/js/effects.js"></script> -->
        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
        <title>
            <?php // echo CHtml::encode($this->pageTitle); ?>
            Головна / 
      ломбард econom- кредити під заставу ювелірних виробів, мобільної та побутової техніки, нерухомості. Автоломбард
        </title>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
       
        <!--[if lt IE 7]>
            <script src="http://www.mlombard.com.ua/shared/ie/warning.js"></script><script>window.onload=function(){e("/shared/ie/")}</script>
        <![endif]-->
        <!--[if IE 7]>
            <link href="http://www.mlombard.com.ua/shared/css/ie7.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <!--[if IE 8]>
            <link href="http://www.mlombard.com.ua/shared/css/ie8.css" rel="stylesheet" type="text/css" />
        <![endif]-->

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
          <script src="http://www.mlombard.com.ua/shared/js/rocon.js"></script>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    
</head>


    <body>
    <div id="top-line"></div>
    <div id="light"></div>
       
        <div id="page">
            <div id="container">
                <div id="runtext">
                    <div class="left"></div>
                    <div class="right"></div>
                    <marquee direction="left">
                        Раді вітати Вас на сайті мережі ломбардів «Ломбард Економ»!        Увага!!!        З 1-го червня діє дисконтна програма. Запрошуємо всіх, хто хоча би один раз обслуговувався у нас, прийти за своєю карткою. Новим клієнтам СТАРТОВА картка - в подарунок! Докладніше - в розділі "Дисконт".
                    </marquee>
                </div>
                <div id="left">

                    <?php $this->renderPartial('//layouts/leftMenu'); ?>

                    <?php $this->widget('SaleWidget'); ?>

                    <?php $this->widget('InfoWidget'); ?>

                </div>

                <div id="content">
                    <?php echo $content; ?>
                    <?php  $this->widget('FormWidget'); ?>
                </div>
            </div>

            <?php $this->renderPartial('//layouts/top'); ?>
        </div>
            

        <?php $this->renderPartial('//layouts/footer'); ?>

    <script src="/js/app.js"></script>
    </body>
</html>