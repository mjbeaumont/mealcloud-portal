<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use app\models\query\UserQuery;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $password
 * @property string $first
 * @property string $last
 * @property string $username
 * @property string $auth_key
 * @property integer $group
 * @property integer $status
 */

class User extends ActiveRecord implements IdentityInterface
{
	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;

	const GROUP_ADMIN = 1;
	const GROUP_OPERATOR = 2;

	public static function tableName()
	{
		return 'user';
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentity($id)
	{
		return static::findOne($id);
	}

	/**
	 * Finds user by password reset token
	 *
	 * @param string $token password reset token
	 * @return static|null
	 */
	public static function findByPasswordResetToken($token)
	{
		if (!static::isPasswordResetTokenValid($token)) {
			return null;
		}
		return static::findOne([
			'password_reset_token' => $token,
			'status' => self::STATUS_ACTIVE,
		]);
	}

	/**
	 * Finds out if password reset token is valid
	 *
	 * @param string $token password reset token
	 * @return bool
	 */
	public static function isPasswordResetTokenValid($token)
	{
		if (empty($token)) {
			return false;
		}
		$timestamp = (int) substr($token, strrpos($token, '_') + 1);
		$expire = \Yii::$app->params['passwordTokenExpiration'];
		return $timestamp + $expire >= time();
	}



	public function rules()
	{
		return [
			['username', 'required'],
			[['password', 'username', 'status', 'group', 'location_id'], 'safe']
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'password' => 'Password',
			'email' => 'Username',
			'status' => 'Account Status',
			'group' => 'User Group',
			'location_id' => 'Location'
		];
	}

	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			if ($this->isNewRecord) {
				$this->auth_key = \Yii::$app->security->generateRandomString();
				$this->hashPassword();
			}
			return true;
		}
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		return static::find()->token($token)->active()->one();
	}

	/**
	 * @inheritdoc
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @inheritdoc
	 */
	public function getAuthKey()
	{
		return $this->auth_key;
	}

	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey)
	{
		return $this->getAuthKey() === $authKey;
	}

	/**
	 * Validates password
	 *
	 * @param string $password password to validate
	 * @return bool if password provided is valid for current user
	 */
	public function validatePassword($password)
	{
		return \Yii::$app->getSecurity()->validatePassword($password, $this->password);
	}

	public function hashPassword()
	{
		$this->password = \Yii::$app->getSecurity()->generatePasswordHash($this->password);
	}

	/**
	 * Generates new password reset token
	 */
	public function generatePasswordResetToken()
	{
		$this->password_reset_token = \Yii::$app->security->generateRandomString() . '_' . time();
	}
	/**
	 * Removes password reset token
	 */
	public function removePasswordResetToken()
	{
		$this->password_reset_token = null;
	}

	public static function find()
	{
		return new UserQuery(static::class);
	}

	public static function findByUsername($username)
	{
		return static::find()->username($username)->active()->one();
	}

}
