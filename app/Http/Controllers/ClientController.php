<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CompanyStaff;
// use App\Models\CompanyImage;
use App\Models\CompanyService;
use App\Models\Service;
use App\User;

class ClientController extends Controller
{
    public function index()
    {

        $companies = Category::with('company')->get();
        // echo $a;
        
        return view('client',compact('companies'));
    }

    public function company($id)
    {
        // echo $id;
        // $company = Category::where('company')->get();
        $company = User::with('slider')->find($id);
        // $company = User::where('id',$id)->with('slider')->get();
        // echo $company;
        // die();
        $company_services = CompanyService::where('company_id',$id)->with('service')->get();
        
        return view('company-spesific',compact('company','company_services'));
    }

    public function showMasters(Request $request)
    {
        // echo $id;
        $date = $request['date'];

        $dayofweek = date('w', strtotime($date));
        if($dayofweek == 0){
            $check = 'start1'; $check2= 'end1';
        }elseif($dayofweek == 1){
            $check = 'start2'; $check2= 'end2';
        }elseif($dayofweek == 2){
            $check = 'start3'; $check2= 'end3';
        }elseif($dayofweek == 3){
            $check = 'start4';  $check2= 'end4';
        }elseif($dayofweek == 4){
            $check = 'start5';  $check2= 'end5';
        }elseif($dayofweek == 5){
            $check = 'start6'; $check2= 'end6';
        }elseif($dayofweek == 6){
            $check = 'start7';   $check2= 'end7';
        }


        $staff = CompanyStaff::whereNotNull($check)->select($check,$check2)->get();
        // echo $aa;

        $master_time = [];
        foreach($staff as $time){
            $starttime = $time[$check].':00';
            // echo "<br>";
            $endtime = $time[$check2].':00';
        
            // die();
            // echo $time[0][$check].':00'; 
            // $starttime = $aa[0][$check].':00';  // your start time
            // $endtime = '18:00';  // End time
            $duration = '30';  // split by 30 mins

            $array_of_time = array ();
            $start_time    = strtotime ($starttime); //change to strtotime
            $end_time      = strtotime ($endtime); //change to strtotime

            $add_mins  = $duration * 60;

            while ($start_time <= $end_time) // loop between time
            {
                $array_of_time[] = date ("h:i", $start_time);
                $start_time += $add_mins; // to check endtie=me
            } 
            $master_time[] = $array_of_time;
            
            // echo '<pre>';
            // print_r($array_of_time);
            // echo '</pre>';
            
            }
        print_r($master_time);
        return view('booking',compact('staff','master_time'));
    }
    // }
        

        // echo $request['service'];
        // die();
        // $company = Category::where('company')->get();
        // $company = User::with('slider')->find($id);
        // $company = User::where('id',$id)->with('slider')->get();
        // echo $company;
        // die();
        // $company_services = CompanyService::where('company_id',$id)->with('service')->get();
        
        // return view('company-spesific',compact('company','company_services'));
    

    
}
