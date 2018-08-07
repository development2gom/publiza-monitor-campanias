<?php

/**
 * This is the model class for table "cat_plazas".
 *
 * The followings are the available columns in table 'cat_plazas':
 * @property string $id_plaza
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property integer $b_habilitada
 *
 * The followings are the available model relations:
 * @property RelCampanasPlazas[] $relCampanasPlazases
 */
class CatPlazas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cat_plazas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('b_habilitada', 'numerical', 'integerOnly'=>true),
			array('txt_nombre', 'length', 'max'=>11),
			array('txt_descripcion', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_plaza, txt_nombre, txt_descripcion, b_habilitada', 'safe', 'on'=>'search'),
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
			'relCampanasPlazases' => array(self::HAS_MANY, 'RelCampanasPlazas', 'id_plaza'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_plaza' => 'Id Plaza',
			'txt_nombre' => 'Txt Nombre',
			'txt_descripcion' => 'Txt Descripcion',
			'b_habilitada' => 'B Habilitada',
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

		$criteria->compare('id_plaza',$this->id_plaza,true);
		$criteria->compare('txt_nombre',$this->txt_nombre,true);
		$criteria->compare('txt_descripcion',$this->txt_descripcion,true);
		$criteria->compare('b_habilitada',$this->b_habilitada);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CatPlazas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
