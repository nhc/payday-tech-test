<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Exception;
use App\Exception\ValidationException;

/**
 * This class is responsible for the logging of calls to our calculator 
 * We currently use MYSQL. 
 *
 *	The DB: functions have a certain level of security built in, but we could certainly beef up 
 * 	checking of values here before we insert them. However most have been through checks already. 
 */

class Logger
{

	/**
     * Log all queries to mysql table
     *
     * @param string $name username (currently the same each time)
     * @param string $month from the query input
     * @param string $year from the query input
     * @param string $payday generated from our calculator
     * @param string $send_to_bank generated from our calculator
     * @return boolean true or false
     */

	public static function write($name, $month, $year, $payday, $send_to_bank) {

		DB::insert('insert into Logger 
					(`id`, `username`,`query_month`, `query_year`,`payday`, `bank_day`,`ts`) 
						values (?, ?, ?, ?, ?, ?, ?)', 
					['', $name, $month, $year, $payday, $send_to_bank,time()] );

	}
}
