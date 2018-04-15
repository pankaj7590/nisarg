<?php

use yii\db\Migration;

/**
 * Class m180413_025928_alter_table_feedback_make_surname_nullable
 */
class m180413_025928_alter_table_feedback_make_surname_nullable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->alterColumn('feedback', 'surname', 'string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180413_025928_alter_table_feedback_make_surname_nullable cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180413_025928_alter_table_feedback_make_surname_nullable cannot be reverted.\n";

        return false;
    }
    */
}
