<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/config',
        __DIR__ . '/database/factories',
        __DIR__ . '/database/seeders',
        __DIR__ . '/routes',
        __DIR__ . '/tests',
        __DIR__ . '/resources',
    ]);

$config = new PhpCsFixer\Config();

return $config
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    /**
     * https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/rules/index.rst
     * https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/ruleSets/index.rst
     */
    ->setRules([
        '@PSR12' => true,
        '@PSR12:risky' => true,
        '@PHP80Migration:risky' => true,

        // Alias
        'array_push' => true,
        'ereg_to_preg' => true,
        'no_alias_language_construct_call' => true,
        'pow_to_exponentiation' => true,
        'random_api_migration' => true,
        'set_type_to_cast' => true,

        // Array Notation
        'array_syntax' => ['syntax' => 'short'],
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'no_whitespace_before_comma_in_array' => true,
        'normalize_index_brace' => true,
        'trim_array_spaces' => true,
        'whitespace_after_comma_in_array' => true,

        // Basic
        'braces' => true,
        'encoding' => true,
        'non_printable_character' => true,

        // Casing
        'constant_case' => true,
        'magic_constant_casing' => true,
        'native_function_casing' => true,

        // Cast Notation
        'cast_spaces' => ['space' => 'single'],
        'modernize_types_casting' => true,
        'no_short_bool_cast' => true,

        // Strict
        'declare_strict_types' => true,
        'strict_comparison' => true,
        'strict_param' => true,

        // PHPDoc
        'align_multiline_comment' => true,
        'general_phpdoc_annotation_remove' => ['annotations' => ['class', 'package', 'author']],
        'no_blank_lines_after_phpdoc' => true,
        'no_empty_phpdoc' => true,
        'phpdoc_add_missing_param_annotation' => ['only_untyped' => false],
        'phpdoc_align' => ['tags' => ['param']],
        'phpdoc_annotation_without_dot' => true,
        'phpdoc_indent' => true,
        'phpdoc_no_access' => true,
        'phpdoc_no_empty_return' => true,
        'phpdoc_no_package' => true,
        'phpdoc_order' => true,
        'phpdoc_return_self_reference' => true,
        'phpdoc_scalar' => true,
        'phpdoc_single_line_var_spacing' => true,
        'phpdoc_summary' => false,
        'phpdoc_to_comment' => false,
        'phpdoc_trim' => true,
        'phpdoc_types' => true,
        'phpdoc_types_order' => true,
        'phpdoc_var_without_name' => true,

        // Comment
        'no_empty_comment' => true,
        'single_line_comment_style' => false,

        // Whitespace
        'method_chaining_indentation' => true,
        'no_spaces_around_offset' => true,

        // Semicolon
        'no_empty_statement' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'semicolon_after_instruction' => true,
        'space_after_semicolon' => ['remove_in_empty_for_expressions' => true],

        // String Notation
        'escape_implicit_backslashes' => true,
        'explicit_string_variable' => true,
        'heredoc_to_nowdoc' => true,
        'single_quote' => true,

        // Operator
        'binary_operator_spaces' => true,
        'concat_space' => ['spacing' => 'one'],
        'object_operator_without_whitespace' => true,
        'unary_operator_spaces' => true,
        'standardize_not_equals' => true,
        'ternary_to_null_coalescing' => true,

        // list_syntax
        'list_syntax' => true,

        // Import
        'no_unused_imports' => true,

        // Namespace Notation
        'no_leading_namespace_whitespace' => true,

        // Language Construct
        'dir_constant' => true,
        'explicit_indirect_variable' => true,
        'function_to_constant' => true,

        // Class Notation
        'class_attributes_separation' => ['elements' => [
            'const' => 'none',
            'method' => 'one',
            'property' => 'only_if_meta',
            'trait_import' => 'only_if_meta'
        ]
        ],
        'no_null_property_initialization' => true,
        'protected_to_private' => true,
        'self_accessor' => true,

        // Function Notation
        'return_type_declaration' => ['space_before' => 'none'],
        'void_return' => true,

        // Return Notation
        'simplified_null_return' => true,

        // Control Structure
        'include' => true,
        'no_trailing_comma_in_list_call' => true,
        'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
        'no_unneeded_control_parentheses' => true,
        'no_unneeded_curly_braces' => true,

        // PHPUnit
        'php_unit_construct' => true,
        'php_unit_dedicate_assert' => true,
    ]);
