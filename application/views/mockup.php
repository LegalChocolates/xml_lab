<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <style>
        aside, .h{
            background: aliceblue;
            border: 1px solid coral;
        }
        .h {
            height: 50vh;
            padding: 0;
            padding-top: 0 !important;
        }
        iframe {
            width: 100%;
            height: 100%;
        }
        .btn-danger-wrapper {
            position: absolute;
            top: 1em;
            right: 2em;
        }

        .left-text {
            position: absolute;
            top: 1em;
            left: 2em;
        }

        .btn-danger:hover {
            background: dodgerblue !important;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type = 'text/javascript' src = "/js/script.js"></script>
</head>
<body class="container">

    <header>
        <h1 class="page-header text-center">My Schedule</h1>
        <div class="btn-danger-wrapper">
            <label for="bingo-days">Day</label>
            {bingo_days}
            <label for="bingo-time">Time</label>
            {bingo_times}
            <button class="btn btn-lg btn-danger" style="background: #68daff">Attempt Bingo!</button>
        </div>
        <div class="left-text">
            <button id="viewall" class="btn btn-lg btn-default">View All</button>
        </div>
    </header>

    <aside class="row">
        <div class="col-md-4 text-center">
            <h3>Days</h3>
            <nav class="well" style="text-align: left">
                <label for="days-day">Day</label>
                {days_days}
                <br>
                <label for="days-time">Time</label>
                {days_times}
                <button id="days-btn" type="button" class="btn btn-success pull-right">Search</button>
            </nav>
        </div>
        <div class="col-md-4 text-center">
            <h3>Courses</h3>
            <nav class="well" style="text-align: left">
                <label for="courses-code">Course Code</label>
                {courses_codes}
                <br>
                <label for="courses-type">Type</label>
                {courses_types}
                <button id="courses-btn" type="button" class="btn btn-success pull-right">Search</button>
            </nav>
        </div>
        <div class="col-md-4 text-center">
            <h3>Periods</h3>
            <nav class="well" style="text-align: left">
                <label for="periods-time">Timeslot</label>
                {periods_times}
                <br>
                <label for="periods-day">Day</label>
                {periods_days}
                <button id="periods-btn" onclick="setPeriods()" type="button" class="btn btn-success pull-right">Search</button>
            </nav>

        </div>
    </aside>
    <div class="row">
        <div class="col-md-4 h">
            <iframe id="days-frame" src="/images/days.png"></iframe>
        </div>
        <div class="col-md-4 h">
            <iframe id="courses-frame" src="/images/courses1.png"></iframe>
        </div>
        <div class="col-md-4 h">
            <iframe id="periods-frame" src="/images/periods.jpg"></iframe>
        </div>
    </div>
</body>
</html>