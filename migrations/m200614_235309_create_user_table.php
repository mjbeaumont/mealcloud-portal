<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m200614_235309_create_user_table extends Migration
{
	/**
	 * @inheritdoc
	 */
	public function up()
	{
		$this->createTable('user', [
			'id' => $this->primaryKey(),
			'username' => $this->string(),
			'password' => $this->string(),
			'auth_key' => $this->string(),
			'location_id' => $this->integer(11),
			'status' => $this->integer(1),
		]);
	}

	/**
	 * @inheritdoc
	 */
	public function down()
	{
		$this->dropTable('user');
	}
}
