<?php

use yii\db\Migration;

/**
 * Class m180330_175450_alter_table_membership_add_column_information
 */
class m180330_175450_alter_table_membership_add_column_information extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->addColumn('membership', 'information', 'text after name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180330_175450_alter_table_membership_add_column_information cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180330_175450_alter_table_membership_add_column_information cannot be reverted.\n";

        return false;
    }
    */
}
