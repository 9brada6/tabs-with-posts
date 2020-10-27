<?php

declare(strict_types=1);

use Phan\Issue;

$local_config = getcwd() . "/.phan/config.php";
if (file_exists($local_config)) {
    $config = include $local_config;
} else {
    $config = [];
}

return [
    'force_tracking_references' => true,
    'quick_mode' => true,
    'backward_compatibility_checks' => false,
    'disable_plugins' => true,
    'simplify_ast' => false,  // override phan config overrides if they were set.
    'processes' => 1,
    'consistent_hashing_file_order' => false,
    'exclude_analysis_directory_list' => ['.'],
    'analyzed_file_extensions' => $config['analyzed_file_extensions'] ?? ['php'],
    'exclude_file_regex' => $config['exclude_file_regex'] ?? '',
    'exclude_file_list' => ['./inc/Utils.php'],
    'file_list' => $config['file_list'] ?? [],
    'directory_list' => ['./inc'],
    'autoload_internal_extension_signatures' => [],
];
