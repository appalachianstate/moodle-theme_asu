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
    
    return parent::render_custom_menu($menu);
  }
}
