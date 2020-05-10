<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\File; 
use App\Models\Category;
use App\Models\Company;
use App\Models\CompanyStaff;
use App\Models\CompanyService;
use App\Models\CompanyImage;
use App\Models\Service;
use App\Models\StaffBooking;
use App\User;
use Auth;

class CompanyController extends Controller
{
  
    
    public function index(Request $request)
    {
        $id = auth()->id();
        $slider = CompanyImage::where('company_id',$id)->get();

        $staffs = CompanyStaff::where('company_id',$id)->get();
        $company_services = CompanyService::where('company_id',$id)->with('service')->get();
 
        $service_id = [];
        foreach($company_services as $service){
            $service_id[] = $service['service_id']; 
        }
    

        //authorizaya olunmush shirket
        $logged_company= User::where('id',auth()->id())->first();
        //authorizasiya olunmush shirket hansi kateqoriyadandi
        $category_id = $logged_company['category_id'];
        // echo $service_id;

        //shirketin kateqiaya gore uyun oldugu lakin teklif etmediyi servisler
        $services = Service::where('category_id',$category_id)->whereNotIn('id',$service_id)->get();
  
        
        return view('company',compact('staffs','company_services','services','slider'));
    }

    public function addService(Request $request)
    {
        $id = $request['service'];
        $time = $request['time'];

        CompanyService::create([
            'company_id' => auth()->id(),
            'service_id' => $id,
            'minutes' => $time,
        ]);
        return redirect()->back();
    }

    public function deleteService(Request $request)
    {
        $id = $request['delete_service'];
        CompanyService::where('service_id',$id)->delete();
        // die('-');
        return redirect()->back();
    }

    public function addStaff(Request $request)
    {
        $name = $request['name'];
        $surname = $request['surname'];
        $mobile = $request['mobile'];

        $staff = new CompanyStaff;
        
        $staff->name = $name;
        $staff->surname = $surname;
        $staff->mobile = $mobile;

        if(isset($request['img'])){
            $filename = time().'.'.request()->img->getClientOriginalExtension();
            request()->img->move(public_path('images/staff'), $filename);
            $staff->image = $filename;
        }
        else{
            $staff->image = 'no_photo.png';
        }
       
        $staff->company_id = auth()->id();;

        if(isset($request['day1'])){
            $staff->start1 = null;
            $staff->end1 = null;
        }
        else{
            $staff->start1 = $request['start1'];
            $staff->end1 = $request['end1'];
        }
        //----------
        if(isset($request['day2'])){
            $staff->start2 = null;
            $staff->end2 = null;
        }
        else{
            $staff->start2 = $request['start2'];
            $staff->end2 = $request['end2'];
        }
        //----------
        if(isset($request['day3'])){
            $staff->start3 = null;
            $staff->end3 = null;
        }
        else{
            $staff->start3 = $request['start3'];
            $staff->end3 = $request['end3'];
        }
        //----------
        if(isset($request['day4'])){
            $staff->start4 = null;
            $staff->end4 = null;
        }
        else{
            $staff->start4 = $request['start4'];
            $staff->end4 = $request['end4'];
        }
        //----------
        if(isset($request['day5'])){
            $staff->start5 = null;
            $staff->end5 = null;
        }
        else{
            $staff->start5 = $request['start5'];
            $staff->end5 = $request['end5'];
        }
        //----------
      
        if(isset($request['day6'])){
            $staff->start6 = null;
            $staff->end6 = null;
        }
        else{
            $staff->start6 = $request['start6'];
            $staff->end6 = $request['end6'];
        }
        //----------
        if(isset($request['day7'])){
            $staff->start7 = null;
            $staff->end7 = null;
        }
        else{
            $staff->start7 = $request['start7'];
            $staff->end7 = $request['end7'];
        }

        $staff->save();

        $booking_time = new StaffBooking;
        $booking_time->staff_id = $staff->id;
        foreach($staff as $time){
            $starttime = '9:00';
            $endtime = '21:00';
        
            $duration = '30';  // split by 30 mins

            $array_of_time =  [];
            $start_time    = strtotime ($starttime); //change to strtotime
            $end_time      = strtotime ($endtime); //change to strtotime

            $add_mins  = $duration * 60;

            while ($start_time <= $end_time) // loop between time
            {
                $array_of_time[] = date ("h:i", $start_time);
                $start_time += $add_mins; // to check endtie=me
            } 
            $staff[$key] = $array_of_time;
            
            // echo '<pre>';
            // print_r($array_of_time);
            // echo '</pre>';
            
        }

        return redirect()->back();
    }

    public function deleteStaff(Request $request)
    {
        $id = $request['delete_staff'];

        $file = CompanyStaff::where('id',$id)->first();

        $image_path = public_path()."/images/staff/".$file['image'];  // Value is not URL but directory file path
        // echo $file['name'];
        // die();
        
        if(File::exists($image_path)) {
            // die('xc');
            File::delete($image_path);
        }
        $file = CompanyStaff::where('id',$id)->delete();
        // echo $file;

        // File::delete($filename);
        return redirect()->back();
    }

    public function addSlider(Request $request)
    {
        $images = [];
        if($request->hasFile('img1')){
            $filename = time().'.'.request()->img1->getClientOriginalExtension();
            request()->img1->move(public_path('images/slider'), $filename);
            $images[] = $filename;
         }

        if($request->hasFile('img2')){
            sleep(1);
        $filename = time().'.'.request()->img2->getClientOriginalExtension();
        request()->img2->move(public_path('images/slider'), $filename);
        $images[] = $filename;
        }

        if($request->hasFile('img3')){
            sleep(1);
            $filename = time().'.'.request()->img3->getClientOriginalExtension();
            request()->img3->move(public_path('images/slider'), $filename);
            $images[] = $filename;
         }

        foreach($images as $key => $image){
           CompanyImage::create([
            'company_id' => auth()->id(),
            'image_order' => $key,
            'image_filename' => $image,
        ]); 
        }
        return redirect()->back();
    }
    
    public function deleteSlider(Request $request)
    {
        $id = $request['delete_slide'];

        $file = CompanyImage::where('id',$id)->first();

        $image_path = public_path()."/images/slider/".$file['image_filename'];  // Value is not URL but directory file path
        
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $file = CompanyImage::where('id',$id)->delete();
        return redirect()->back();
    }
    


}
