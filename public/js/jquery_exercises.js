"use strict";

$(".codeup").click(function(){
    $(this).css("background-color", "red");
});

$("p").dblclick(function(){
    $(this).css("font-size", "18px");
});

$("li").hover(function(){
        $(this).css("color", "dodgerblue");
    }, function(){
        $(this).css("color", "");    
    
});
