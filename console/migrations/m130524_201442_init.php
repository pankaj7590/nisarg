<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
		
		$this->createTable("media",[
			'id' => $this->primaryKey(),
			'media_type' => $this->smallInteger(4),
			'alt' => $this->string(255),
			'file_name' => $this->string(255),
			'file_type' => $this->string(45),
			'file_size' => $this->integer(10),
			'status' => $this->smallInteger(),
			'created_at' => $this->integer(11),
			'updated_at' => $this->integer(11),
		], $tableOptions);

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
			'profile_picture' => $this->integer(),
            'name' => $this->string()->notNull(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'phone' => $this->string(20)->notNull(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
		
		$this->addForeignKey('fk_user_media', 'user', 'profile_picture', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_user_user_created_by', 'user', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_user_user_updated_by', 'user', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("room_type", [
			'id' => $this->primaryKey(),
			'cover_image' => $this->integer(),
			'name' => $this->string()->notNull(),
			'description' => $this->text(),
			'charges' => $this->double()->notNull(),
			'occupancy' => $this->integer(),
			'beds' => $this->integer(),
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_room_type_media', 'room_type', 'cover_image', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_room_type_user_created_by', 'room_type', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_room_type_user_updated_by', 'room_type', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("room", [
			'id' => $this->primaryKey(),
			'cover_image' => $this->integer(),
			'name' => $this->string()->notNull(),
			'description' => $this->text(),
			'type' => $this->integer(),
			'charges' => $this->double()->notNull(),
			'occupancy' => $this->integer(),
			'beds' => $this->integer(),
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_room_media', 'room', 'cover_image', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_room_room_type', 'room', 'type', 'room_type', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_room_user_created_by', 'room', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_room_user_updated_by', 'room', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("facility_type", [
			'id' => $this->primaryKey(),
			'icon_image' => $this->integer(),
			'cover_image' => $this->integer(),
			'name' => $this->string()->notNull(),
			'description' => $this->text(),
			'charges' => $this->double(),
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_facility_type_media_icon', 'facility_type', 'icon_image', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_facility_type_media_cover', 'facility_type', 'cover_image', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_facility_type_user_created_by', 'facility_type', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_facility_type_user_updated_by', 'facility_type', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("facility", [
			'id' => $this->primaryKey(),
			'type' => $this->integer(),
			'icon_image' => $this->integer(),
			'cover_image' => $this->integer(),
			'name' => $this->string()->notNull(),
			'description' => $this->text(),
			'charges' => $this->double(),
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_facility_facility_type', 'facility', 'type', 'facility_type', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_facility_media_icon', 'facility', 'icon_image', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_facility_media_cover', 'facility', 'cover_image', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_facility_user_created_by', 'facility', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_facility_user_updated_by', 'facility', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("customer", [
            'id' => $this->primaryKey(),
			'profile_picture' => $this->integer(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'phone' => $this->string(20)->notNull(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_customer_media', 'customer', 'profile_picture', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_customer_user_created_by', 'customer', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_customer_user_updated_by', 'customer', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("booking", [
			'id' => $this->primaryKey(),
			'customer_id' => $this->integer()->notNull(),
			'name' => $this->string()->notNull(),
			'surname' => $this->string()->notNull(),
			'email' => $this->string(),
			'checkin_date' => $this->integer(),
			'checkout_date' => $this->integer(),
			'booking_type' => $this->smallInteger(),
			'room_type' => $this->integer(),
			'facility_type' => $this->integer(),
			'adults' => $this->integer(),
			'children' => $this->integer(),
			'rooms' => $this->integer(),
			'message' => $this->text(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_booking_customer', 'booking', 'customer_id', 'customer', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_booking_room_type', 'booking', 'room_type', 'room_type', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_booking_facility_type', 'booking', 'facility_type', 'facility_type', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_booking_user_created_by', 'booking', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_booking_user_updated_by', 'booking', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("membership", [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull(),
			'type' => $this->smallInteger()->notNull(),
			'discount' => $this->double()->notNull(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_membership_user_created_by', 'membership', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_membership_user_updated_by', 'membership', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("membership_customer", [
			'id' => $this->primaryKey(),
			'membership_id' => $this->integer()->notNull(),
			'customer_id' => $this->integer()->notNull(),
			'type' => $this->smallInteger()->notNull(),
			'from_date' => $this->integer()->notNull(),
			'to_date' => $this->integer()->notNull(),
			'discount' => $this->double()->notNull(),
			'charges' => $this->double()->notNull(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_membership_customer_customer', 'membership_customer', 'customer_id', 'customer', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_membership_customer_membership', 'membership_customer', 'membership_id', 'membership', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_membership_customer_user_created_by', 'membership_customer', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_membership_customer_user_updated_by', 'membership_customer', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("order", [
			'id' => $this->primaryKey(),
			'customer_id' => $this->integer()->notNull(),
			'discount' => $this->double(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_order_customer', 'order', 'customer_id', 'customer', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_order_user_created_by', 'order', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_order_user_updated_by', 'order', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("order_component", [
			'id' => $this->primaryKey(),
			'order_id' => $this->integer()->notNull(),
			'room_id' => $this->integer(),
			'facility_id' => $this->integer(),
			'charges' => $this->double()->notNull(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_order_component_order', 'order_component', 'order_id', 'order', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_order_component_room', 'order_component', 'room_id', 'room', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_order_component_facility', 'order_component', 'facility_id', 'facility', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_order_component_user_created_by', 'order_component', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_order_component_user_updated_by', 'order_component', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("feedback", [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull(),
			'surname' => $this->string()->notNull(),
			'email' => $this->string(),
			'feedback_type' => $this->smallInteger(),
			'room_type' => $this->integer(),
			'facility_type' => $this->integer(),
			'message' => $this->text(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		
		$this->createTable("gallery", [
			'id' => $this->primaryKey(),
			'name' => $this->string(),
			'description' => $this->text(),
			'type' => $this->smallInteger(),
			'room_id' => $this->integer(),
			'facility_id' => $this->integer(),
			'room_type_id' => $this->integer(),
			'facility_type_id' => $this->integer(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_gallery_room', 'gallery', 'room_id', 'room', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_gallery_facility', 'gallery', 'facility_id', 'facility', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_gallery_room_type', 'gallery', 'room_type_id', 'room_type', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_gallery_facility_type', 'gallery', 'facility_type_id', 'facility_type', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_gallery_user_created_by', 'gallery', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_gallery_user_updated_by', 'gallery', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("gallery_media", [
			'id' => $this->primaryKey(),
			'gallery_id' => $this->integer()->notNull(),
			'media_id' => $this->integer()->notNull(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_gallery_media_gallery', 'gallery_media', 'gallery_id', 'gallery', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_gallery_media_media', 'gallery_media', 'media_id', 'media', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_gallery_media_user_created_by', 'gallery_media', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_gallery_media_user_updated_by', 'gallery_media', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("setting", [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull()->unique(),
			'label' => $this->string()->notNull(),
			'default_value' => $this->text()->notNull(),
			'value' => $this->text()->notNull(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_setting_user_created_by', 'setting', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_setting_user_updated_by', 'setting', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
