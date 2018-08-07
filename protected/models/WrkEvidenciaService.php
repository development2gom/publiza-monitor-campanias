<?php

/**
 * This is the model class for table "wrk_evidencia".
 *
 * The followings are the available columns in table 'wrk_evidencia':
 * @property string $id_evidencia
 * @property string $id_reporte
 * @property string $txt_unidad
 * @property string $txt_url_imagen
 * @property string $fch_registro
 * @property double $num_lat
 * @property double $num_lon
 * @property integer $b_liberado
 *
 * The followings are the available model relations:
 * @property WrkReporte $idReporte
 */
class WrkEvidenciaService extends CActiveRecord
{
	
	
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'wrk_evidencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_reporte, txt_unidad, txt_url_imagen, num_lat, num_lon', 'required'),
			array('b_liberado', 'numerical', 'integerOnly'=>true),
			array('num_lat, num_lon', 'numerical'),
			array('id_reporte', 'length', 'max'=>11),
			array('txt_unidad, txt_url_imagen', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_evidencia, id_reporte, txt_unidad, txt_url_imagen, fch_registro,  num_lat, num_lon,b_liberado', 'safe', 'on'=>'search'),
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
			'idReporte' => array(self::BELONGS_TO, 'WrkReporte', 'id_reporte'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_evidencia' => 'Evidencia',
			'id_reporte' => 'Reporte',
			'txt_unidad' => 'Unidad',
			'txt_url_imagen' => 'Url Imagen',
			'fch_registro' => 'Registro',
			'num_lat' => 'Num Lat',
			'num_lon' => 'Num Lon',
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

		$criteria->compare('id_evidencia',$this->id_evidencia,true);
		$criteria->compare('id_reporte',$this->id_reporte,true);
		$criteria->compare('txt_unidad',$this->txt_unidad,true);
		$criteria->compare('txt_url_imagen',$this->txt_url_imagen,true);
		$criteria->compare('fch_registro',$this->fch_registro,true);
		$criteria->compare('num_lat',$this->num_lat);
		$criteria->compare('num_lon',$this->num_lon);
		$criteria->compare('b_liberado',$this->b_liberado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WrkEvidencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
