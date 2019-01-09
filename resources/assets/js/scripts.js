$(document).ready(function() {
    $(".mobile-inner-header-icon").click(function(){
        $(this).toggleClass("mobile-inner-header-icon-click mobile-inner-header-icon-out");
        $(".mobile-inner-nav").slideToggle(250);
    });
    $(".mobile-inner-nav a").each(function( index ) {
        $( this ).css({'animation-delay': (index/10)+'s'});
    });
    // Documentation link
    $('.flicker-example').flicker({
        auto_flick_delay: 3
    });
    $(".c1_list").hide();
    // $(".ColumnOnenav li:first").addClass("cur").show();
    $(".c1_list:first").show();
    
    //On Click Event
    $(".ColumnOnenav li").click(function() {
        $(".ColumnOnenav li").removeClass("cur");
        $(this).addClass("cur");
        $(".c1_list").hide();
        var activeTab = $(this).find("a").attr("href");
        $(activeTab).fadeIn();
        return false;
    });

    $('.boxmain .solution_l ul li a').each(function (index) {
        $(this).click(function() {
            $(this).parent().siblings().each(function (index, item) {
                if ($(item).children('a').first().hasClass("active")) {
                    $(item).children('a').first().removeClass("active");
                }
            });

            var rItem = $('.solution_r:eq(' + index + ')');
            $(rItem).removeClass("d-none");
            $(rItem).siblings().each(function (index, item) {
                if (!$(item).hasClass("d-none") && $(item).hasClass('solution_r')) {
                    $(item).addClass("d-none");
                }
            });
            $(this).addClass("active");
        });
    });

    $('.boxmain .solution_r ul li a').each(function (index) {
        $(this).click(function() {
            $(this).parent().siblings().each(function (index, item) {
                if ($(item).children('a').first().hasClass("active")) {
                    $(item).children('a').first().removeClass("active");
                }
            });

            $(this).addClass("active");
        });
    });
});

(function ($) {
    function setbgurl() {
        let width = $("html").width();
        if (width < 1000) {
            $(".my-top-banner").each(function () {
                let gb = $(this).attr("bg1");
                $(this).css('background-image', `url(${gb})`);
            })
        } else {
            $(".my-top-banner").each(function () {
                let gb = $(this).attr("bg2");
                $(this).css('background-image', `url(${gb})`);
            })
        }
    }

    setbgurl();

    // 取自 UnderscoreJS 实用框架
    function debounce(func, wait, immediate) {
        var timeout;
        return function () {
            var context = this, args = arguments;
            var later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

    // 添加resize的回调函数，但是只允许它每300毫秒执行一次
    window.addEventListener('resize', debounce(function (event) {
        setbgurl();
    }, 300));
})(jQuery);