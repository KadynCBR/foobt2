$(document).ready(function(){
  //function goes here :D !
  var menu = $('#navigation');
  var menuTimeout;  
  menu.stop().animate({'marginLeft':'-13%'},750);
  $('#logo').stop().animate({'marginLeft':'-13%'},750);
  $('#content-contain').stop().animate({'width':'100%'},750);

  
  $(window).on('mousemove', mouseMoveHandler);
  
  function showMenu() {
    menu.stop().animate({'marginLeft':'0%'},750);
    $('#logo').stop().animate({'marginLeft':'0%'},750);
    $('#content-contain').stop().animate({'width':'87%'},750);

  }
  function hideMenu() {
    menu.stop().animate({'marginLeft':'-13%'},750);
    $('#logo').stop().animate({'marginLeft':'-13%'},750);
    $('#content-contain').stop().animate({'width':'100%'},750);

  }
  function mouseMoveHandler(e) {
    if(e.pageX < 25 || menu.is(':hover')) {
      // Show the menu is within 20px of left
      showMenu();
      clearTimeout(menuTimeout);
      menuTimeout = null;
    } else if (!menuTimeout) {
      // Hide menu if more than 20 px away. or scheduled to hide.
      menuTimeout = setTimeout(hideMenu, 500);
    }
  }
});