<?php

/**
 * This is the model class for table "left_menu".
 *
 * The followings are the available columns in table 'left_menu':
 * @property string $id
 * @property string $page_id
 * @property string $description
 * @property string $create_time
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property Page $page
 */
class LeftMenu extends CActiveRecord
{
		public $images;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'left_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page_id, description, sort', 'required'),
			array('page_id, create_time, update_time', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, page_id, description, create_time, update_time,sort', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
		);
	}

	public function behaviors(){
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'create_time',
				'updateAttribute' => 'update_time',
				'setUpdateOnCreate'=>true,
			)
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'page_id' => 'Page',
			'sort' => 'sort',
			'description' => 'Description',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('page_id',$this->page_id,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('sort',$this->sort,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LeftMenu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeDelete(){

		if( file_exists(Yii::getPathOfAlias('webroot').'/images/left_menu/'.$this->id) ){
    		$images = scandir(Yii::getPathOfAlias('webroot').'/images/left_menu/'.$this->id);
    	
    		foreach( $images as $image ){
    			unlink(Yii::getPathOfAlias('webroot').'/images/left_menu/'.$this->id.'/'.$image);
    		}
    	}

		return parent::beforeDelete();
	}

	public function afterSave()
	{
		if($this->images){
			foreach($this->images as $i => $image){

				if(!file_exists( $dir = Yii::getPathOfAlias('webroot').'/images/left_menu/'.$this->id)){
					mkdir($dir, 0777,true);
					chmod($dir, 0777);
					chmod(Yii::getPathOfAlias('webroot').'/images/left_menu/'.$this->id, 0777);
				}

				$part = explode('.', $image->name);
				$name = $this->page->slug .'.'.$part[1];

				$image->saveAs($dir.'/'.$name);
				chmod($dir.'/'.$name, 0777);
			}
		}



		return parent::afterSave();
	}

	public function getThumb()
	{

		if( !file_exists(Yii::getPathOfAlias('webroot').'/images/left_menu/'.$this->id) ){
			return [];
		}
		$images = scandir(Yii::getPathOfAlias('webroot').'/images/left_menu/'.$this->id);

		$files = [];
		foreach($images as $image){
			if( $image == '.' || $image == '..' ) continue;

			return '/images/left_menu/'.$this->id.'/'.$image;;

		}

		return '';

	}
}
