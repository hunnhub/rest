<?php

use humhub\components\Migration;

class m261029_013200_initial extends Migration
{

    public function safeUp()
    {
        $this->safeCreateTable('quicknotes_note', [
            'id' => $this->primaryKey(),
            'message' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->dateTime(),
            'updated_by' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk_quicknotes_note_created_by',
            'quicknotes_note',
            'created_by',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->safeDropTable('quicknotes_note');
    }
}