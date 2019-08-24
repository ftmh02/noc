<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbltypeOfService".
 *
 * @property int $SID
 * @property string $typeName
 *
 * @property TblServiceCostomer[] $tblServiceCostomers
 */
class TbltypeOfService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbltypeOfService';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typeName'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'SID' => 'Sid',
            'typeName' => 'Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblServiceCostomers()
    {
        return $this->hasMany(TblServiceCostomer::className(), ['sID' => 'SID']);
    }
}
