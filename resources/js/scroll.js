$(window).scroll(function() {
  sessionStorage.scrollTop = $(this).scrollTop();
  sessionStorage.scrollPage = window.location.href;
});

$(document).ready(function() {
  sessionStorage.Page = window.location.href;
  if (sessionStorage.scrollPage == sessionStorage.Page){
    if (sessionStorage.scrollTop != "undefined") {
      $(window).scrollTop(sessionStorage.scrollTop);
    }
  }
});