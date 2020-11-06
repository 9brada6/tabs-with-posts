<?php

function test_phpcs() {
	$test = array(
		'something'  => 'something',
		'something2' => 'something2',
		'again_a_somewhat_very_long_long_long_long_array_key' => '',
		Some_Class_Name::ALIGNMENT_WILL_NOT_WORK_ITS_TOO_LONG => '',
	);
}
