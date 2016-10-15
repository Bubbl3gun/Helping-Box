$(document).ready(function(){
    $("#addoption").click(function(){
        if($("#addoption").is( ":checked" )){
            $("#addoptiontext").attr("type", "gesucht")
        } else {
            $("#addoptiontext").attr("type", "hidden")
        }
    })
    $("#addoption2").click(function(){
        if($("#addoption2").is( ":checked" )){
            $("#addoptiontext2").attr("type", "gesucht")
        } else {
            $("#addoptiontext2").attr("type", "hidden")
        }
    })
    $("#addoption3").click(function(){
        if($("#addoption3").is( ":checked" )){
            $("#addoptiontext3").attr("type", "gesucht")
        } else {
            $("#addoptiontext3").attr("type", "hidden")
        }
    })
    $("#addoption4").click(function(){
        if($("#addoption4").is( ":checked" )){
            $("#addoptiontext4").attr("type", "gesucht")
        } else {
            $("#addoptiontext4").attr("type", "hidden")
        }
    })
    $("#addoption5").click(function(){
        if($("#addoption5").is( ":checked" )){
            $("#addoptiontext5").attr("type", "gesucht")
        } else {
            $("#addoptiontext5").attr("type", "hidden")
        }
    })
})
