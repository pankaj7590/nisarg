<?php

use yii\db\Migration;

/**
 * Class m180401_072849_alter_table_booking_add_column_phone
 */
class m180401_072849_alter_table_booking_add_column_phone extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->addColumn('booking', 'phone', 'varchar(15) not null after surname');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180401_072849_alter_table_booking_add_column_phone cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180401_072849_alter_table_booking_add_column_phone cannot be reverted.\n";

        return false;
    }
    */
}
