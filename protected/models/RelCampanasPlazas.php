<?php

/**
 * This is the model class for table "rel_campanas_plazas".
 *
 * The followings are the available columns in table 'rel_campanas_plazas':
 * @property string $id_rel
 * @property string $id_campana
 * @property string $id_plaza
 * @property string $fch_inicio
 * @property string $fch_fin
 *
 * The followings are the available model relations:
 * @property EntCampanas $idCampana
 * @property CatPlazas $idPlaza
 */
class RelCampanasPlazas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rel_campanas_plazas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_campana, id_plaza, fch_inicio, fch_fin', 'required'),
			array('id_campana, id_plaza', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_rel, id_campana, id_plaza, fch_inicio, fch_fin', 'safe', 'on'=>'search'),
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
			'idCampana' => array(self::BELONGS_TO, 'EntCampanas', 'id_campana'),
			'idPlaza' => array(self::BELONGS_TO, 'CatPlazas', 'id_plaza'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rel' => 'Id Rel',
			'id_campana' => 'Id Campana',
			'id_plaza' => 'Id Plaza',
			'fch_inicio' => 'Fecha Inicio',
			'fch_fin' => 'Fecha Fin',
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

		$criteria->compare('id_rel',$this->id_rel,true);
		$criteria->compare('id_campana',$this->id_campana,true);
		$criteria->compare('id_plaza',$this->id_plaza,true);
		$criteria->compare('fch_inicio',$this->fch_inicio,true);
		$criteria->compare('fch_fin',$this->fch_fin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RelCampanasPlazas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
