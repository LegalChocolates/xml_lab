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
                $r = new stdClass();
                $r->instructor  = (string) $booking['instructor'];
                $r->room        = (string) $booking['room'];
                $r->bookingtype = (string) $booking['bookingtype'];
                $r->timeslot    = (string) $booking['timeslot'];
                $r->coursename  = (string) $booking['coursename'];

                array_push($bookings, $r);
            }

            $this->days[$type] = $bookings;
        }

        foreach ($this->periods_xml->periods as $period)
        {
            $type = (string) $period['time'];

            $bookings = array();

            foreach ($day->booking as $booking)
            {
                $r = new stdClass();
                $r->instructor   = (string) $booking['instructor'];
                $r->room         = (string) $booking['room'];
                $r->bookingtype  = (string) $booking['bookingtype'];
                $r->dayoftheweek = (string) $booking['dayoftheweek'];
                $r->coursename   = (string) $booking['coursename'];

                array_push($bookings, $r);
            }

            $this->periods[$type] = $bookings;
        }
    }

    function days()
    {
        return $this->days;
    }

    function getDay($type)
    {
        if (isset($this->days[$type]))
            return $this->days[$type];
        else
            return null;
    }
}
