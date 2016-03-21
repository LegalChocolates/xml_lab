$(document).ready( function(){

    load_days();
    load_courses();
    load_periods();

    $("#days-day, #days-time").on('change', function(){
        load_days();
    });

    $("#courses-code, #courses-type").on('change', function(){
        load_days();
    });

    $("#periods-time, #periods-day").on('change', function(){
        load_periods();
    });
});

function load_days(){
    var day  = $("#days-day").find(":selected").val();
    var time = $("#days-time").find(":selected").val();

    var frame  = $("#days-frame");

    console.log("(days) " + day + " " + time);
}

function load_courses(){
    var code = $("#courses-code").find(":selected").val();
    var type = $("#courses-type").find(":selected").val();

    var frame  = $("#courses-frame");

    console.log("(courses) " + code + " " + type);
}

function load_periods(){
    var time = $("#periods-time").find(":selected").val();
    var day  = $("#periods-day").find(":selected").val();

    var frame  = $("#periods-frame");

    console.log("(periods) " + time + " " + day);
}