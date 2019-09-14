<?php

use yii\db\Migration;

/**
 * Class m190914_203103_enum
 */
class m190914_203103_enum extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('order',
            'status',
            'ENUM("0","1")'

    );

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
        echo "m190914_203103_enum cannot be reverted.\n";

        return false;
    }
    */
}
