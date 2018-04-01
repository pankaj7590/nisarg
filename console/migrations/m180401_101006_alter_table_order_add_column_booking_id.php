<?php

use yii\db\Migration;

/**
 * Class m180401_101006_alter_table_order_add_column_booking_id
 */
class m180401_101006_alter_table_order_add_column_booking_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->addColumn('order', 'booking_id', 'integer after customer_id');
		$this->addForeignKey('fk_order_booking', 'order', 'booking_id', 'booking', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180401_101006_alter_table_order_add_column_booking_id cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180401_101006_alter_table_order_add_column_booking_id cannot be reverted.\n";

        return false;
    }
    */
}
