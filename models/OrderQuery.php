<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Order]].
 *
 * @see Order
 */
class OrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

	public function new()
	{
		return $this->andWhere(['status' => Order::STATUS_NEW]);
	}

	public function inProgress()
	{
		return $this->andWhere(['status' => Order::STATUS_PROCESSING]);
	}

	public function completed()
	{
		return $this->andWhere(['status' => Order::STATUS_COMPLETED]);
	}

    /**
     * {@inheritdoc}
     * @return Order[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Order|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
