<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblPopsite".
 *
 * @property int $PID
 * @property string $Name
 * @property string $address
 * @property string $imail
 */
class TblPopsite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblPopsite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'address', 'imail'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PID' => 'Pid',
            'Name' => 'Name',
            'address' => 'Address',
            'imail' => 'Imail',
        ];
    }
}
