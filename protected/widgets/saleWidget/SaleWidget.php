<?php

class SaleWidget extends CWidget{

	public $params = array();
    public $model = null;

	public function init(){

		$criteria=new CDbCriteria;
		$criteria->condition = 't.category_id=1';
		$criteria->addCondition('t.public_time<'.time());
		$criteria->addCondition('t.public=1');
		$criteria->order = 'RAND()';
		$this->model = Article::model()->find($criteria);

        parent::init();
    }

	public function run(){

		if($this->model){
        	$this->render('index');
		} else {
			return '';
		}
    }

    
}