<?php

use yii\db\Migration;

/**
 * Handles the creation of table `models`.
 */
class m180414_144613_create_models_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('models', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'id_mark' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('models');
    }
}
