<?php
defined('MOODLE_INTERNAL') || die();

$plugin->component = 'theme_accth';
$plugin->version   = 2024110400;
$plugin->requires  = 2022112800;
$plugin->maturity  = MATURITY_STABLE;
$plugin->release   = 'v1.0.0';
$plugin->dependencies = [
    'theme_boost' => 2022112800
];

$plugin->copyright = '2024 Matías Gabriel Krujoski';
$plugin->license   = 'GPL-3.0-or-later';