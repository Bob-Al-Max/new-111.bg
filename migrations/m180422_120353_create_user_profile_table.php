<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_profile`.
 */
class m180422_120353_create_user_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_profile', [
            'id' => $this->primaryKey(),
            'user_info' => $this->text(),
            'photo' => $this->text()
        ]);
        
        $this->addForeignKey('fk-profile-usr', '{{%user_profile}}', 'id', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-profile-usr', '{{%user_profile}}');
        $this->dropTable('user_profile');
    }
}
