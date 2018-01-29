<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Exception;
use App\Exception\ValidationException;

/**
 * This class is responsible for the input for the web service. 
 * It is important to clean and validate the input of any web form. We would do this here.
 *
 */

class Query
{
	public $month;
	public $year;

	/**
     * Takes the month and year as string (always is a string from a webform) and cast to integers
     *
     * @param string $month send from the form in this case
     * @param string $year send from the form in this case
     */

	function __construct(string $month, string $year) {
		$this->month = $month;
		$this->year = $year;
	}

	/**
     * Run any tests on the input here and convert if required
     *
     * @return boolean So caller either passes or fails. 
     */

	public function parse() {

		if($this->isValidMonth($this->month) && $this->isValidYear($this->year) ){
			return true;
		}

		return false;
	}

	/**
     *  Is this a valid month
     *
     * @param string|integer $input variables to test
     * @return boolean So caller either passes or fails. 
     */

	protected function isValidMonth($input) {

		if ($input >= 1 && $input <= 12 ) {
			return true;
		}
		return false;
	}

	/**
     *  Is this a valid year
     *
     * @param string|integer $input variables to test
     * @return boolean So caller either passes or fails. 
     */

	protected function isValidYear($input) {

		if ($input >= 2017 && $input <= 9999 ) {
			return true;
		}
		return false;
	}
}