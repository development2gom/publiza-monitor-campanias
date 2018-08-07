<?php

/**
 * This is the model class for table "ent_clientes".
 *
 * The followings are the available columns in table 'ent_clientes':
 * @property string $id_cliente
 * @property string $txt_nombre
 * @property string $txt_url_logo
 * @property string $txt_persona_contacto
 * @property string $txt_telefono
 * @property string $txt_mail
 * @property integer $b_habilitado
 *
 * The followings are the available model relations:
 * @property EntCampanas[] $entCampanases
 * @property EntUsuarios[] $entUsuarioses
 * @property WrkReporte[] $wrkReportes
 */
class EntClientes extends CActiveRecord
{
	
	public $image;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ent_clientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('txt_nombre, txt_persona_contacto, txt_telefono, txt_mail, txt_url_logo', 'required'),
			array('b_habilitado', 'numerical', 'integerOnly'=>true),
			array('txt_nombre, txt_url_logo, txt_persona_contacto, txt_telefono, txt_mail', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_cliente, txt_nombre, txt_url_logo, txt_persona_contacto, txt_telefono, txt_mail, b_habilitado', 'safe', 'on'=>'search'),
			array('image', 'file', 'types'=>'jpg, gif, png', 'safe' => false),
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
			'entCampanases' => array(self::HAS_MANY, 'EntCampanas', 'id_cliente'),
			'entUsuarioses' => array(self::HAS_MANY, 'EntUsuarios', 'id_cliente'),
			'wrkReportes' => array(self::HAS_MANY, 'WrkReporte', 'id_cliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cliente' => 'Cliente',
			'txt_nombre' => 'Nombre',
			'txt_url_logo' => 'Logo',
			'txt_persona_contacto' => 'Persona Contacto',
			'txt_telefono' => 'Teléfono',
			'txt_mail' => 'Mail',
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

		$criteria->compare('id_cliente',$this->id_cliente,true);
		$criteria->compare('txt_nombre',$this->txt_nombre,true);
		$criteria->compare('txt_url_logo',$this->txt_url_logo,true);
		$criteria->compare('txt_persona_contacto',$this->txt_persona_contacto,true);
		$criteria->compare('txt_telefono',$this->txt_telefono,true);
		$criteria->compare('txt_mail',$this->txt_mail,true);
		$criteria->compare('b_habilitado',$this->b_habilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EntClientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
