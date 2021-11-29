$(document).ready(function() {
    //Scrolling Menu
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 200) {
            $("div.nav").addClass("scrolled-menu");
            $("div.nav").removeClass("main-menu");
        } else {
            $("div.scrolled-menu").addClass("main-menu");
            $("div.scrolled-menu").removeClass("scrolled-menu");
        }
    }); //missing );


});