<?php

/**
 * This is the model class for table "ent_campanas".
 *
 * The followings are the available columns in table 'ent_campanas':
 * @property string $id_campana
 * @property string $id_cliente
 * @property string $id_estatus
 * @property string $txt_nombre
 * @property string $fch_inicio
 * @property string $fch_fin
 * @property string $txt_url_master_graphic
 * @property string $txt_notas
 * @property integer $num_duracion
 * @property string $txt_url_ppt
 * @property string $txt_url_image
 * @property string $txt_url_xls
 * @property integer $b_habilitado
 *
 * The followings are the available model relations:
 * @property CatEstatus $idEstatus
 * @property EntClientes $idCliente
 * @property EntProductos[] $entProductoses
 * @property RelCampanasPlazas[] $relCampanasPlazases
 * @property WrkReporte[] $wrkReportes
 */
class EntCampanas extends CActiveRecord
{
	
	public $image;
	public $archivo;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ent_campanas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cliente, id_estatus, txt_nombre, fch_inicio, fch_fin, num_duracion', 'required'),
			array('b_habilitado', 'numerical', 'integerOnly'=>true),
			array('id_cliente, id_estatus', 'length', 'max'=>11),
			array('txt_nombre, txt_url_master_graphic, txt_url_master_graphic, txt_url_ppt, txt_url_image', 'length', 'max'=>50),
			array('txt_notas', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_campana, id_cliente, id_estatus, txt_nombre, fch_inicio, fch_fin, txt_url_master_graphic, num_duracion, txt_notas, txt_url_master_graphic, txt_url_ppt, txt_url_image, b_habilitado', 'safe', 'on'=>'search'),
			array('image', 'file','allowEmpty'=>true, 'types'=>'jpg, gif, png', 'safe' => false),
			array('archivo', 'file','allowEmpty'=>true, 'types'=>'jpg, gif, png,ppt, pptx,xls,xlsx', 'safe' => false),
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
			'idEstatus' => array(self::BELONGS_TO, 'CatEstatus', 'id_estatus'),
			'idCliente' => array(self::BELONGS_TO, 'EntClientes', 'id_cliente'),
			'entProductoses' => array(self::MANY_MANY, 'EntProductos', 'rel_campana_producto(id_campana, id_producto)'),
			'relCampanasPlazases' => array(self::HAS_MANY, 'RelCampanasPlazas', 'id_campana'),
			'wrkReportes' => array(self::HAS_MANY, 'WrkReporte', 'id_campana'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_campana' => 'Campaña',
			'id_cliente' => 'Cliente',
			'id_estatus' => 'Estatus',
			'txt_nombre' => 'Nombre',
			'fch_inicio' => 'Fecha de inicio',
			'fch_fin' => 'Fecha de fin',
			'txt_url_master_graphic' => 'Master Graphic',
			'txt_notas' => 'Notas',
			'num_duracion' => 'Duracion',
			'txt_url_ppt' => 'Txt Url Ppt',
			'txt_url_image' => 'Txt Url Image',
			'txt_url_xls' => 'Txt Url Xls',
			'b_habilitado' => 'Habilitado',
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

		$criteria->compare('id_campana',$this->id_campana,true);
		$criteria->compare('id_cliente',$this->id_cliente,true);
		$criteria->compare('id_estatus',$this->id_estatus,true);
		$criteria->compare('txt_nombre',$this->txt_nombre,true);
		$criteria->compare('fch_inicio',$this->fch_inicio,true);
		$criteria->compare('fch_fin',$this->fch_fin,true);
		$criteria->compare('txt_url_master_graphic',$this->txt_url_master_graphic,true);
		$criteria->compare('txt_notas',$this->txt_notas,true);
		$criteria->compare('num_duracion',$this->num_duracion);
		$criteria->compare('txt_url_ppt',$this->txt_url_ppt,true);
		$criteria->compare('txt_url_image',$this->txt_url_image,true);
		$criteria->compare('txt_url_xls',$this->txt_url_xls,true);
		$criteria->compare('b_habilitado',$this->b_habilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EntCampanas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
