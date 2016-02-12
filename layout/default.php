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


$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);

$knownregionpre = $PAGE->blocks->is_known_region('side-pre');
$knownregionpost = $PAGE->blocks->is_known_region('side-post');

$regions = bootstrap_grid_asu($hassidepre, $hassidepost);
$PAGE->set_popup_notification_allowed(false);

$PAGE->requires->jquery();

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300,600,300italic' rel='stylesheet' type='text/css'>
    <?php echo $OUTPUT->standard_head_html(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<nav role="navigation" class="navbar navbar-inverse">
    <div class="container-fluid">
    <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#moodle-navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <a class="navbar-brand" href="<?php echo $CFG->wwwroot ?>"><img src="<?php echo $OUTPUT->pix_url('logo_final', 'theme'); ?>" alt="AsULearn" /></a>
    </div>

    
    <div id="moodle-navbar" class="navbar-collapse collapse">
        <?php echo $OUTPUT->custom_menu(); ?>
        <?php echo $OUTPUT->user_menu(); ?>
        <ul class="nav pull-right">
            <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
        </ul>
    </div>
    
    </div>
</nav>

<header class="moodleheader">
    <div class="container-fluid">
    <a href="<?php echo $CFG->wwwroot ?>" class="logo"></a>
    <?php echo $OUTPUT->page_heading(); ?>
    </div>
</header>

<div id="page">
        <div id="page-inner" class="container-fluid">
            <header id="page-header" class="clearfix">
                <div id="page-navbar" class="clearfix">
                    <nav class="breadcrumb-nav" role="navigation" aria-label="breadcrumb"><?php echo $OUTPUT->navbar(); ?></nav>
                    <div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>
                </div>

                <div id="course-header">
                    <?php echo $OUTPUT->course_header(); ?>
                </div>
            </header>

            <div id="page-content" class="row">
                <div id="region-main" class="<?php echo $regions['content']; ?>">
                    <?php
                    echo $OUTPUT->course_content_header();

                    echo $OUTPUT->main_content();
                    echo $OUTPUT->course_content_footer();
                    ?>
                </div>

                <?php
                if ($knownregionpre) {
                    echo $OUTPUT->blocks('side-pre', $regions['pre']);
                }?>
                <?php
                if ($knownregionpost) {
                    echo $OUTPUT->blocks('side-post', $regions['post']);
                }?>
            </div>
        </div>
</div>

<footer id="page-footer">
    <div id="page-footer-inner" class="container-fluid">
            <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
            <img class='logo' src="<?php echo $OUTPUT->pix_url('ASUbird', 'theme'); ?>" alt="Appalachian State University" />
            <?php
            echo "<div><a href='http://asulearnhelp.appstate.edu'>AsULearn Support</a></div>";
            echo $OUTPUT->login_info();
            echo $OUTPUT->standard_footer_html();
            ?>
    </div>
</footer>

            <?php echo $OUTPUT->standard_end_of_body_html() ?>

        </div>
</body>
</html>
