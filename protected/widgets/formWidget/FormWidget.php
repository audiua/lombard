<?php

class FormWidget extends CWidget{

	public $params = array();
    public $model = null;

	public function init(){


        parent::init();
    }

	public function run(){
        $this->render('index');
    }

    
}