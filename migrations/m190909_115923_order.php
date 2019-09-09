<?php

use yii\db\Migration;

/**
 * Class m190909_115923_order
 */
class m190909_115923_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('order',[
             'id' => $this->primaryKey(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
             'qty' => $this->integer(25),
             'sum' =>$this->float(),
             'status' => $this->string(25),
            'name' => $this->string(25),
             'email' => $this->string(25),


             'phone' => $this->string(25),

             'address' => $this->string(55),


   ] );




    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190909_115923_order cannot be reverted.\n";

        return false;
    }
    */
}
