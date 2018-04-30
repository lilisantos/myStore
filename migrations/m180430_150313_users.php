<?php

use yii\db\Migration;

/**
 * Class m180430_150313_users
 */
class m180430_150313_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180430_150313_users cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password' => $this->string()->notNull()
        ]);
    }

    public function down()
    {
        echo "m180430_150313_users cannot be reverted.\n";

        $this->dropTable('users');

        return false;
    }

}
