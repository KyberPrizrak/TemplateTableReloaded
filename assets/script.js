$(function() {
  $('table.ttable th:last-child').append($('<a>').attr({
    'href': '?action=purge',
    'title': 'Clear page cache (refresh all tables on this page)'
  }));
});
