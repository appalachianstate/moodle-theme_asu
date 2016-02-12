$(document).ready(function(){
  
  $('#region-main table').addClass('table');
  $("table").wrap("<div class='table-responsive'></div>");
  
  $('#moodle-navbar .usermenu').removeClass('pull-left').addClass('navbar-nav');
  $('#moodle-navbar .navbar-nav').removeClass('pull-right');
  $('.usermenu .dropdown-menu').removeClass('pull-right');

});
