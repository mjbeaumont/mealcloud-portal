<?php

namespace app\models\query;

use app\models\User;

/**
 * This is the ActiveQuery class for [[User]].
 *
 * @see User
 */
class UserQuery extends \yii\db\ActiveQuery
{
	public function active()
	{
		return $this->andWhere(['status' => User::STATUS_ACTIVE]);
	}

	public function username($username)
	{
		return $this->andWhere(['username' => $username]);
	}

	public function token($token)
	{
		return $this->andWhere(['auth_key' => $token]);
	}

	/**
	 * @inheritdoc
	 * @return User[]|array
	 */
	public function all($db = null)
	{
		return parent::all($db);
	}

	/**
	 * @inheritdoc
	 * @return User|array|null
	 */
	public function one($db = null)
	{
		return parent::one($db);
	}
}
