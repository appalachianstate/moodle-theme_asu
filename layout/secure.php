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
 * The secure layout.
 *
 * @package   theme_asu
 * @copyright 2013 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Get the HTML for the settings bits.
$html = theme_asu_get_html_for_settings($OUTPUT, $PAGE);

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="apple-touch-icon" href="<?php echo $OUTPUT->pix_url('apple-touch-icon', 'theme'); ?>"/>
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<?php require_once(dirname(__FILE__).'/includes/header.php'); ?>
<div id="page-wrapper">
	<div id="page" class="container-fluid">

	    <header id="page-header" class="clearfix">
	        <?php echo $html->heading; ?>
	    </header>

	    <div id="page-content" class="row-fluid">
	        <div id="region-bs-main-and-pre" class="span9">
	            <div class="row-fluid">
	                <section id="region-main" class="span8 pull-right">
	                    <?php echo $OUTPUT->main_content(); ?>
	                </section>
	                <?php echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column'); ?>
	            </div>
	        </div>
	        <?php echo $OUTPUT->blocks('side-post', 'span3'); ?>
	    </div>

	    <?php echo $OUTPUT->standard_end_of_body_html() ?>

	</div>
</div>
</body>
</html>
