$(document).ready(function(){
  
  $('#region-main table').addClass('table');
  $("table").wrap("<div class='table-responsive'></div>");
  
  $('#moodle-navbar .usermenu').removeClass('pull-left').addClass('navbar-nav');
  $('#moodle-navbar .navbar-nav').removeClass('pull-right');
  $('.usermenu .dropdown-menu').removeClass('pull-right');
  
  var $table = $('.gradereport-grader-table');
  // Make a clone of our table
  var $fixedColumn = $table.clone().insertBefore($table).addClass('fixed-column');

  // Remove everything except for first column
  $fixedColumn.find('th:not(:first-child),td').remove();

  // Match the height of the rows to that of the original table's
  $fixedColumn.find('tr').each(function (i, elem) {
    $(this).height($table.find('tr:eq(' + i + ')').height());
  });

  $table.find('th.range').wrapInner('<span></span>');
});
