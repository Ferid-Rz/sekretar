<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffService;
use App\Models\Service;
use App\Models\ClientBooking;
use App\Models\Category;
use App\Models\CompanyStaff;
use DateTime;
use DatePeriod;
use DateInterval;
use App\User;

class StaffController extends Controller
{
    public function index()
    {

        $companies = Category::with('company')->get();
        // echo $a;
        
        return view('client',compact('companies'));
    }

    public function showServices(Request $request)
    {
        // echo $id;
        $id = $request['staff_id'];
        $date = StaffService::where('staff_id',$id)->with('service')->get();
        
        // $date = $request['staff_id'];

        return response()->json([$date], 200);
        // return view('company-spesific',compact('date'));
    }


    public function test(Request $request)
    {
        // echo $id;
        // echo "sss";
        // $date = new DateTime('2000-01-01');
        // echo $date->format('Y-m-d H:i:s');
        

        // echo "<br>";
        // echo date('Y-m-d H:i', $aa[0]['start_date']) . "<br />";


        // $int = (int)$aa[0]['start_date'];
        
        // echo "<br>";
        // $startDate = time();
        // $bb = date('Y-m-d H:i:s', strtotime('+1 day', $startDate));
        // echo $bb;

        // $timezone = date_default_timezone_get();
        // echo "The current server timezone is: " . $timezone;

        // echo $date = date('m/d/Y h:i:s a', time('tomorrow'));

        $date = new DateTime("2013-01-12");
        //add one week to date
        // echo $date->add(new DateInterval('P1W'))->format('Y-m-d');echo "<br>";
        echo "<br>";


        
        // echo "-------------<br>";
        // $xmasDay = new DateTime('today + 1 day');
        // $xmasDay = new DateTime('today + 1 week');
        // echo $xmasDay->format('Y-m-d'); 
        // echo "<br>-------------";
        for($i = 1; $i<=7 ; $i++){   

            $tomorrow = new Datetime('today + '.$i.' day');

            //-------------
            $select_month = $tomorrow->format('Y-m-d');
            $select_day = $tomorrow->format('d');
            $month = date('F', strtotime($select_month));
            $dd = $month.'-'.$select_day;
           
            $tomorrow = $tomorrow->format('Y-m-d');

            $interval = 1800; // Interval in seconds
            $date_first     = $tomorrow." 9:00";
            $date_second    = $tomorrow." 18:00";

            $time_first     = strtotime($date_first);
            $time_second    = strtotime($date_second);

            $bookings = ClientBooking::select('start_date')->get();
            
            for ($j = $time_first; $j < $time_second; $j += $interval){

                foreach($bookings as $book){
                    $booklarim[] = $book['start_date'];
                    // if($book['start_date'] == $i ){
                    //     echo "VAR<br>";
                    // }
                }
                // print_r($booklarim);
                // die();
                if(in_array($j, $booklarim)) { 
                    // $arr[] = 
                    continue;
                } 
                else{
                    // $arr[] = $i;
                    $arr[] = date('H:i', $j);
                }         
            }
            // print_r($arr);   
            // die(); 
            $hours[] = $arr;
            $days[] = $month.'-'.$select_day;;
            unset ( $arr );
        }

        // print_r($hours);
        // die();
        // echo "<br>";
        // print_r($days[]);
        
        
        
        $id = 1;
        $company = User::with('slider')->find($id);
        $company_services = CompanyStaff::where('company_id',$id)->with('service')->get();
        
        
        return view('company-spesific',compact('company','company_services','days','hours'));
        
        
        die();







        $date_first     = "2020-05-25 9:00";
        $date_second    = "2020-05-25 18:00";

        $time_first     = strtotime($date_first);
        $time_second    = strtotime($date_second);

        for ($i = $time_first; $i < $time_second; $i += $interval){
            // echo date('Y-m-d H:i', $i) . "<br />";
            echo $i."<br>";

        }




        // echo $d->getTimestamp();


        die();
        $id = $request['staff_id'];
        $date = StaffService::where('staff_id',$id)->with('service')->get();
        
        // $date = $request['staff_id'];

        return response()->json([$date], 200);
        // return view('company-spesific',compact('date'));
    }
}
