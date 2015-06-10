
<aside class="item" style="height:240px;">
    <div class="sale"></div>
    <div class="content" style="height:220px; overflow:hidden">
        <?php echo CHtml::link( CHtml::image($this->model->getMainImg(200,112),$this->model->title, array('title'=>$this->model->title)), $this->model->getUrl() ); ?>
        <name><?php echo CHtml::link($this->model->title, array($this->model->getUrl())); ?></name>
        <?php echo $this->model->description; ?>

        <p></p>
    </div>
</aside>

