$(document).ready(function() {
    $(".mobile-inner-nav a").each(function( index ) {
        $( this ).css({'animation-delay': (index/10)+'s'});
    });
    // Documentation link
    $('.flicker-example').flicker();
    $(".c1_list").hide();
    $(".ColumnOnenav li:first").addClass("cur").show();
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