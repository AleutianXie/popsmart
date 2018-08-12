$(document).ready(function() {
    $(".mobile-inner-header-icon").click(function(){
        $(this).toggleClass("mobile-inner-header-icon-click mobile-inner-header-icon-out");
        $(".mobile-inner-nav").slideToggle(250);
    });
    $(".mobile-inner-nav a").each(function( index ) {
        $( this ).css({'animation-delay': (index/10)+'s'});
    });
    // Documentation link
    $('.flicker-example').flicker();
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

});