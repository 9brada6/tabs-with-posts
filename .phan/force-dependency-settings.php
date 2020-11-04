<?php
return array(
	'class_can_depend_on' => array(

		// \TWRP\Database
		// Everything can depend on database classes.
		'/TWRP\\\.*/'                                  => '/\\\TWRP\\\Database\\\.*/',

		// \TWRP\Utils
		// Everything can depend on utils classes.
		'/TWRP\\\.*/'                                  => '/\\\TWRP\\\Utils\\\.*/',

		// TWRP\Admin

		// TWRP\Admin\Tabs


		// TWRP\Admin\General_Settings.
		// Only this tab should depend on the factory.
		'/TWRP\\\Admin\\\Tabs\\\General_Settings_Tab/' => '/TWRP\\\Admin\\\General_Settings\\\General_Settings_Factory/',

		'/TWRP\\\Admin\\\General_Settings\\\General_Select_With_Switch_Setting/' => '/TWRP\\\Admin\\\General_Settings\\\General_Select_Setting/',
		'/TWRP\\\Admin\\\General_Settings\\\.*/'       => '/TWRP\\\Admin\\\General_Settings\\\General_Setting_Creator/',
	),

	// 'class_must_depend_on' => array(
	// '/regex_class_name' => 'another_regex_class_that_the_class_can_depend',
	// ),
);
