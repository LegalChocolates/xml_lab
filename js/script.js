$(document).ready( function(){

    day_frame    = $("#days-frame");
    course_frame = $("#courses-frame");
    period_frame = $("#periods-frame");

    load_days();
    load_courses();
    load_periods();

    bingo_bool = false;

    $("#days-day, #days-time").on('change', function(){
        load_days();
    });

    $("#courses-code, #courses-type").on('change', function(){
        load_days();
    });

    $("#periods-time, #periods-day").on('change', function(){
        load_periods();
    });

    $("#days-btn").click(function(){
        setDays();
    });

    $("#courses-btn").click(function(){
        setCourses();
    });

    $("#periods-btn").click(function(){
        setPeriods();
    });

    $(".btn-danger").click(function(){
        bingo_day  = $("#bingo-day").find(":selected").val();
        bingo_time = $("#bingo-time").find(":selected").val();
        window.location.assign(window.location.origin + "/welcome/search/" + bingo_day + "/" + bingo_time);
    });
    $("#viewall").click(function(){
        window.location.assign(window.location.origin + "/welcome/getall");
    });

});

var bingo_bool;
var bingo_day, bingo_time;

var day_day,day_time,period_day,period_time,course_code,course_type;

var day_frame, course_frame, period_frame;

function load_days(){
    day_day  = $("#days-day").find(":selected").val();
    day_time = $("#days-time").find(":selected").val();
}

function load_courses(){
    course_code = $("#courses-code").find(":selected").val();
    course_type = $("#courses-type").find(":selected").val();
}

function load_periods(){
    period_time = $("#periods-time").find(":selected").val();
    period_day  = $("#periods-day").find(":selected").val();
}

function setDays(){
    day_frame.attr('src', window.location.origin + "/welcome/days/" + day_day + "/" + day_time);
}

function setCourses(){
    var url = window.location.origin + window.location.pathname;
    course_code = $("#courses-code").find(":selected").val();
    course_type = $("#courses-type").find(":selected").val();
    //origin   == xml-lab.dev
    //pathname == /Welcome/mockup

    course_frame.attr('src', window.location.origin + "/welcome/courses/" + course_code + "/" + course_type);
}

function setPeriods(){
    period_frame.attr('src', window.location.origin + "/welcome/periods/" + period_time + "/" + period_day);
}
