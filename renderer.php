<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/theme/boost/classes/output/core_renderer.php');

class theme_accth_core_renderer extends \theme_boost\output\core_renderer {
    public function firstview_fakeblocks(): string {
        global $PAGE;
        $regionmainsettingsmenu = $this->regionmainsettingsmenu();
        $hasblocks = (strpos($regionmainsettingsmenu, 'block') !== false);
        $PAGE->set_secondary_navigation(false);
        if ($hasblocks) {
            return $regionmainsettingsmenu;
        }
        return '';
    }

    /**
     * Override the parent method to add better accessibility attributes
     * @param string $text The text or language string identifier
     * @param moodle_url|string $url The URL
     * @param array $attributes Additional attributes
     * @return string HTML
     */
    public function single_button($url, $text, $attributes = null): string {
        if (!is_array($attributes)) {
            $attributes = array('class' => 'singlebutton');
        }
        
        if (get_string_manager()->string_exists($text, 'theme_accth')) {
            $arialabel = get_string($text, 'theme_accth');
        } else if (get_string_manager()->string_exists($text, 'moodle')) {
            $arialabel = get_string($text, 'moodle');
        } else {
            $arialabel = $text;
        }
        
        $attributes['aria-label'] = $arialabel;
        
        return parent::single_button($url, $text, $attributes);
    }

    /**
     * Override the parent method to enhance navigation accessibility
     * @param renderer_base $output
     * @return string HTML
     */
    public function navbar(): string {
        $breadcrumbs = parent::navbar();
        
        if (empty($breadcrumbs)) {
            return '';
        }

        $breadcrumbs = str_replace(
            '<nav class="navbar',
            '<nav class="navbar" role="navigation" aria-label="' . get_string('breadcrumb', 'access') . '"',
            $breadcrumbs
        );
        
        return $breadcrumbs;
    }
}