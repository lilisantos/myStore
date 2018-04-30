<?php

use yii\db\Migration;

/**
 * Class m180430_133317_orders
 */
class m180430_133317_orders extends Migration
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
        echo "m180430_133317_orders cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey()->notNull(),
            'date' => $this->date()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'total_amount' => $this->double()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull()
        ]);

        //add index/constraint for foreign key user_id
        $this->createIndex(
            'idx-order-user_id',
            'orders',
            'user_id'
        );


        //add foreign key for table user
        $this->addForeignKey(
            'fk-order-user_id',
            'orders',
            'user_id',
            'users',
            'id'
        );

        //add index/constraint for foreign key product_id
        $this->createIndex(
            'idx-order-product_id',
            'orders',
            'product_id'
        );

        //add foreign key for table products
        $this->addForeignKey(
            'fk-order-product_id',
            'orders',
            'product_id',
            'products',
            'id'
        );



    }

    public function down()
    {
        echo "m180430_133317_orders cannot be reverted.\n";

        $this->dropIndex(
            'idx-order-user_id',
            'orders'
        );

        $this->dropForeignKey(
            'fk-order-user_id',
            'orders'
        );

        $this->dropIndex(
            'idx-order-product_id',
            'orders'
        );

        $this->dropForeignKey(
            'fk-order-product_id',
            'orders'
        );

        $this->dropTable('orders');

        return false;
    }

}
