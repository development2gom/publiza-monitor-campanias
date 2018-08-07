<?php

/**
 * This is the model class for table "wrk_reporte".
 *
 * The followings are the available columns in table 'wrk_reporte':
 * @property string $id_reporte
 * @property string $id_cliente
 * @property string $id_campana
 * @property string $id_tipo_reporte
 * @property string $id_plaza
 * @property string $txt_numero_unidad
 * @property string $txt_eco_placa
 * @property string $txt_codigo_ruta
 * @property string $fch_creacion
 * @property integer $b_liberado
 *
 * The followings are the available model relations:
 * @property WrkEvidencia[] $wrkEvidencias
 * @property CatPlazas $idPlaza
 * @property CatTiposReportes $idTipoReporte
 * @property EntCampanas $idCampana
 * @property EntClientes $idCliente
 */
class WrkReporte extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'wrk_reporte';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cliente, id_campana, id_tipo_reporte,id_plaza,txt_numero_unidad,txt_eco_placa,txt_codigo_ruta', 'required'),
			array('b_liberado', 'numerical', 'integerOnly'=>true),
			array('id_cliente, id_campana, id_tipo_reporte, id_plaza', 'length', 'max'=>11),
			array('txt_numero_unidad, txt_eco_placa, txt_codigo_ruta', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_reporte, id_cliente, id_campana, id_tipo_reporte, txt_numero_unidad,txt_eco_placa,txt_codigo_ruta, id_plaza, txt_numero_unidad, txt_eco_placa, txt_codigo_ruta, fch_creacion, b_liberado', 'safe', 'on'=>'search'),
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
			'wrkEvidencias' => array(self::HAS_MANY, 'WrkEvidencia', 'id_reporte'),
			'idPlaza' => array(self::BELONGS_TO, 'CatPlazas', 'id_plaza'),
			'idTipoReporte' => array(self::BELONGS_TO, 'CatTiposReportes', 'id_tipo_reporte'),
			'idCampana' => array(self::BELONGS_TO, 'EntCampanas', 'id_campana'),
			'idCliente' => array(self::BELONGS_TO, 'EntClientes', 'id_cliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_reporte' => 'Reporte',
			'id_cliente' => 'Cliente',
			'id_campana' => 'Campana',
			'id_tipo_reporte' => 'Tipo de reporte',
			'id_plaza' => 'Plaza',
			'txt_numero_unidad' => 'Numero de unidad',
			'txt_eco_placa' => 'Eco/Placa',
			'txt_codigo_ruta' => 'Codigo Ruta',
			'fch_creacion' => 'Fecha creacion',
			'b_liberado' => 'Liberado',
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

		$criteria->compare('id_reporte',$this->id_reporte,true);
		$criteria->compare('id_cliente',$this->id_cliente,true);
		$criteria->compare('id_campana',$this->id_campana,true);
		$criteria->compare('id_tipo_reporte',$this->id_tipo_reporte,true);
		$criteria->compare('id_plaza',$this->id_plaza,true);
		$criteria->compare('txt_numero_unidad',$this->txt_numero_unidad,true);
		$criteria->compare('txt_eco_placa',$this->txt_eco_placa,true);
		$criteria->compare('txt_codigo_ruta',$this->txt_codigo_ruta,true);
		$criteria->compare('fch_creacion',$this->fch_creacion,true);
		$criteria->compare('b_liberado',$this->b_liberado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WrkReporte the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
