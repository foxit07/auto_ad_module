<?php

use yii\db\Migration;

/**
 * Handles the creation of table `marks`.
 */
class m180414_144425_create_marks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('marks', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('marks');
    }
}
