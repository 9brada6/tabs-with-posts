<?php
// phpcs:disable -- No need for phpcs in config file.

return array(
	'analyzed_file_extensions' => array( 'php' ),
	'directory_list' => array( './' ),
	'exclude_analysis_directory_list' => array( './.stubs' ),
	'exclude_file_regex' => '@.*(\.git|\.svn|node_modules|vendor|tests).*@',


	// Issue Filtering
	// =========================================================================

	// Set to true in order to ignore file-based, line-based, or all issue suppressions.
	'disable_file_based_suppression' => false,
	'disable_line_based_suppression' => false,
	'disable_suppression' => false,

	'minimum_severity' => 0,

	// Suppress this issue because in templates it will make the check:
	// [$artblock instanceof Simple_Article] echo an error.
	'suppress_issue_types' => array( 'PhanImpossibleConditionInGlobalScope' ),


	// Analysis
	// =========================================================================

	'allow_missing_properties' => false,
	'allow_overriding_vague_return_types' => true,
	'analyze_signature_compatibility' => true,
	'assume_no_external_class_overrides' => false,

	'autoload_internal_extension_signatures' => [
		// 'wordpress' => '.stubs/wordpress-stubs.php'
	],
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

	'maximum_recursion_depth' => 4,

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
		// 'InvalidVariableIssetPlugin', // Warns about invalid uses of isset.
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
		// 'AvoidableGetterPlugin'
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

	'ignore_undeclared_variables_in_global_scope'       => false,
	'ignore_undeclared_functions_with_known_signatures' => false,

	'dead_code_detection'                               => false,
	'unused_variable_detection'                         => false,
	'redundant_condition_detection'                     => true,
);
