<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property int|null $auto_send
 * @property int|null $pickup_time
 * @property int|null $delivery_time
 * @property int|null $snooze
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auto_send', 'pickup_time', 'delivery_time', 'snooze'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auto_send' => 'Auto Send to Kitchen',
            'pickup_time' => 'Pickup Time',
            'delivery_time' => 'Delivery Time',
            'snooze' => 'Snooze',
        ];
    }
}
