<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Category;
use App\Models\Company;
use App\Models\CompanyStaff;
use App\Models\CompanyService;
use App\Models\Service;
use App\User;
use Session;

class CompanyController extends Controller
{
  
    
    public function index(Request $request)
    {
        $id = auth()->id();
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
  
        
        return view('company',compact('staffs','company_services','services'));
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

        $filename = time().'.'.request()->img->getClientOriginalExtension();
        request()->img->move(public_path('images/staff'), $filename);
        // echo 
        

        CompanyStaff::create([
            'company_id' => auth()->id(),
            'name' => $name,
            'surname' => $surname,
            'mobile' => $mobile,
            'image' => $filename,
            'staff_order' => '0',
        ]);
            // die('-');
            return redirect()->back();
    }

    public function deleteStaff(Request $request)
    {
        $id = $request['delete_staff'];
        // echo $id;
        CompanyStaff::where('id',$id)->delete();
        // die('-');
        return redirect()->back();

        die('-');
        $name = $request['name'];
        $surname = $request['surname'];
        $mobile = $request['mobile'];

        $filename = time().'.'.request()->img->getClientOriginalExtension();
        request()->img->move(public_path('images/staff'), $filename);
        // echo 
        

        CompanyStaff::create([
            'company_id' => auth()->id(),
            'name' => $name,
            'surname' => $surname,
            'mobile' => $mobile,
            'image' => $filename,
            'staff_order' => '0',
        ]);
            // die('-');
            return redirect()->back();
    }
    
        // public function register(Request $request)
        // {
        //     $this->validate($request, [
        //         'name' => 'required|min:3|max:50',
        //         'email' => 'email',
        //         'password' => 'required|confirmed|min:6',
        //     ]);
    
        //     return view('booking',compact('categories'));
        // }


}
