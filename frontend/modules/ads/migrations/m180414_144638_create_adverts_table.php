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
            'id_car' => $this->integer(),
            'price' => $this->integer(),
            'phone' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
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
