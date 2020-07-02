<?php
// phpcs:disable

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
		'./vendor'
	),

	// A list of files that will be excluded from parsing and analysis and will not be read at all.
	'exclude_file_list' => array(
		'../../../wp-admin/includes/noop.php',
	),

	// A regular expression to match files to be excluded
	// from parsing and analysis and will not be read at all.
	// (\.\./.*tabs-with-recommended-posts|/vendor/|/node_modules/|vendor\\|node_modules\\)
	// 'exclude_file_regex' => '@.*(\.\./.*tabs-with-recommended-posts|vendor(?!(/phpunit/|\\phpunit\\))|node_modules|wordpress).*@',
	// 'exclude_file_regex' => '@.*(\.\./.*tabs-with-recommended-posts|vendor(?!.*phpunit)|node_modules).*@',
	//'exclude_file_regex' => '@.*(\.\./.*tabs-with-recommended-posts|vendor(?!(/phpunit/|\\phpunit\\))|node_modules|wordpress).*@',
	'exclude_file_regex' => '@.*(\.\./.*tabs-with-recommended-posts|akismet|themes|wordpress|node_modules|vendor/(?!(phpunit|masterminds|/?$))).*@',

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

	'minimum_severity' => 0,

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
	'allow_overriding_vague_return_types' => true,
	'analyze_signature_compatibility' => true,
	'assume_no_external_class_overrides' => false,

	'autoload_internal_extension_signatures' => [],
	// 'cache_polyfill_asts' => false,

	'check_docblock_signature_param_type_match' => true,
	'check_docblock_signature_return_type_match' => true,
	'convert_possibly_undefined_offset_to_nullable' => true,

	// If true, Phan will read class_alias() calls in the global scope, this is experimental.
	'enable_class_alias_support' => false,

	'enable_include_path_checks' => true,

	'enable_extended_internal_return_type_plugins' => true,
	'enable_internal_return_type_plugins' => true,
	'error_prone_truthy_condition_detection' => true,

	'guess_unknown_parameter_type_using_default' => true,

	'include_paths' => ["."],

	'maximum_recursion_depth' => 6,

	'plugins' => array(
		'UnusedSuppressionPlugin',
		'AlwaysReturnPlugin',
		'DuplicateArrayKeyPlugin',
		'PregRegexCheckerPlugin',
		// Todo: write this plugin to accept WP gettext functions.
		// We need just a simple subclass, easy changing.
		// 'PrintfCheckerPlugin',
		'UnreachableCodePlugin',
		'UseReturnValuePlugin',
		// 'PHPUnitAssertionPlugin',
		'EmptyStatementListPlugin',
		'LoopVariableReusePlugin',
		'RedundantAssignmentPlugin',
		// 'UnknownClassElementAccessPlugin', // Todo: issue a warning on github.
		// 'MoreSpecificElementTypePlugin',

		// Greatly increase the false-positive as the doc suggest.
		// 'NonBoolInLogicalArithPlugin',

		// 'HasPHPDocPlugin', // Enable this when not in development.
		'InvalidVariableIssetPlugin', // Warns about invalid uses of isset.
		'NoAssertPlugin', // Discourages the usage of assert() in the analyzed project.
		// 'NotFullyQualifiedUsagePlugin',

		// Enforces that strict equality is used for comparisons to constant/literal integers or strings.
		'StrictLiteralComparisonPlugin',

		// Warn about returning non-arrays in __sleep, as well invalid names.
		'SleepCheckerPlugin',

		// Marks unit tests and dataProviders of subclasses of PHPUnit\Framework\TestCase as referenced.
		'PHPUnitNotDeadCodePlugin',

		// Warns about elements containing unknown types (function/method/closure
		// return types, parameter types). Greatly increase the warnings emitted.
		// 'UnknownElementTypePlugin',

		// This plugin checks for duplicate expressions in a statement that are
		// likely to be a bug. (e.g. expr1 == expr)
		// 'DuplicateExpressionPlugin',

		// This plugin checks for unexpected inline HTML. Totally unneeded, as we
		// write a lot of inline HTML.
		// 'InlineHTMLPlugin',

		// This plugin guesses if arguments to a function call are out of order,
		// based on heuristics on the name in the expression (e.g. variable name).
		'SuspiciousParamOrderPlugin',

		// This plugin suggests using ClassName instead of \My\Ns\ClassName when
		// there is a use My\Ns\ClassName annotation (or for uses in namespace \My\Ns)
		'PreferNamespaceUsePlugin',

		// This plugin warns about non-strict comparisons.
		'StrictComparisonPlugin',

		// This plugin looks for empty methods/functions. But functions that overrides,
		// or must be overridden. Must have a todo tag to not trigger warning.
		'EmptyMethodAndFunctionPlugin',

		// Checks for complex variable access expressions $$x, which may be hard to read.
		'DollarDollarPlugin',

		// Checks for duplicate constant names for calls to define() or
		// const X = within the same statement list.
		// 'DuplicateConstantPlugin', // Does not work in vscode, maybe say something on github?

		// This plugin checks for uses of getters on $this that can be avoided
		// inside of a class. (E.g. calling $this->getFoo() when the property
		// $this->foo is accessible, and there are no known overrides of the getter)
		'AvoidableGetterPlugin'
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
	'unused_variable_detection'                         => false,

	// Set to true in order to attempt to detect redundant and impossible conditions.
	//
	// This has some false positives involving loops,
	// variables set in branches of loops, and global variables.
	'redundant_condition_detection'                     => true,
// Documentation about available bundled plugins can be found [here](https://github.com/phan/phan/tree/master/.phan/plugins).

);
