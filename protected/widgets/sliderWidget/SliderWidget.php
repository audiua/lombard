<?php

class SliderWidget extends CWidget{

	public $params = array();
	public $model=null;

	public function init(){
        
		$criteria= new CDbCriteria;
		$criteria->order = 'sort';
		$this->model = LeftMenu::model()->findAll($criteria);
        parent::init();
    }

	public function run(){
        $this->render('index');
    }
}