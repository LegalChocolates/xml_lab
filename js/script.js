$(document).ready( function(){

    day_frame    = $("#days-frame");
    course_frame = $("#courses-frame");
    period_frame = $("#periods-frame");

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

    $("#days-btn").click(function(){
        setDays();
    });

    $("#courses-btn").click(function(){
        setCourses();
    });

    $("#periods-btn").click(function(){
        setPeriods();
    });
});

var day_day,day_time,period_day,period_time,course_code,course_type;

var day_frame, course_frame, period_frame;

function load_days(){
    day_day  = $("#days-day").find(":selected").val();
    day_time = $("#days-time").find(":selected").val();

    console.log("(days) " + day_day + " " + day_time);
}

function load_courses(){
    course_code = $("#courses-code").find(":selected").val();
    course_type = $("#courses-type").find(":selected").val();

    console.log("(courses) " + course_code + " " + course_type);
}

function load_periods(){
    period_time = $("#periods-time").find(":selected").val();
    period_day  = $("#periods-day").find(":selected").val();

    console.log("(periods) " + period_time + " " + period_day);
}

function setDays(){
    var url = window.location.origin + window.location.pathname;
    //origin   == xml-lab.dev
    //pathname == /Welcome/mockup
    day_frame.attr('src', url);
}

function setCourses(){
    var url = window.location.origin + window.location.pathname;
    //origin   == xml-lab.dev
    //pathname == /Welcome/mockup
    course_frame.attr('src', url);
}

function setPeriods(){
    var url = window.location.origin + window.location.pathname;
    //origin   == xml-lab.dev
    //pathname == /Welcome/mockup
    period_frame.attr('src', url);
}