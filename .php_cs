<?php

$finder = PhpCsFixer\Finder::create()
	->notPath('bootstrap/cache')
	->notPath('storage')
	->notPath('vendor')
	->notPath('node_modules')
	->notPath('nova')
	->in(__DIR__)
	->name('*.php')
	->notName('*.blade.php')
	->notName('_ide_helper.php')
	->ignoreDotFiles(true)
	->ignoreVCS(true);

return PhpCsFixer\Config::create()
	->setRules([
		'array_syntax' => ['syntax' => 'short'],
		'indentation_type' => true,
		'blank_line_after_opening_tag' => true,
		'declare_strict_types' => true,
		'ordered_imports' => ['sort_algorithm' => 'length'],
		'no_unused_imports' => true,
		'group_import' => true,
	])->setIndent("\t")
	->setFinder($finder);
