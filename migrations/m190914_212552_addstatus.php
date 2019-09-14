<?php

use yii\db\Migration;

/**
 * Class m190914_212552_addstatus
 */
class m190914_212552_addstatus extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
$this->addColumn('order',
            'status',
            'ENUM("0","1")');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('order',
     'status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190914_212552_addstatus cannot be reverted.\n";

        return false;
    }
    */
}
