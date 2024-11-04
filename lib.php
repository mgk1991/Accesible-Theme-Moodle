<?php
defined('MOODLE_INTERNAL') || die();

function theme_accth_get_pre_scss($theme) {
    global $CFG;
    return file_get_contents($CFG->dirroot . '/theme/accth/scss/pre.scss');
}

function theme_accth_get_extra_scss($theme) {
    global $CFG;
    return file_get_contents($CFG->dirroot . '/theme/accth/scss/post.scss');
}

function theme_accth_get_main_scss_content($theme) {
    global $CFG;
    
    $scss = '';
    
    $scss .= theme_accth_get_pre_scss($theme);
    
    $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    
    $scss .= theme_accth_get_extra_scss($theme);
    
    return $scss;
}