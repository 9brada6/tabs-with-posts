<?php

namespace Debug;

function start_bench( $name ) {
	$start                                   = microtime( true );
	$GLOBALS[ 'brada_start_bench_' . $name ] = $start;
}

function stop_bench_and_dump( $name ) {
	console_dump( stop_bench( $name ), 'Code for ' . $name . ' executed on: ' );
}

function stop_bench( $name ) {
	if ( ! isset( $GLOBALS[ 'brada_start_bench_' . $name ] ) ) {
		return false;
	}
	return microtime( true ) - $GLOBALS[ 'brada_start_bench_' . $name ];
}

function console_dump( $variable, $pre = '' ) {
	echo '<script>';
		echo 'var debug_var = "' . wp_slash( json_encode( $variable ) ) . '";';
		echo "\n";
		echo 'var encoded_var = JSON.parse(debug_var);';
		echo "\n";
		echo 'console.log("' . wp_slash( $pre ) . '");';
		echo "\n";
		echo 'console.dir(encoded_var);';
	echo '</script>';
	echo ' ';
}
