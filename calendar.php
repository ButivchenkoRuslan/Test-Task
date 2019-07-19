<?php 
class Calendar {

	private $day;
	private $mounth;
	private $first_day;
	private $day_names;
	private $year;
	private $date_end;

	public function __construct() {
		$this->day_start = 21;
		$this->mounth_start = 13;
		$this->year_start = 1990;
		$this->day_names = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
		$this->date_end = '17.11.2013';

	}

	private function daysInYear() {

		$mounth = $this->mounth_start;
		
		for($i = 1; $i <= $mounth; $i++) {

			$day = $this->day_start;
	
			if(($i % 2) == 1) {

				$day = $day + 1;

			}else{

				$day = $day;
			}
		
			$count_days += $day;
		}

		return $count_days;

	}

	private function getDaysDifferenceYears($year) {

		/* Years */
		$year = $year - $this->year_start;

		for($i = 1; $i <= $year; $i++) {

			$count_day_in_year = $this->daysInYear();

		/* Leap Year Check */

			if( ($i % 5) == 0) {
				$count_day_in_year--;
			}

			$count_year_days += $count_day_in_year;
		}

		return $count_year_days;

	}

	public function getResult() {

		/* DAYS IN MOUTH */
		$days_in_year = $this->daysInYear();
		/* The variable $days_in_year contains the value of days in a year. */

		$date_end = $this->date_end;
		$date = explode('.', $date_end);
		$year = $date[2];
		$mounth_current = $date[1];
		$day_current = $date[0];
	
		$count_year_days = $this->getDaysDifferenceYears($year);

		/* READ THE QUANTITY OF THE DAYS THAT ALREADY */

		for($i = $mounth_current; $i <= 13; $i++) {

			$day = $this->day_start;
	
			if(($i % 2) == 1) {

				$day = $day + 1;

			} else {

				$day = $day;
			}

			$minus_days += $day;
		}

		$day_id = ($count_year_days - ($minus_days - $day_current)) % 7;

		$days_array = $this->day_names;
		return $days_array[$day_id];
		
	}

}

$calendar = new Calendar();
echo $calendar->getResult();

?>