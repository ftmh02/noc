<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_customer".
 *
 * @property int $id
 * @property string $address
 * @property int $tel
 * @property int $popsite
 * @property int $user
 * @property int $service
 *
 * @property Popsite $popsite0
 * @property TypeOfService $service0
 * @property User $user0
 */
class ServiceCustomer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tel', 'popsite', 'user', 'service'], 'integer'],
            [['address'], 'string', 'max' => 45],
            [['popsite'], 'exist', 'skipOnError' => true, 'targetClass' => Popsite::className(), 'targetAttribute' => ['popsite' => 'id']],
            [['service'], 'exist', 'skipOnError' => true, 'targetClass' => TypeOfService::className(), 'targetAttribute' => ['service' => 'id']],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'tel' => 'Tel',
            'popsite' => 'Popsite',
            'user' => 'User',
            'service' => 'Service',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPopsiteIns()
    {
        return $this->hasOne(Popsite::className(), ['id' => 'popsite']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceIns()
    {
        return $this->hasOne(TypeOfService::className(), ['id' => 'service']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIns()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }
}
