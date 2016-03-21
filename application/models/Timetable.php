<?php

class Timetable extends CI_Model
{

    // XML files
    protected $days_xml    = null;
    protected $periods_xml = null;
    protected $courses_xml = null;

    // Days
    protected $days      = array();

    // Periods
    protected $periods   = array();

    // Courses
    protected $courses   = array();

    function __construct()
    {
        parent::__construct();

        $dir = getcwd();

        $this->days_xml    = simplexml_load_file($dir . DATAPATH . 'days'    . XMLSUFFIX);
        $this->periods_xml = simplexml_load_file($dir . DATAPATH . 'periods' . XMLSUFFIX);
        $this->courses_xml = simplexml_load_file($dir . DATAPATH . 'courses' . XMLSUFFIX);

        foreach ($this->days_xml->day as $day)
        {
            $type = (string) $day['type'];

            $bookings = array();

            foreach ($day->booking as $booking)
            {
                $b = new Booking();
                $b->setInstructor((string) $booking['instructor']);
                $b->setRoom((string) $booking['room']);
                $b->setBookingtype((string) $booking['bookingtype']);
                $b->setTimeslot((string) $booking['timeslot']);
                $b->setCoursename((string) $booking['coursename']);

                array_push($bookings, $b);
            }

            $this->days[$type] = $bookings;
        }

        foreach ($this->periods_xml->period as $period)
        {
            $type = (string) $period['time'];
            $bookings = array();

            foreach ($period->booking as $booking)
            {
                $b = new Booking();
                $b->setInstructor((string) $booking['instructor']);
                $b->setRoom((string) $booking['room']);
                $b->setBookingtype((string) $booking['bookingtype']);
                $b->setDayofweek((string) $booking['dayofweek']);
                $b->setCoursename((string) $booking['coursename']);

                array_push($bookings, $b);
            }
            $this->periods[$type] = $bookings;
        }

        foreach ($this->courses_xml->course as $course)
        {
            $type = (string) $course['code'];
            $bookings = array();

            foreach ($course->booking as $booking)
            {
                $b = new Booking();
                $b->setInstructor((string) $booking['instructor']);
                $b->setRoom((string) $booking['room']);
                $b->setBookingtype((string) $booking['bookingtype']);
                array_push($bookings, $b);
            }
            $this->courses[$type] = $bookings;
        }


    }

    function days()
    {
        return $this->days;
    }
    function periods()
    {
        return $this->periods;
    }
    function courses()
    {
        return $this->courses;
    }


    function getDay($type)
    {
        if (isset($this->days[$type]))
            return $this->days[$type];
        else
            return null;
    }

    function searchPeriod($timeslot, $day){
        $alltimeslots = array_keys($this->periods);
        for($i = 0; $i < sizeof($alltimeslots); $i++){ //search through all timeslots
            if(strcmp($alltimeslots[$i],$timeslot) == 0){ //compare if timeslot exists
                for($j = 0; $j < sizeof($this->periods[$timeslot]); $j++) { // search through all days
                    if(strcmp($this->periods[$timeslot][$j]->getDayofweek(),$day) == 0){ // check if day exists
                        return $this->periods[$timeslot][$j];
                    }
                }
            }
        }
        return null;
    }

    function searchDay($day, $time){
        $alltimeslots = array_keys($this->days);
        for($i = 0; $i < sizeof($alltimeslots); $i++){
            if(strcmp($alltimeslots[$i],$day) == 0){
                for($j = 0; $j < sizeof($this->days[$day]); $j++) {
                    if(strcmp($this->days[$day][$j]->getTimeslot(),$time) == 0){
                        return $this->days[$day][$j];
                    }
                }
            }
        }
        return null;
    }

    function searchCourse($course_code, $course_type){
        $foundcourses = array();
        $allcourses = array_keys($this->courses);
        for($i = 0; $i < sizeof($allcourses); $i++){ //search through all course codes
            if(strcmp($allcourses[$i], $course_code) == 0){ //compare if timeslot exists
                for($j = 0; $j < sizeof($this->courses[$course_code]); $j++) { // search through all days
                    if(strcmp($this->courses[$course_code][$j]->getBookingtype(), $course_type) == 0){ // check if day exists
                        array_push($foundcourses, $this->courses[$course_code][$j]);
                    }
                }
            }
        }
        return $foundcourses;
    }


}
