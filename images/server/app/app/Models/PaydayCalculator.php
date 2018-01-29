<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Exception;
use App\Exception\ValidationException;

use App\Models\Query;

class PaydayCalculator
{	
	public $query;
	protected $one_day = (60 * 60) * 24;
	protected $date_format_str = "D, dS M Y";

	/**
     * Input is cleaned and passed in as $query class.
     *
     * @param object $query with month and year parts
     */

	function __construct(Query $query) {
		$this->query = $query;
	}

	/**
     * Main function. Uses mktime rather than newer DateTime. Use DateTime for newer versions of PHP.
     *
     * @return string Date formatted according to our accepted format
     * @throws Exception if we can't decipher the payday variable passed in
     */

	public function generatePayDay() {

		$month = $this->query->month;
		$year = $this->query->year;

		if (!$month||!$year) {
			throw new Exception('$month or $day do not exist');
		}

		$month_name = date('F', mktime(0, 0, 0, $month, 1));

		$last_day_timestamp = strtotime("Last day of $month_name $year") - $this->one_day;
		$day_string = date('l',$last_day_timestamp);

		if($day_string=='Saturday' || $day_string=='Sunday'){
			return $this->lastFridayOfMonth($year,$month);
		}else{
			return date($this->date_format_str,$last_day_timestamp);
		}
		
	}

	/**
     * Take 4 days off the payday and return the date as string
     *
     * @param string $payday generated from $this->generatePayDay()
     * @return string Date formatted according to our accepted format
     * @throws Exception if we can't decipher the payday variable passed in
     */

	public function generateBankDay(string $payday) {

		if (!strtotime($payday)) {
			throw new Exception('Could not recognise payday variable');
		}

		return date($this->date_format_str, strtotime('- 4 days', strtotime($payday)));
	}

	/**
     * Take year and month and find the date for the last friday of the month
     *
     * @param int Year like 2018
     * @param int Month like 1 or 5
     * @return string Date formatted according to our accepted format
     */

	private function lastFridayOfMonth(int $year, int $month) {

		$day = 0;
	  	while(true) {
	    	$last_day = mktime(0, 0, 0, $month+1, $day, $year); 
	    	if (date("l", $last_day) == 'Friday') {
	      		return date($this->date_format_str, $last_day);
	    	}
	    	$day -= 1;
	  	}
	}
}