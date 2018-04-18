<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cars`.
 */
class m180414_163400_create_cars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cars', [
            'id' => $this->primaryKey(),
            'id_mark' => $this->integer(),
            'id_model' => $this->integer(),
            'mileage' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cars');
    }
}
