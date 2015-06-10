<?php

class SliderWidget extends CWidget{

	public $params = array();

	public function init(){
        parent::init();
    }

	public function run(){
        $this->render('index');
    }
}