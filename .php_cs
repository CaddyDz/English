<?php

$finder = Symfony\Component\Finder\Finder::create()
    ->notPath('bootstrap/cache')
    ->notPath('storage')
    ->notPath('vendor')
    ->notPath('tests')
    ->in(__DIR__)
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$fixers = [
    '-psr2',
    'blank_line_after_namespace',
    'braces',
    'class_definition',
    'elseif',
    'encoding',
    'full_opening_tag',
    'function_declaration',
    'lowercase_constants',
    'lowercase_keywords',
    'method_argument_space',
    'method_visibility_required',
    'no_closing_tag',
    'no_spaces_after_function_name',
    'no_spaces_inside_parenthesis',
    'no_tab_indentation',
    'no_trailing_whitespace',
    'no_trailing_whitespace_in_comment',
    'property_visibility_required',
    'psr4',
    'single_blank_line_at_eof',
    'single_class_element_per_statement',
    'single_import_per_statement',
    'single_line_after_imports',
    'switch_case_semicolon_to_colon',
    'switch_case_space',
    'unix_line_endings',
];

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
    ->fixers($fixers)
    ->finder($finder)
    ->setUsingCache(false);
