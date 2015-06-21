<?php

class FormWidget extends CWidget{

	public $params = array();
    public $model = null;
    public $tehnikaModel=null;
    public $silverModel=null;

	public function init(){

		$this->tehnikaModel=Culk::model()->findByAttributes(array('name'=>'tehnika'));
		$this->model = Culk::model()->findAllByAttributes(array('name'=>'gold'));
		$this->silverModel = Culk::model()->findAllByAttributes(array('name'=>'silver'));
        parent::init();
    }

	public function run(){
        $this->render('index');
    }

    
}