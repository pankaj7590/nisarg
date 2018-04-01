<?php

use yii\db\Migration;

/**
 * Class m180401_072610_alter_table_booking_make_surname_nullable
 */
class m180401_072610_alter_table_booking_make_surname_nullable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->alterColumn('booking', 'surname', 'string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180401_072610_alter_table_booking_make_surname_nullable cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180401_072610_alter_table_booking_make_surname_nullable cannot be reverted.\n";

        return false;
    }
    */
}
