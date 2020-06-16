<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m200616_151423_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
	        'number' => $this->string(30),
	        'source' => $this->integer(4),
	        'created_at' => $this->integer(11),
	        'updated_at' => $this->integer(11),
	        'date' => $this->integer(11),
	        'type' => $this->integer(1),
	        'location' => $this->integer(11),
	        'name' => $this->string(255),
	        'email' => $this->string(255),
	        'phone' => $this->string(20),
	        'curbside' => $this->integer(1),
	        'utensils' => $this->integer(1),
	        'instructions' => $this->text(),
	        'subtotal' => $this->decimal(8, 2),
	        'tax' => $this->decimal(8, 2),
	        'delivery' => $this->decimal(8, 2),
	        'gratuity' => $this->decimal(8, 2),
	        'total' => $this->decimal(8, 2),
	        'printed' => $this->integer(1),
	        'status' => $this->integer(2)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
