<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Admin config settings page
 *
 * @package    auth_saml2
 * @copyright  Brendan Heywood <brendan@catalyst-au.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Settings for label type admin setting.
 *
 * @package    auth_saml2
 * @copyright  Matt Porritt <mattp@catalyst-au.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class admin_setting_auth_saml2_button extends admin_setting_heading{

    /**
     * A button element
     * @param string $name unique ascii name, either 'mysetting' for settings that in config, or 'myplugin/mysetting' for ones in config_plugins.
     * @param string $heading heading
     * @param string $description description of what the button does
     * @param string $label what is written on the button
     * @param string $href the URL directed to on click
     */
    public function __construct($name, $visiblename, $description, $label, $href) {
        $this->nosave = true;
        $this->label = $label;
        $this->href = $href;
        parent::__construct($name, $visiblename, $description, '');
    }

    /**
     * Returns an HTML string
     * 
     * @return string Returns an HTML string
     */
    public function output_html($data, $query = '') {
        global $OUTPUT;
        $context = (object) [
                'label' => $this->label,
                'href' => $this->href,
                'forceltr' => $this->get_force_ltr(),
        ];
        $element = $OUTPUT->render_from_template('auth_saml2/setting_configbutton', $context);

        return format_admin_setting ( $this, $this->visiblename, $element, $this->description );
    }
}
