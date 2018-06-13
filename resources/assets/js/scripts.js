$(document).ready(function() {
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