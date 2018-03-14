<?php

use yii\db\Migration;

/**
 * Class m180210_040655_create_table_news_event
 */
class m180210_040655_create_table_news_event extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
		
		$this->createTable("news_event", [
			'id' => $this->primaryKey(),
			'title' => $this->string()->notNull(),
			'content' => $this->text()->notNull(),
			'photo' => $this->integer(),
			'news_event_date' => $this->integer(),
			'type' => $this->smallInteger(),
			'place' => $this->text(),
			
			'status' => $this->smallInteger(),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		], $tableOptions);
		
		$this->addForeignKey('fk_news_event_photo', 'news_event', 'photo', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_news_event_user_created_by', 'news_event', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_news_event_user_updated_by', 'news_event', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180210_040655_create_table_news_event cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180210_040655_create_table_news_event cannot be reverted.\n";

        return false;
    }
    */
}
