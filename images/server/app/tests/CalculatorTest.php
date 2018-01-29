<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use AlbertCht\Lumen\Testing\TestCase;

/**
 * Some simple tests, to make sure the calculator and webservice are ok
 * Could add tons of stuff here if I had time. 
 */

class CalculatorTest extends TestCase
{

    /**
     * Check various sets of dates to be true
     *
     */
    public function testDatesSet1()
    {

         $response = $this->json( 'GET', '/payday/1/2018' );

         $response  ->assertStatus(200)
                    ->assertExactJson([   
                                        "bank_payment_day" => "Fri, 26th Jan 2018",
                                        "payday" => "Tue, 30th Jan 2018",
                                        "success" => true 
                                        ]);
        
    }

    public function testDatesSet2()
    {

         $response = $this->json( 'GET', '/payday/11/2020' );

         $response  ->assertStatus(200)
                    ->assertExactJson([   
                                        "bank_payment_day" => "Mon, 23rd Nov 2020",
                                        "payday" => "Fri, 27th Nov 2020",
                                        "success" => true 
                                        ]);
        
    }

    /**
     * Catch some exceptions
     *
     */

    public function testUrlStr()
    {

         $response = $this->json( 'GET', '/payday/11/abcd' );

         $response  ->assertStatus(200)
                    ->assertJsonFragment(['success' => false]);
        
    }

    public function testUrlStr2()
    {

         $response = $this->json( 'GET', '/payday/20/2019' );

         $response  ->assertStatus(200)
                    ->assertJsonFragment(['success' => false]);
        
    }

     public function testUrlStr3()
    {

         $response = $this->json( 'GET', '/payday/1/20190' );

         $response  ->assertStatus(200)
                    ->assertJsonFragment(['success' => false]);
        
    }


}
