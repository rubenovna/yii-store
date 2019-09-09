<?php

use yii\db\Migration;

/**
 * Class m190909_122440_order_items
 */
class m190909_122440_order_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('order_items', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'name' => $this->string(25),
            'price' => $this->float(),
            'qty_item' => $this->integer(),
            'sum_item' => $this->float(),


        ]);

        $this->addForeignKey('order_items_order_FK', 'order_items', 'order_id', 'order', 'id');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order_items');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190909_122440_order_items cannot be reverted.\n";

        return false;
    }
    */
}
