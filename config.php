<?php
defined('MOODLE_INTERNAL') || die();

$THEME->name = 'accth';
$THEME->parents = ['boost'];
$THEME->sheets = [];
$THEME->scss = function($theme) {
    return theme_accth_get_main_scss_content($theme);
};
$THEME->prescsscallback = 'theme_accth_get_pre_scss';
$THEME->extrascsscallback = 'theme_accth_get_extra_scss';
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->haseditswitch = true;