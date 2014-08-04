    <footer id="page-footer">
        <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
			<div class="right">
				<p><a href="http://www.appstate.edu" title="<?php if (!empty($CFG->webfarm_nodename)) { echo $CFG->webfarm_nodename; } ?>"><img src="<?php echo $OUTPUT->pix_url('ASUbird', 'theme'); ?>" alt="bird logo" height=50 width=175 /></a></p>
	        </div>

			<p class="helplink"><?php echo $OUTPUT->page_doc_link(); ?></p>
        	<?php
		    echo $OUTPUT->login_info();
			echo $html->footnote;
		    echo $OUTPUT->standard_footer_html();
		    ?>
    </footer>
    
    <?php echo $OUTPUT->standard_end_of_body_html() ?>
    