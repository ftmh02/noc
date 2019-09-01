<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_popsite".
 *
 * @property int $id
 * @property int $service_id
 * @property int $popsite_id
 * @property int $is_used
 *
 * @property Popsite $popsite
 * @property TypeOfService $service-
 */
class ServicePopsite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_popsite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'popsite_id', 'is_used'], 'integer'],
            [['popsite_id'], 'exist', 'skipOnError' => true, 'targetClass' => Popsite::className(), 'targetAttribute' => ['popsite_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeOfService::className(), 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Service ID',
            'popsite_id' => 'Popsite ID',
            'is_used' => 'Is Used',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPopsite()
    {
        return $this->hasOne(Popsite::className(), ['id' => 'popsite_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(TypeOfService::className(), ['id' => 'service_id']);
    }
}
