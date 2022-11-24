$(document).ready(function(){
    $(window).scroll(function(){
        let wScroll = $(this).scrollTop();
        // console.log(wScroll);
        if (wScroll >= 520) {
            $(".navbar").css({
              "background-color": "#393E46",
              "transition": "ease-in-out 0.3s",
            });
            $(".dropdown-menu").css({
              "background-color": "#393E46",
            });
        }else if(wScroll <= 520) {
            $('.navbar').css({
                'background-color' : 'transparent',
                'transition' : 'ease-in-out 0.3s'
            });
            $(".dropdown-menu").css({
               "background-color": "transparent",
            });
        }
    });

    $("#panahbawah").on('click', function() {
        let slidedown = $(".dropdown-menu").attr("slidedown");
        // console.log(slidedown);
        if (slidedown == "no") {
            $(".dropdown-menu").css({
              "animation" : "slidedown 1s ease-in-out forwards",
            });
            $(".dropdown-menu").attr("slidedown" , "yes");
        } else if(slidedown == "yes") {
            $(".dropdown-menu").css({
              "animation" : "slideup 1s ease-in-out forwards",
            });
            $(".dropdown-menu").attr("slidedown" , "no");
        }
        // $(".dropdown-menu").attr("slidedown" , "yes");
    })
});