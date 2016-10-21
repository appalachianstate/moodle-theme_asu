$(document).ready(function(){

  $('#region-main table').addClass('table');
  $("table").wrap("<div class='table-responsive'></div>");

  $('#moodle-navbar .usermenu').removeClass('pull-left').addClass('navbar-nav');
  $('#moodle-navbar .navbar-nav').removeClass('pull-right');
  $('.usermenu .dropdown-menu').removeClass('pull-right');

  var $table = $('.gradereport-grader-table');
  var $generaltable = $('body#page-mod-attendance-report .generaltable');

  // Make a clone of our table
  var $fixedColumn = $table.clone().insertBefore($table).addClass('fixed-column');
  var $fixedColumnGeneral = $generaltable.clone().insertBefore($generaltable).addClass('fixed-column');

  // Remove everything except for first column
  $fixedColumn.find('th:not(:first-child),td').remove();
  $fixedColumnGeneral.find('th:not(.c0,.c1),td:not(.c0,.c1)').remove();

  // Match the height of the rows to that of the original table's
  $fixedColumn.find('tr').each(function (i, elem) {
    $(this).height($table.find('tr:eq(' + i + ')').height());
  });

  $table.find('th.range').wrapInner('<span></span>');

  $fixedColumnGeneral.find('tr').each(function (i, elem) {
    $(this).height($generaltable.find('tr:eq(' + i + ')').height());
  });

  $generaltable.find('th.range').wrapInner('<span></span>');

  var $fixedcolwid = $generaltable.find('th.c0').outerWidth() + $generaltable.find('th.c1').outerWidth();

  $fixedColumnGeneral.width($fixedcolwid);
});
