
      <div class="equipmets-list">

      
    <?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model,
    'itemView'=>'_article',
    'summaryText' => '',
    'sorterHeader' => 'Сортувати по: ',
    'pager'=>array(
        'header' => '',
        'firstPageLabel'=>'<<',
        'prevPageLabel'=>'<',
        'nextPageLabel'=>'>',
        'lastPageLabel'=>'>>',
        'cssFile'=>false,
        'internalPageCssClass'=>'pager_li',
        'hiddenPageCssClass'=>'disabled',
    ),
    // 'pager'=>'LinkPager',
    'emptyText'=>'No article!',
    'sortableAttributes'=>array(
        'title',
    ),
    'template'=>"{items}\n{pager}",
    'ajaxUpdate'=>false,
));
?>
      
    </div>


    



