<?php

use yii\db\Migration;

/**
 * Handles the creation of table `adverts`.
 */
class m180414_144638_create_adverts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('adverts', [
            'id' => $this->primaryKey(),
            'id_mark' => $this->integer(),
            'id_model' => $this->integer(),
            'mileage' => $this->integer(),
            'price' => $this->integer(),
            'phone' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('adverts');
    }
}
