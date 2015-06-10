<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property string $id
 * @property string $slug
 * @property string $title
 * @property string $content
 * @property string $img_ext
 * @property string $create_time
 * @property string $update_time
 * @property string $public_time
 * @property string $public
 * @property string $category_id
 *
 * The followings are the available model relations:
 * @property Category $category
 */
class Article extends CActiveRecord
{
	private $_url;
	public $images;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('slug, title, category_id', 'required'),
			array('slug, title', 'length', 'max'=>255),
			array('create_time, update_time, category_id', 'length', 'max'=>10),
			array('public', 'length', 'max'=>1),
			// array('thumbnail','file','types'=>'jpg,png,gif,jpeg,JPG,PNG,GIF,JPEG','allowEmpty'=>true),
			array('content,description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, slug, title, content, create_time, update_time, public_time, public, category_id,description', 'safe', 'on'=>'search'),
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
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'slug' => 'Slug',
			'title' => 'Title',
			'content' => 'Content',
			'description' => 'description',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'public_time' => 'Public Time',
			'public' => 'Public',
			'category_id' => 'Category',
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
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('public_time',$this->public_time,true);
		$criteria->compare('public',$this->public,true);
		$criteria->compare('category_id',$this->category_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeDelete(){

		if( file_exists(Yii::getPathOfAlias('webroot').'/images/'.$this->category->slug.'/'.$this->slug) ){
    		$images = scandir(Yii::getPathOfAlias('webroot').'/images/'.$this->category->slug.'/'.$this->slug);
    	
    		foreach( $images as $image ){
    			unlink(Yii::getPathOfAlias('webroot').'/images/'.$this->category->slug.'/'.$this->slug.'/'.$image);
    		}
    	}

		return parent::beforeDelete();
	}


    public function beforeSave(){

    	$this->public_time = strtotime($this->public_time);

    	return parent::beforeSave();
    }

    public function getThumb($width=179, $height=229)
    {

    	if( !file_exists(Yii::getPathOfAlias('webroot').'/images/'.$this->category->slug.'/'.$this->slug) ){
    		return [];
    	}
    	$images = scandir(Yii::getPathOfAlias('webroot').'/images/'.$this->category->slug.'/'.$this->slug);

    	$files = [];
    	foreach($images as $image){
    		if( $image == '.' || $image == '..' ) continue;

    		if(stripos($image, $width.'x'.$height) !== false){
    			$files[] = '/images/'.$this->category->slug.'/'.$this->slug.'/'.$image;
    			continue;
    		}

    		// пропускаем сгенерированые картинки другого размена
    		if(substr_count($image, '_') > 1 ){
    			continue;
    		}

    		$part = explode('.', $image);
    		$originImage = Yii::getPathOfAlias('webroot').'/images/'.$this->category->slug.'/'.$this->slug.'/'.$image;
    		$fileName = $part[0].'_' . $width . 'x' . $height . '.' . $part[1];
    		
    		if(!file_exists( Yii::getPathOfAlias('webroot').'/images/'.$this->category->slug.'/'.$this->slug.'/'.$fileName )){
    			Yii::app()->image->cropSave($originImage, $width, $height, Yii::getPathOfAlias('webroot').'/images/'.$this->category->slug.'/'.$this->slug.'/'.$fileName);
    			chmod(Yii::getPathOfAlias('webroot').'/images/'.$this->category->slug.'/'.$this->slug.'/'.$fileName, 0777);
    			$files[] = '/images/'.$this->category->slug.'/'.$this->slug.'/'.$fileName;
    		}

    	}

    	return $files;

    }

    public function getMainImg($width=179, $height=229)
    {
    	if( !file_exists(Yii::getPathOfAlias('webroot').'/images/'.$this->category->slug.'/'.$this->slug) ){
    		return 'http://placehold.it/'.$width.'x'.$height;
    	}
    	$images = scandir(Yii::getPathOfAlias('webroot').'/images/'.$this->category->slug.'/'.$this->slug );
    	foreach($images as $image){
    		if( $image == '.' || $image == '..' ){continue;} 

    		if(stripos($image, $this->slug.'_0_'.$width.'x'.$height) !== false){
    			return '/images/'.$this->category->slug.'/'.$this->slug.'/'.$image;
    		}
    	}
    }

    public function afterSave()
    {
    	if($this->images){
    		foreach($this->images as $i => $image){

    			if(!file_exists( $dir = Yii::getPathOfAlias('webroot').'/images/'.$this->category->slug.'/'.$this->slug)){
    				mkdir($dir, 0777,true);
    				chmod($dir, 0777);
    				chmod(Yii::getPathOfAlias('webroot').'/images/'.$this->category->slug, 0777);
    			}

    			$part = explode('.', $image->name);
    			$name = $this->slug . '_'.$i . '.'.$part[1];
    			$k = $i;
    			while(file_exists($dir.'/'.$name)){
    				$k++;
    				$name = $this->slug . '_'.$k . '.'.$part[1];
    			}
    			$image->saveAs($dir.'/'.$name);
    			chmod($dir.'/'.$name, 0777);
    		}


    		// создание миниатьюр
    		$this->getThumb(250,167);
    		$this->getThumb(200,112);
    		$this->getThumb(100,100);

    		// d($images);
    	}



    	return parent::afterSave();
    }


	public function getUrl(){
		if(!$this->_url){
			$this->_url = $this->category->slug . '/'.$this->slug . '.html';
		}
		return $this->_url;
	}
}
