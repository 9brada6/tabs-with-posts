<?php
// phpcs:disable
use Phan\Issue;
use Phan\Config;

/**
 *
 * A Note About Paths
 * ==================
 *
 * Files referenced from this file should be defined as
 *
 * ```
 *   Config::projectPath('relative_path/to/file')
 * ```
 *
 * where the relative path is relative to the root of the
 * project which is defined as either the working directory
 * of the phan executable or a path passed in via the CLI
 * '-d' flag.
 */
return array(

	// Configuring Files
	// =========================================================================


	'analyzed_file_extensions' => array( 'php' ),

	// A list of directories that should be parsed for class and method information. After excluding the directories
	// defined in `exclude_analysis_directory_list`, the remaining files will be statically analyzed for errors.
	//
	// Thus, both first-party and third-party code being used by your application should be included in this list.
	'directory_list' => array(
		'./../../../',
		'./',
	),

	// A directory list that defines files that will be excluded from static analysis, but whose class and method information should be included.
	//
	// n.b.: If you'd like to parse but not analyze 3rd party code, directories containing that code
	// should be added to the `directory_list` as well as to `exclude_analysis_directory_list`.
	'exclude_analysis_directory_list' => array(
		'./../../../',
		'vendor/',
	),

	// A list of files that will be excluded from parsing and analysis and will not be read at all.
	'exclude_file_list' => array(
		'../../../wp-admin/includes/noop.php',
	),

	// A regular expression to match files to be excluded
	// from parsing and analysis and will not be read at all.
	// (\.\./.*tabs-with-recommended-posts|/vendor/|/node_modules/|vendor\\|node_modules\\)
	'exclude_file_regex' => '@.*\/(\.\./.*tabs-with-recommended-posts|vendor|node_modules)\/.*@',

	'file_list' => array(),

	'include_analysis_file_list' => array(),


	// Issue Filtering
	// =========================================================================

	// Set to true in order to ignore file-based issue suppressions.
	'disable_file_based_suppression' => false,

	// Set to true in order to ignore line-based issue suppressions.
	'disable_line_based_suppression' => false,

	// Set to true in order to ignore issue suppression.
	'disable_suppression' => false,

	// @phan-suppress-next-line PhanUndeclaredClassConstant

	'minimum_severity' => Issue::SEVERITY_LOW,

	'suppress_issue_types' => array(
		// 'PhanRedefineClass',
		// 'PhanRedefineFunction',
		// 'PhanRedefinedClassReference',
		// 'PhanRedefinedInheritedInterface',
	),

	'whitelist_issue_types' => array(),


	// Analysis
	// =========================================================================

	'allow_missing_properties' => false,
	'analyze_signature_compatibility' => true,
	'assume_no_external_class_overrides' => false,

	'autoload_internal_extension_signatures' => [],
	// 'cache_polyfill_asts' => false,

	'check_docblock_signature_param_type_match' => true,
	'check_docblock_signature_return_type_match' => true,
	'convert_possibly_undefined_offset_to_nullable' => true,

	'enable_class_alias_support' => false,

	'enable_include_path_checks' => true,

	'enable_internal_return_type_plugins' => true,

	'exception_classes_with_optional_throws_phpdoc'=> [],

	'guess_unknown_parameter_type_using_default' => true,

	'include_paths' => ["."],

	'maximum_recursion_depth' => 3,

	'plugins' => array(
		'AlwaysReturnPlugin',
		'DollarDollarPlugin',
		'DuplicateArrayKeyPlugin',
		// 'DuplicateExpressionPlugin',
		'PregRegexCheckerPlugin',
		// 'PrintfCheckerPlugin',
		'SleepCheckerPlugin',
		'UnreachableCodePlugin',
		'RedundantAssignmentPlugin',
		'UseReturnValuePlugin',
		'EmptyStatementListPlugin',
		'StrictComparisonPlugin',
		'LoopVariableReusePlugin',
	),

	'processes' => 1,

	'quick_mode' => false,

	'simplify_ast' => false,

	'warn_about_relative_include_statement' => false,

	'warn_about_undocumented_throw_statements' => true,
	'warn_about_undocumented_exceptions_thrown_by_invoked_functions' => true,

	// Analysis (Of a PHP Version)
	// =========================================================================

	'polyfill_parse_all_element_doc_comments' => true,

	'target_php_version' => '5.6',
	'backward_compatibility_checks' => true,

	// Type Casting.
	// =========================================================================

	'array_casts_as_null' => false,
	'null_casts_as_any_type' => false,
	'null_casts_as_array' => false,

	'scalar_array_key_cast' => false,
	'scalar_implicit_cast' => false,
	'scalar_implicit_partial' => false,

	'strict_method_checking' => true,
	'strict_object_checking' => true,
	'strict_param_checking' => true,
	'strict_property_checking' => true,
	'strict_return_checking' => true,



	// If true, seemingly undeclared variables in the global
	// scope will be ignored.
	//
	// This is useful for projects with complicated cross-file
	// globals that you have no hope of fixing.
	'ignore_undeclared_variables_in_global_scope'       => false,

	// Set this to false to emit `PhanUndeclaredFunction` issues for internal functions that Phan has signatures for,
	// but aren't available in the codebase, or from Reflection.
	// (may lead to false positives if an extension isn't loaded)
	//
	// If this is true(default), then Phan will not warn.
	//
	// Even when this is false, Phan will still infer return values and check parameters of internal functions
	// if Phan has the signatures.
	'ignore_undeclared_functions_with_known_signatures' => false,


	// Set to true in order to attempt to detect dead
	// (unreferenced) code. Keep in mind that the
	// results will only be a guess given that classes,
	// properties, constants and methods can be referenced
	// as variables (like `$class->$property` or
	// `$class->$method()`) in ways that we're unable
	// to make sense of.
	'dead_code_detection'                               => false,

	// Set to true in order to attempt to detect unused variables.
	// `dead_code_detection` will also enable unused variable detection.
	//
	// This has a few known false positives, e.g. for loops or branches.
	'unused_variable_detection'                         => true,

	// Set to true in order to attempt to detect redundant and impossible conditions.
	//
	// This has some false positives involving loops,
	// variables set in branches of loops, and global variables.
	'redundant_condition_detection'                     => true,
// Documentation about available bundled plugins can be found [here](https://github.com/phan/phan/tree/master/.phan/plugins).

	'prefer_narrowed_phpdoc_param_types' => true,

);
