<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cars_options`.
 */
class m180414_150653_create_cars_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cars_options', [
            'id' => $this->primaryKey(),
            'id_car' => $this->integer(),
            'id_option' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cars_options');
    }
}
