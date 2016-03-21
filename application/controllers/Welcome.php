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
	public function getAll()
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

	public function index(){
		$this->load->helper('url');
		$this->load->helper('form');

		$day_enum = array(
			'mon' => 'mon',
			'tue' => 'tue',
			'wed' => 'wed',
			'thu' => 'thu',
			'fri' => 'fri'
		);

		$time_enum = array(
			'830'  => '830',
			'930'  => '930',
			'1030' => '1030',
			'1130' => '1130',
			'1230' => '1230',
			'1330' => '1330',
			'1430' => '1430',
			'1530' => '1530',
			'1630' => '1630'
		);

		$type_enum = array(
			'Lab' => 'Lab',
			'Lec' => 'Lec',
			'Sem' => 'Sem'
		);

		$code_enum = array(
			'BLAW 3600' => 'BLAW 3600',
			'COMP 4711' => 'COMP 4711',
			'COMP 4976' => 'COMP 4976',
			'COMP 4977' => 'COMP 4977',
			'COMP 4560' => 'COMP 4560',
			'COMP 4735' => 'COMP 4735',
		);

		$days_day_id  = 'id="days-day"';
		$days_time_id = 'id="days-time"';

		$courses_code = 'id="courses-code"';
		$courses_type = 'id="courses-type"';

		$periods_day_id = 'id="periods-day"';
		$periods_time_id = 'id="periods-time"';

		$this->data['pagebody'] = 'mockup';

		//name data selected additional

		$this->data['days_days']  = form_dropdown('ddays', $day_enum, 'mon', $days_day_id);
		$this->data['days_times'] = form_dropdown('dtimes', $time_enum, '830', $days_time_id);

		$this->data['courses_types']  = form_dropdown('ctypes', $type_enum, 'Lab', $courses_type);
		$this->data['courses_codes']  = form_dropdown('ccodes', $code_enum, 'BLAW 3600', $courses_code);

		$this->data['periods_days']  = form_dropdown('pdays', $day_enum, 'mon', $periods_day_id);
		$this->data['periods_times'] = form_dropdown('ptimes', $time_enum, '830', $periods_time_id);

		$this->render();
	}

	public function periods($timeslot, $day){
		$this->data['pagebody'] = 'schedule';
		$period = $this->timetable->searchPeriod($timeslot, $day);
		if($period != null){
			$this->data['message']     = "FOUND!";
			$this->data['timeslot']    = $timeslot;
			$this->data['day']		   = $day;
			$this->data['instructor']  = $period->getInstructor();
			$this->data['room']        = $period->getRoom();
			$this->data['bookingtype'] = $period->getBookingtype();
			$this->data['coursename']  = $period->getCoursename();
		} else {
			$this->data['message'] = "NOT FOUND!";
			$this->data['timeslot']    = "";
			$this->data['day']		   = "";
			$this->data['instructor']  = "";
			$this->data['room']        = "";
			$this->data['bookingtype'] = "";
			$this->data['coursename']  = "";

		}
		$this->render();
	}

	public function days($day, $time){
		$this->data['pagebody'] = 'schedule';
		$day_booking = $this->timetable->searchDay($day, $time);
		if($day_booking != null){
			$this->data['message']     = "FOUND!";
			$this->data['timeslot']    = $time;
			$this->data['day']		   = $day;
			$this->data['instructor']  = $day_booking->getInstructor();
			$this->data['room']        = $day_booking->getRoom();
			$this->data['bookingtype'] = $day_booking->getBookingtype();
			$this->data['coursename']  = $day_booking->getCoursename();
		} else {
			$this->data['message'] = "NOT FOUND!";
			$this->data['timeslot']    = "";
			$this->data['day']		   = "";
			$this->data['instructor']  = "";
			$this->data['room']        = "";
			$this->data['bookingtype'] = "";
			$this->data['coursename']  = "";

		}
		$this->render();
	}

	public function courses($course_code, $course_type){
		//strip %20 from string
		$code = str_replace("%20", " ", $course_code);
		$this->data['pagebody'] = 'course';
		$course = $this->timetable->searchCourse($code, $course_type);

		if($course != null) {
			$this->data['code'] = $code;
			$this->data['type'] = $course_type;
			$this->data['instructor'] = $course->getInstructor();
			$this->data['room'] = $course->getRoom();
		} else {
			$this->data['code'] = "";
			$this->data['type'] = "";
			$this->data['instructor'] = "";
			$this->data['room'] = "";
		}
		$this->render();
	}
}
