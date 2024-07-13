$(document).ready(function(){
    
    if(window.location.pathname == "/ecomm.oop/"){
        $(document).scroll(function(){
            $("header.main").css("background-color", "rgba(255, 255, 255, 0.781)");
            $("header.main").css("transition", "all 300ms");
            $("header.main nav h1").css("color", "black");
            $("header.main nav ul li a").css("color", "black");
            $("header.main nav div a").css("color", "black");
        })
        
    }else{
        $("header.main").css("background-color", "#222");
        $("header.main nav ul li a").css("color", "white");
        $("header.main nav h1").css("color", "white");
        $("header.main nav div a").css("color", "white");

    }

    
})