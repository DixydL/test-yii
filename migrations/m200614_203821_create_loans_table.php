<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%loans}}`.
 */
class m200614_203821_create_loans_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%loans}}', [
            'id' => $this->primaryKey(),
            'curent_date' => $this->dateTime(),
            'summa' => $this->float(),
            'duration' => $this->integer(),
            'projent_year' => $this->float(),
            'created_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%loans}}');
    }
}
