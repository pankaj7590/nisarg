<?php

use yii\db\Migration;
use common\models\Setting;

/**
 * Class m180413_030233_insert_settings
 */
class m180413_030233_insert_settings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		//add column setting_group
		$this->addColumn('setting', 'setting_group', 'smallint after id');
		
		//make value and default value as nullable
		$this->alterColumn('setting', 'value', 'text');
		$this->alterColumn('setting', 'default_value', 'text');
		
		//logo
		$this->insert('setting', ['name' => 'menu_bar_logo','label' => 'Menu Bar Logo','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HEADER]);
		$this->insert('setting', ['name' => 'menu_bar_logo_link','label' => 'Menu Bar Logo Link','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HEADER]);
		
		//home page slider images
		$this->insert('setting', ['name' => 'slider_images','label' => 'Slider Images','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'slider_text','label' => 'Slider Text','default_value' => "It's where dreams come true",'value' => "It's where dreams come true",'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		
		//home page feature images and titles
		$this->insert('setting', ['name' => 'feature_image_1','label' => 'Feature Image 1','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'feature_title_1','label' => 'Feature Title 1','default_value' => 'Astonishing view','value' => 'Astonishing view','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'feature_image_2','label' => 'Feature Image 2','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'feature_title_2','label' => 'Feature Title 2','default_value' => 'Wellness and spa','value' => 'Wellness and spa','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'feature_image_3','label' => 'Feature Image 3','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'feature_title_3','label' => 'Feature Title 3','default_value' => 'Romantic dinner','value' => 'Romantic dinner','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		
		//home page welcome section
		$this->insert('setting', ['name' => 'welcome_title','label' => 'Welcome Section Title','default_value' => 'Welcome to the BE HOTEL','value' => 'Welcome to the BE HOTEL','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'welcome_subtitle','label' => 'Welcome Section Subtitle','default_value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud','value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'welcome_content','label' => 'Welcome Section Content','default_value' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod magni dolores eos qui ratione volui nesciunt. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.','value' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod magni dolores eos qui ratione volui nesciunt. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'welcome_button_text','label' => 'Welcome Section Button Text','default_value' => 'Book your room','value' => 'Book your room','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'welcome_button_link','label' => 'Welcome Section Button Link','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		
		//home page locallization and attractions images
		$this->insert('setting', ['name' => 'localization_title','label' => 'Localization Section Title','default_value' => "Localization and attractions",'value' => "Localization and attractions",'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'localization_images','label' => 'Slider Images','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		
		//home page services section
		$this->insert('setting', ['name' => 'services_title','label' => 'Services Section Title','default_value' => "Services and standards",'value' => "Services and standards",'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'services_content','label' => 'Services Section Content','default_value' => "Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore ausmod tempor incididunt ut labore et dolore. Proin eget tellus tristique lacinia erat non.",'value' => "Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore ausmod tempor incididunt ut labore et dolore. Proin eget tellus tristique lacinia erat non.",'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		
		$this->insert('setting', ['name' => 'service_icon_1','label' => 'Service Icon 1','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'service_title_1','label' => 'Service Title 1','default_value' => 'Exclusive interior','value' => 'Exclusive interior','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'service_content_1','label' => 'Service Content 1','default_value' => 'Nullam interdum pellentesque orci at luctus. Vivamus scelerisque purus et auctor iaculis. Curabitur molestie ut neque non egestas. Nulla et tempor nibh, et sed. Vestibulum lacinia erat non nibh feugiat dignis.','value' => 'Nullam interdum pellentesque orci at luctus. Vivamus scelerisque purus et auctor iaculis. Curabitur molestie ut neque non egestas. Nulla et tempor nibh, et sed. Vestibulum lacinia erat non nibh feugiat dignis.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		
		$this->insert('setting', ['name' => 'service_icon_2','label' => 'Service Icon 2','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'service_title_2','label' => 'Service Title 2','default_value' => 'Exclusive interior','value' => 'Exclusive interior','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'service_content_2','label' => 'Service Content 2','default_value' => 'Nullam interdum pellentesque orci at luctus. Vivamus scelerisque purus et auctor iaculis. Curabitur molestie ut neque non egestas. Nulla et tempor nibh, et sed. Vestibulum lacinia erat non nibh feugiat dignis.','value' => 'Nullam interdum pellentesque orci at luctus. Vivamus scelerisque purus et auctor iaculis. Curabitur molestie ut neque non egestas. Nulla et tempor nibh, et sed. Vestibulum lacinia erat non nibh feugiat dignis.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		
		$this->insert('setting', ['name' => 'service_icon_3','label' => 'Service Icon 3','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'service_title_3','label' => 'Service Title 3','default_value' => 'Exclusive interior','value' => 'Exclusive interior','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'service_content_3','label' => 'Service Content 3','default_value' => 'Nullam interdum pellentesque orci at luctus. Vivamus scelerisque purus et auctor iaculis. Curabitur molestie ut neque non egestas. Nulla et tempor nibh, et sed. Vestibulum lacinia erat non nibh feugiat dignis.','value' => 'Nullam interdum pellentesque orci at luctus. Vivamus scelerisque purus et auctor iaculis. Curabitur molestie ut neque non egestas. Nulla et tempor nibh, et sed. Vestibulum lacinia erat non nibh feugiat dignis.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		
		$this->insert('setting', ['name' => 'service_icon_4','label' => 'Service Icon 4','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'service_title_4','label' => 'Service Title 4','default_value' => 'Exclusive interior','value' => 'Exclusive interior','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'service_content_4','label' => 'Service Content 4','default_value' => 'Nullam interdum pellentesque orci at luctus. Vivamus scelerisque purus et auctor iaculis. Curabitur molestie ut neque non egestas. Nulla et tempor nibh, et sed. Vestibulum lacinia erat non nibh feugiat dignis.','value' => 'Nullam interdum pellentesque orci at luctus. Vivamus scelerisque purus et auctor iaculis. Curabitur molestie ut neque non egestas. Nulla et tempor nibh, et sed. Vestibulum lacinia erat non nibh feugiat dignis.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		
		$this->insert('setting', ['name' => 'service_icon_5','label' => 'Service Icon 5','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'service_title_5','label' => 'Service Title 5','default_value' => 'Exclusive interior','value' => 'Exclusive interior','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'service_content_5','label' => 'Service Content 5','default_value' => 'Nullam interdum pellentesque orci at luctus. Vivamus scelerisque purus et auctor iaculis. Curabitur molestie ut neque non egestas. Nulla et tempor nibh, et sed. Vestibulum lacinia erat non nibh feugiat dignis.','value' => 'Nullam interdum pellentesque orci at luctus. Vivamus scelerisque purus et auctor iaculis. Curabitur molestie ut neque non egestas. Nulla et tempor nibh, et sed. Vestibulum lacinia erat non nibh feugiat dignis.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		
		$this->insert('setting', ['name' => 'service_icon_6','label' => 'Service Icon 6','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'service_title_6','label' => 'Service Title 6','default_value' => 'Exclusive interior','value' => 'Exclusive interior','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'service_content_6','label' => 'Service Content 6','default_value' => 'Nullam interdum pellentesque orci at luctus. Vivamus scelerisque purus et auctor iaculis. Curabitur molestie ut neque non egestas. Nulla et tempor nibh, et sed. Vestibulum lacinia erat non nibh feugiat dignis.','value' => 'Nullam interdum pellentesque orci at luctus. Vivamus scelerisque purus et auctor iaculis. Curabitur molestie ut neque non egestas. Nulla et tempor nibh, et sed. Vestibulum lacinia erat non nibh feugiat dignis.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		
		//book a room section content
		$this->insert('setting', ['name' => 'book_a_room_section_content','label' => 'Book A Room Section Content','default_value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exommodo consequat.','value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exommodo consequat.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		
		//home page map address or coordinates and marker icon
		$this->insert('setting', ['name' => 'map_address','label' => 'Map Coordinates','default_value' => '-33.8710, 151.2039','value' => '-33.8710, 151.2039','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'map_address_marker','label' => 'Map Marker','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		
		//home page address, email and phone
		$this->insert('setting', ['name' => 'address','label' => 'Address','default_value' => 'Level 13, 2 Elizabeth St, Melbourne, Victoria 3000 Australia','value' => 'Level 13, 2 Elizabeth St, Melbourne, Victoria 3000 Australia','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'phone','label' => 'Phone','default_value' => '+8956 617 443','value' => '+8956 617 443','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		$this->insert('setting', ['name' => 'email','label' => 'Email','default_value' => 'pankaj@salokhe.in','value' => 'pankaj@salokhe.in','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HOME]);
		
		//copyright text after current year and icon
		$this->insert('setting', ['name' => 'footer_copyright','label' => 'Footer Copyright','default_value' => 'Resort','value' => 'Resort','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_FOOTER]);
		$this->insert('setting', ['name' => 'footer_icon','label' => 'Footer Icon','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_FOOTER]);
		
		//about page title
		$this->insert('setting', ['name' => 'about_title','label' => 'About Page Title','default_value' => 'About the hotel','value' => 'About the hotel','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_ABOUT]);
		
		//about page content section
		$this->insert('setting', ['name' => 'about_page_content_title','label' => 'About Page Content Section Title','default_value' => 'Lorem ipsum dolor mit samet et omni','value' => 'Welcome to the BE HOTEL','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_ABOUT]);
		$this->insert('setting', ['name' => 'about_page_content_subtitle','label' => 'About Page Content Section Sub Title','default_value' => 'Sed hendrerit risus a ante elementum, vitae blandit nibh eleifend. Nulla interdum auctor elit ut elementum. In cursus, tellus nec eleifend dapibus, sem posuere. In tincidunt; tellus ac hendrerit pretium, urna libero malesuada eros, vestibulum sagittis quam magna ac velit.','value' => 'Sed hendrerit risus a ante elementum, vitae blandit nibh eleifend. Nulla interdum auctor elit ut elementum. In cursus, tellus nec eleifend dapibus, sem posuere. In tincidunt; tellus ac hendrerit pretium, urna libero malesuada eros, vestibulum sagittis quam magna ac velit.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_ABOUT]);
		$this->insert('setting', ['name' => 'about_page_content_content','label' => 'About Page Content','default_value' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodm aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam vfugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem apeluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.

Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodm aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam vfugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.

Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem apeluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.','value' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodm aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam vfugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem apeluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.

Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodm aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam vfugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.

Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem apeluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_ABOUT]);

		//about page images
		$this->insert('setting', ['name' => 'about_page_image_1','label' => 'About Page Image 1','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_ABOUT]);
		$this->insert('setting', ['name' => 'about_page_image_2','label' => 'About Page Image 2','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_ABOUT]);
		
		//about page second section
		$this->insert('setting', ['name' => 'about_page_second_section_icon','label' => 'Icon','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_ABOUT]);
		$this->insert('setting', ['name' => 'about_page_second_section_title','label' => 'Title','default_value' => 'Duis auteat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id laborum edut perspiciatiau dantium totam.','value' => 'Duis auteat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id laborum edut perspiciatiau dantium totam.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_ABOUT]);
		$this->insert('setting', ['name' => 'about_page_second_section_subtitle','label' => 'Sub Title','default_value' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodm aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam vfugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.','value' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodm aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam vfugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_ABOUT]);
		$this->insert('setting', ['name' => 'about_page_second_section_content','label' => 'Content','default_value' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem apeluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.

Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut et nunc at nibh egestas ultrices dictum a dolor? Quisque turpis duis.

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut posuere mattis mi eu condimentum. Praesent ornare, elit eu cursus commodo, arcu metus facilisis sed. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.

Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.','value' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem apeluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.

Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut et nunc at nibh egestas ultrices dictum a dolor? Quisque turpis duis.

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut posuere mattis mi eu condimentum. Praesent ornare, elit eu cursus commodo, arcu metus facilisis sed. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.

Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione volui nesciunt.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_ABOUT]);
		
		
		//social links
		$this->insert('setting', ['name' => 'facebook','label' => 'Facebook','default_value' => 'https://www.facebook.com/','value' => 'https://www.facebook.com/','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HEADER]);
		$this->insert('setting', ['name' => 'twitter','label' => 'Twitter','default_value' => 'https://twitter.com/','value' => 'https://twitter.com/','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HEADER]);
		$this->insert('setting', ['name' => 'gplus','label' => 'Google Plus','default_value' => 'https://plus.google.com/','value' => 'https://plus.google.com/','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HEADER]);
		$this->insert('setting', ['name' => 'pinterest','label' => 'Pinterest','default_value' => 'https://in.pinterest.com/','value' => 'https://in.pinterest.com/','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HEADER]);
		$this->insert('setting', ['name' => 'instagram','label' => 'Instagram','default_value' => 'https://www.instagram.com/','value' => 'https://www.instagram.com/','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(), 'setting_group' => Setting::GROUP_HEADER]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180413_030233_insert_settings cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180413_030233_insert_settings cannot be reverted.\n";

        return false;
    }
    */
}
