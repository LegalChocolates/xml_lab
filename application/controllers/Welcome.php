<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('timetable');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->library('parser');
		$days    = $this->timetable->days();
		$periods = $this->timetable->periods();
		$courses = $this->timetable->courses();

		$days_keys    = array_keys($days);
		$periods_keys = array_keys($periods);
		$courses_keys = array_keys($courses);

		$x = array();
		$y = array();
		$z = array();


		foreach($periods_keys as $key)
		{
			$tmp = null;
			$bookings = array();
			for($i = 0; $i < sizeof($periods[$key]); $i++) {
				$booking = array(
					"instructor"   => $periods[$key][$i]->getInstructor(),
					"room" 		   => $periods[$key][$i]->getRoom(),
					"bookingtype"  => $periods[$key][$i]->getBookingtype(),
					"dayofweek"     => $periods[$key][$i]->getDayofweek(),
					"coursename"   => $periods[$key][$i]->getCourseName()
				);
				array_push($bookings, $booking);
			}
			$tmp = array(
				"timeslot"	 	   => $key,
				"booking"	   => $bookings
			);
			$x[$key] = $tmp;
		}

		foreach($days_keys as $key)
		{
			$tmp = null;
			$bookings = array();
			for($i = 0; $i < sizeof($days[$key]); $i++) {
				$booking = array(
					"instructor"   => $days[$key][$i]->getInstructor(),
					"room" 		   => $days[$key][$i]->getRoom(),
					"bookingtype"  => $days[$key][$i]->getBookingtype(),
					"timeslot"     => $days[$key][$i]->getTimeslot(),
					"coursename"   => $days[$key][$i]->getCourseName()
				);
				array_push($bookings, $booking);
			}
			$tmp = array(
				"day"	 	   => $key,
				"booking"	   => $bookings
			);
			$y[$key] = $tmp;
		}

		foreach($courses_keys as $key)
		{
			$tmp = null;
			$bookings = array();
			for($i = 0; $i < sizeof($courses[$key]); $i++) {
				$booking = array(
					"instructor"   => $courses[$key][$i]->getInstructor(),
					"room" 		   => $courses[$key][$i]->getRoom(),
					"bookingtype"  => $courses[$key][$i]->getBookingtype()
				);
				array_push($bookings, $booking);
			}
			$tmp = array(
				"code"	 	   => $key,
				"booking"	   => $bookings
			);
			$z[$key] = $tmp;
		}



		$this->data['pagebody'] = 'welcome_message';
		$this->data['periods']  = $x;
        $this->data['days']     = $y;
		$this->data['courses']  = $z;



		$this->render();

	}
}
