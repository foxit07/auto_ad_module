<?php

use yii\db\Migration;

/**
 * Handles the creation of table `adverts_options`.
 */
class m180414_150653_create_adverts_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('adverts_options', [
            'id' => $this->primaryKey(),
            'id_advert' => $this->integer(),
            'id_option' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('adverts_options');
    }
}
