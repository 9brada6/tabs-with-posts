<?php

namespace Debug;

function start_bench( $name ) {
	$start                                   = microtime( true );
	$GLOBALS[ 'brada_start_bench_' . $name ] = $start;
}

function stop_bench( $name ) {
	if ( ! isset( $GLOBALS[ 'brada_start_bench_' . $name ] ) ) {
		return false;
	}

	$GLOBALS[ 'brada_start_bench_' . $name ] = microtime( true ) - $GLOBALS[ 'brada_start_bench_' . $name ];

	return microtime( true ) - $GLOBALS[ 'brada_start_bench_' . $name ];
}

function dump_bench( $name, $pre = '' ) {
	if ( isset( $GLOBALS[ 'brada_foreach_bench_total_' . $name ] ) ) {
		console_dump( round( $GLOBALS[ 'brada_foreach_bench_total_' . $name ] * 1000, 2 ) . 'ms', $pre );
		console_dump( 'Count: ' . $GLOBALS[ 'brada_foreach_bench_count_' . $name ], $pre );
	} elseif ( isset( $GLOBALS[ 'brada_start_bench_' . $name ] ) ) {
		console_dump( round( $GLOBALS[ 'brada_start_bench_' . $name ] * 1000, 2 ) . 'ms', $pre );
	} else {
		console_dump( 'not run', $pre );
	}

}

function stop_bench_and_dump( $name ) {
	console_dump( stop_bench( $name ), 'Code for ' . $name . ' executed on: ' );
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

function start_foreach_bench( $name ) {
	$start = microtime( true );
	$GLOBALS[ 'brada_start_foreach_bench_' . $name ] = $start;
}

function stop_foreach_bench( $name ) {
	if ( ! isset( $GLOBALS[ 'brada_start_foreach_bench_' . $name ] ) ) {
		return false;
	}

	$time_executed = microtime( true ) - $GLOBALS[ 'brada_start_foreach_bench_' . $name ];

	if ( ! isset( $GLOBALS[ 'brada_foreach_bench_total_' . $name ] ) ) {
		$GLOBALS[ 'brada_foreach_bench_total_' . $name ] = 0;
	}

	if ( ! isset( $GLOBALS[ 'brada_foreach_bench_count_' . $name ] ) ) {
		$GLOBALS[ 'brada_foreach_bench_count_' . $name ] = 0;
	}

	$GLOBALS[ 'brada_foreach_bench_count_' . $name ]++;

	$GLOBALS[ 'brada_foreach_bench_total_' . $name ] += $time_executed;

	return $time_executed;
}
