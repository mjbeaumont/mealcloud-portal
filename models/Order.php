<?php

namespace app\models;

use Yii;
use yii\base\InvalidValueException;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string|null $number
 * @property int|null $source
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $date
 * @property int|null $type
 * @property int|null $location
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $curbside
 * @property int|null $utensils
 * @property string|null $instructions
 * @property float|null $subtotal
 * @property float|null $tax
 * @property float|null $delivery
 * @property float|null $gratuity
 * @property float|null $total
 * @property int|null $printed
 * @property int|null $status
 */
class Order extends \yii\db\ActiveRecord
{

	CONST STATUS_NEW = 0;
	CONST STATUS_PROCESSING = 1;
	CONST STATUS_DELIVERING = 2;
	CONST STATUS_COMPLETED = 3;
	CONST STATUS_CANCELLED = 4;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['source', 'created_at', 'updated_at', 'date', 'type', 'location', 'curbside', 'utensils', 'printed', 'status'], 'integer'],
            [['instructions'], 'string'],
            [['subtotal', 'tax', 'delivery', 'gratuity', 'total'], 'number'],
            [['number'], 'string', 'max' => 30],
            [['name', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'source' => 'Source',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'date' => 'Date',
            'type' => 'Type',
            'location' => 'Location',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'curbside' => 'Curbside',
            'utensils' => 'Utensils',
            'instructions' => 'Instructions',
            'subtotal' => 'Subtotal',
            'tax' => 'Tax',
            'delivery' => 'Delivery',
            'gratuity' => 'Gratuity',
            'total' => 'Total',
            'printed' => 'Printed',
            'status' => 'Status',
        ];
    }

    /**
     * {@inheritdoc}
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderQuery(get_called_class());
    }

    public function getStatusDescription()
    {
    	switch ($this->status) {
		    case self::STATUS_NEW:
		    	return "New";
		    	break;
		    case self::STATUS_PROCESSING:
		    	return "In Process";
		    	break;
		    case self::STATUS_DELIVERING:
		    	return "Out for Delivery";
		    	break;
		    case self::STATUS_COMPLETED:
		    	return "Completed";
		    	break;
		    case self::STATUS_CANCELLED:
		    	return "Cancelled";
		    	break;
		    default:
		    	throw new InvalidValueException("Status should match a class constant in app\models\Order", 500);
		    	break;
	    }

    }
}
