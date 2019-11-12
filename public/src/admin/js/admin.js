$(function(){
    $(".one_category").click(function(){
        $(this).next().slideToggle();
        $(this).parent().siblings().children("ul").slideUp();
    });
});
