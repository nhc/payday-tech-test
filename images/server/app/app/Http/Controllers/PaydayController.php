<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaydayController extends Controller
{

    /**
     * Simple web service to return 2 dates
     *
     * @param Request $request Lumen's request object providing input parameters etc
     * @param string $month from form input
     * @param string $year from form input
     * @return json Success returns success flag, payday date and bank payment date
     * @throws ResourceException if an error occurs, including data formatting issues and access control failures.
     */

    public function calculate(Request $request, string $month, string $year)
    {
        // create a query object in order to handle data coming in
        $query = new \App\Models\Query($month,$year);

        // Run checks and continue
        if($query->parse()) {

            $calculator = new \App\Models\PaydayCalculator($query);
            $payday = $calculator->generatePayDay();
            $bank_payment = $calculator->generateBankDay($payday);

            $output = ['success' => true, 'payday' => $payday, 'bank_payment_day' => $bank_payment];

            \App\Models\Logger::write('Web User',$query->month,$query->year,$payday,$bank_payment);

        }else{
            $output = ['success' => false, 'message' => 'Could not parse inputs correctly'];
        }

        return json_encode($output);
        
    }


}
