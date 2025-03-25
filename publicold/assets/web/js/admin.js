// sidebar
$("#sidebarToggle").click(function(){
    $('#wrapper').toggleClass("sidenav-toggled");
    $('html').toggleClass("active_scroll");
});
function hideBanner() {
    document.getElementById('spam-banner').style.display = 'none';
}
// chat page
function myFunction(x) {
  if (x.matches) { // If media query matches
    $(".unread_msg").on( "click", function() {
        $('.chat_list') .hide(); 
        $('.chat_conversation') .show(); 
});
$(".chat_back_arrow").on( "click", function() {
   $('.chat_conversation') .hide(); 
    $('.chat_list') .show(); 
        
});
  } else {
   // document.body.style.backgroundColor = "#E8F1FF";
  }
}

var x = window.matchMedia("(max-width: 991px)")
myFunction(x) // Call listener function at run time
x.addListener(myFunction) // Attach listener function on state changes

 $(".unread_msg").on( "click", function() {
    $('.chat_title_bx').addClass('active_chat_title'); 
    $('.message_container').addClass('msg_active_container'); 
  });
  $(".chat_back_arrow").on( "click", function() {
    $('.chat_title_bx').removeClass('active_chat_title'); 
    $('.message_container').removeClass('msg_active_container'); 
  });