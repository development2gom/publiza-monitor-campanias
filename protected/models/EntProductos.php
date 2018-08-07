<?php

/**
 * This is the model class for table "ent_productos".
 *
 * The followings are the available columns in table 'ent_productos':
 * @property string $id_producto
 * @property string $txt_nombre
 * @property string $txt_desc
 * @property integer $b_habilitado
 *
 * The followings are the available model relations:
 * @property EntCampanas[] $entCampanases
 */
class EntProductos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ent_productos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('txt_nombre, txt_desc', 'required'),
			array('b_habilitado', 'numerical', 'integerOnly'=>true),
			array('txt_nombre', 'length', 'max'=>50),
			array('txt_desc', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_producto, txt_nombre, txt_desc, b_habilitado', 'safe', 'on'=>'search'),
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
			'entCampanases' => array(self::MANY_MANY, 'EntCampanas', 'rel_campana_producto(id_producto, id_campana)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_producto' => 'Id Producto',
			'txt_nombre' => 'Txt Nombre',
			'txt_desc' => 'Txt Desc',
			'b_habilitado' => 'B Habilitado',
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

		$criteria->compare('id_producto',$this->id_producto,true);
		$criteria->compare('txt_nombre',$this->txt_nombre,true);
		$criteria->compare('txt_desc',$this->txt_desc,true);
		$criteria->compare('b_habilitado',$this->b_habilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EntProductos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
