<?php

class Booking extends CI_Model
{

    protected $timeslot = null;
    protected $dayofweek = null;
    protected $coursename = null;
    protected $instructor = null;
    protected $room = null;
    protected $bookingtype = null;

    /**
     * Booking constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getTimeslot()
    {
        return $this->timeslot;
    }

    /**
     * @param mixed $timeslot
     */
    public function setTimeslot($timeslot)
    {
        $this->timeslot = $timeslot;
    }


    /**
     * @return mixed
     */
    public function getDayofweek()
    {
        return $this->dayofweek;
    }

    /**
     * @param mixed $dayofweek
     */
    public function setDayofweek($dayofweek)
    {
        $this->dayofweek = $dayofweek;
    }

    /**
     * @return mixed
     */
    public function getCoursename()
    {
        return $this->coursename;
    }

    /**
     * @param mixed $coursename
     */
    public function setCoursename($coursename)
    {
        $this->coursename = $coursename;
    }

    /**
     * @return mixed
     */
    public function getInstructor()
    {
        return $this->instructor;
    }

    /**
     * @param mixed $instructor
     */
    public function setInstructor($instructor)
    {
        $this->instructor = $instructor;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param mixed $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * @return mixed
     */
    public function getBookingtype()
    {
        return $this->bookingtype;
    }

    /**
     * @param mixed $bookingtype
     */
    public function setBookingtype($bookingtype)
    {
        $this->bookingtype = $bookingtype;
    }

}