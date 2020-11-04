<?php


function get_force_dependency_settings() {
	$cwd  = \getcwd();
	$file = $cwd . '/.phan/force-dependency-settings.php';

	if ( ! file_exists( $file ) ) {
		echo 'File: ' . $file . 'does not exist';
	}

	$settings = require $file;

	return $settings;
}

function get_phan_pdep_analyzer() {
	$cwd  = \getcwd();
	$pdep = shell_exec( 'php ' . $cwd . '/vendor/phan/phan/tool/pdep -j' );

	$json = json_decode( $pdep );
	return $json;
}


$settings = get_force_dependency_settings();

$pdep_json              = get_phan_pdep_analyzer();
$class_dependency_array = get_class_dependency( $pdep_json );

$classes_violations = get_class_graph_violations( $class_dependency_array, $settings );

var_dump( $classes_violations );

// Class Graph violation.

function get_class_graph_violations( $dependency_array, $settings ) {

	foreach ( $settings['class_can_depend_on'] as $classes_regex => $classes_that_can_be_dependency_regex ) {
		foreach ( $dependency_array as $class_that_depends => $classes_to_depends ) {
			if ( preg_match( $classes_regex, $class_that_depends ) ) {
				foreach ( $classes_to_depends as $key => $class_to_depends ) {
					if ( preg_match( $classes_that_can_be_dependency_regex, $class_to_depends ) ) {
						unset( $dependency_array[ $class_that_depends ][ $key ] );
					}
				}
			}
		}
	}

	return $dependency_array;
}

// old
function get_class_graph_violations2( $dependency_array, $settings ) {

	foreach ( $settings['class_can_depend_on'] as $classes_regex => $classes_that_can_be_dependency_regex ) {

		foreach ( $dependency_array as $class_that_depends => $classes_to_depends ) {

			if ( preg_match( $classes_regex, $class_that_depends ) ) {
				foreach ( $classes_to_depends as $class_to_depends ) {
					if ( ! preg_match( $classes_that_can_be_dependency_regex, $class_to_depends ) ) {
						echo 'Violation: class ' . $class_that_depends . 'must not depend on class ' . $class_to_depends . PHP_EOL;
					}
				}
			}
		}
	}
}

// Utils:

function get_class_dependency( $pdep_json ) {
	$class_dependency_json = $pdep_json->cgraph;
	$class_dependency      = inverse_array_graph( $class_dependency_json );
	return $class_dependency;
}


function inverse_array_graph( $graph_array ) {
	$inverse_array = array();

	foreach ( $graph_array as $class_to_depend => $array_of_classes_that_depends ) {
		// $array_of_classes_that_depends = array_keys( $array_of_classes_that_depends );
		foreach ( $array_of_classes_that_depends as $class_that_depend => $uninmportant_value ) {
			if ( ! isset( $inverse_array[ $class_that_depend ] ) ) {
				$inverse_array[ $class_that_depend ] = array();
			}

			array_push( $inverse_array[ $class_that_depend ], $class_to_depend );
		}
	}

	return $inverse_array;
}

/**
 * For a given array, get only the values where the keys match a given regex.
 *
 * @return array
 */
// function get_array_with_only_keys_that_match( $array_to_search, $key_regex ) {
// $array_with_keys_that_match = array();
// foreach ( $array_to_search as $key => $value ) {
// if ( preg_match( $key_regex, $key ) ) {
// $array_with_keys_that_match[ $key ] = $value;
// }
// }

// return $array_with_keys_that_match;
// }
