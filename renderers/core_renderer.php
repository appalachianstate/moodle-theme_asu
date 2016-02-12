<?php 
	
class theme_asu_core_renderer extends theme_bootstrap_core_renderer
{
  protected function render_custom_menu(custom_menu $menu)
  {
    /*
     * This code adds My courses to the custom menu.
     */
    
    if (isloggedin() && !isguestuser())
    {
      $branchtitle = get_string('mycourses', 'theme_asu');
      $branchlabel = $branchtitle;
      $branchurl   = new moodle_url('/my/index.php');
      $branchsort  = 10000;
      
      $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
      
      if ($courses = enrol_get_my_courses(NULL, 'fullname ASC'))
      {
        foreach ($courses as $course)
        {
          if ($course->visible)
          {
            $branch->add(format_string($course->fullname), new moodle_url('/course/view.php?id='.$course->id), format_string($course->shortname));
          }
        }
      }
      else
      {
        $noenrolments = get_string('noenrolments', 'theme_asu');
        $branch->add('<em>'.$noenrolments.'</em>', new moodle_url('/'), $noenrolments);
      }
    }
    
    /*
     * This code adds My dashboard to the custom menu.
     */
    if (isloggedin() && !isguestuser())
    {
      $branchlabel = get_string('mydashboard', 'theme_asu');
      $branchurl   = new moodle_url('/my/index.php');
      $branchtitle = get_string('mydashboard', 'theme_asu');
      $branchsort  = 10000;
      
      $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
      //$branch->add(get_string('profile').'</em>',new moodle_url('/user/profile.php'),get_string('profile'));
      $branch->add(get_string('pluginname', 'block_calendar_month').'</em>',new moodle_url('/calendar/view.php'),get_string('pluginname', 'block_calendar_month'));
      $branch->add(get_string('pluginname', 'block_messages').'</em>',new moodle_url('/message/index.php'),get_string('pluginname', 'block_messages'));
      $branch->add(get_string('privatefiles', 'block_private_files').'</em>',new moodle_url('/user/files.php'),get_string('privatefiles', 'block_private_files'));
      //$branch->add(get_string('logout').'</em>',new moodle_url('/login/logout.php'),get_string('logout'));
    }
    
    return parent::render_custom_menu($menu);
  }
}
