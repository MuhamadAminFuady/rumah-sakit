<?php

/**
 * This is the model class for table "pasien".
 *
 * The followings are the available columns in table 'pasien':
 * @property string $kd_pasien
 * @property string $nama_pasien
 * @property string $jenis_kelamin
 * @property string $gol_darah
 * @property string $umur
 * @property string $alamat
 */
class Pasien extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pasien';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kd_pasien, nama_pasien, jenis_kelamin, gol_darah, umur, alamat', 'required'),
			array('kd_pasien', 'length', 'max'=>6),
			array('nama_pasien, alamat', 'length', 'max'=>50),
			array('jenis_kelamin', 'length', 'max'=>5),
			array('gol_darah, umur', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('kd_pasien, nama_pasien, jenis_kelamin, gol_darah, umur, alamat', 'safe', 'on'=>'search'),
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
                            'pasiens' => array(self::BELONGS_TO,'Pasien','kd_pasien')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kd_pasien' => 'Kd Pasien',
			'nama_pasien' => 'Nama Pasien',
			'jenis_kelamin' => 'Jenis Kelamin',
			'gol_darah' => 'Gol Darah',
			'umur' => 'Umur',
			'alamat' => 'Alamat',
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

		$criteria->compare('kd_pasien',$this->kd_pasien,true);
		$criteria->compare('nama_pasien',$this->nama_pasien,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('gol_darah',$this->gol_darah,true);
		$criteria->compare('umur',$this->umur,true);
		$criteria->compare('alamat',$this->alamat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pasien the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
