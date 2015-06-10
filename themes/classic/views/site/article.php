<div class="article">
    <h2><?php echo $model->title; ?></h2> 

    <div class="top-article">
        <div class="article-imeges">
            <div class="big-img">
                <?php echo CHtml::image('',$model->title, array('title'=>$model->title, 'class'=>'')); ?>
            </div>

            <div class="mini-img">
                <?php foreach( array_slice($model->getThumb(300,220), 0, 3) as $i => $one){
                    $active = ($i == 0) ? 'active' : '' ;
                    echo CHtml::image($one,$model->title, array('title'=>$model->title, 'class'=>"{$active}"));
                } ?>
            </div>
        </div>
        <div class="article-description">
            <?php echo $model->description; ?>
        </div>
    </div>

    <br>
    <br>
    <div class="article-content">
        <?php echo $model->content; ?>
    </div>

</div>
