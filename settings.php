<?php
// This file is part of The Bootstrap Moodle theme
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
 * Theme config
 *
 * @package    theme_asu
 * @copyright  Appalachian State University
 * @author     Michelle Melton
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    // Boost provides a nice setting page which splits settings onto separate tabs. We want to use it here.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingasu', get_string('configtitle', 'theme_asu'));

    // Each page is a tab - the first is the "General" tab.
    $page = new admin_settingpage('theme_asu_general', get_string('generalsettings', 'theme_asu'));

    // Replicate the preset setting from boost.
    $name = 'theme_asu/preset';
    $title = get_string('preset', 'theme_asu');
    $description = get_string('preset_desc', 'theme_asu');
    $default = 'default.scss';

    // We list files in our own file area to add to the drop down. We will provide our own function to
    // load all the presets from the correct paths.
    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_asu', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    // These are the built in presets from Boost.
    $choices['default.scss'] = 'default.scss';
    $choices['plain.scss'] = 'plain.scss';

    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Preset files setting.
    $name = 'theme_asu/presetfiles';
    $title = get_string('presetfiles', 'theme_asu');
    $description = get_string('presetfiles_desc', 'theme_asu');

    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
            array('maxfiles' => 20, 'accepted_types' => array('.scss')));
    $page->add($setting);

    // Variable $brand-color.
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_asu/brandcolor';
    $title = get_string('brandcolor', 'theme_asu');
    $description = get_string('brandcolor_desc', 'theme_asu');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Must add the page after definiting all the settings!
    $settings->add($page);

    // Advanced settings.
    $page = new admin_settingpage('theme_asu_advanced', get_string('advancedsettings', 'theme_asu'));

    // Raw SCSS to include before the content.
    $setting = new admin_setting_configtextarea('theme_asu/scsspre',
            get_string('rawscsspre', 'theme_asu'), get_string('rawscsspre_desc', 'theme_asu'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_configtextarea('theme_asu/scss', get_string('rawscss', 'theme_asu'),
            get_string('rawscss_desc', 'theme_asu'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Notification block content.
    $setting = new admin_setting_confightmleditor('theme_asu/notify', get_string('notify', 'theme_asu'),
            get_string('notify_desc', 'theme_asu'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Alert level for notification block.
    $setting = new admin_setting_configselect('theme_asu/alert', get_string('alert', 'theme_asu'),
            get_string('alert_desc', 'theme_asu'), 'danger',
            array('success' => 'Success', 'danger' => 'Danger', 'warning' => 'Warning', 'info' => 'Info'));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Use sitename in header for -past instances.
    $setting = new admin_setting_configcheckbox('theme_asu/sitename', get_string('sitename', 'theme_asu'), get_string('sitename_desc', 'theme_asu'), 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
