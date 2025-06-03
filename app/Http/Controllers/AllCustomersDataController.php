<?php

namespace App\Http\Controllers;

use App\Models\AllCustomersData;
use App\Models\Admin;
use App\Models\Assessment;
use App\Models\OrderStatus;
use App\Models\AttachmentFilesUser;
use App\Models\Currencydata;
use App\Models\cmsModulesFront;
use Illuminate\Http\Request;
use Mail;
use Storage;
use Illuminate\Pagination\Paginator;

class AllCustomersDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $CmsData = cmsModulesFront::all();
        $currentPage = $request->get('page', 1);
        $perPage = 100;

        if($request->get('sid') != ""){
            $data = AllCustomersData::WHERE(['id'=>$request->get('sid')])->orderBy('id','desc')->paginate($perPage);
        }elseif($request->get('sna') != ""){
            $data = AllCustomersData::WHERE('name','LIKE','%'.$request->get('sna').'%')->orderBy('id','desc')->paginate($perPage);
        }elseif($request->get('sne') != ""){
            $data = AllCustomersData::WHERE('email','LIKE','%'.$request->get('sne').'%')->orderBy('id','desc')->paginate($perPage);
        }else{
            $data = AllCustomersData::orderBy('id','desc')->paginate($perPage);
        }
        $Currencydata = Currencydata::all();
        Paginator::defaultView('vendor.pagination.bootstrap-4');
       return view('backend.allCustomerData')->with(['data'=>$data,'Currencydata'=>$Currencydata,'CmsData'=>$CmsData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetCustomerUpdate(Request $request)
    {
        
        $cname = $request->post('cname');
        $cemail = $request->post('cemail');
        $cnumber = $request->post('cnumber');
        $instructions = $request->post('instructions');
        $ccurrency = $request->post('ccurrency');
        $cstatus = $request->post('cstatus');
        $cusid = $request->post('cusid');

        $model=AllCustomersData::find($cusid);
        $model->name = $cname;
        $model->mobileno = $cnumber;
        $model->emailaddress = $cemail;
        $model->customerInstruction = $instructions;
        $model->status = $cstatus;
        $model->currency = $ccurrency;
        $model->update();

        Assessment::where('userid', $cusid)
        ->update([
            'CurrencyType' => $ccurrency
            ]);

        $request->session()->flash('message',"Customer Details Successfully Updated");
        return redirect('admin/all-customer-data');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CustomerDelete(Request $request , $id="")
    {
      
        $getJobs = Assessment::where(['userid'=>$id])->count();
        if(isset($getJobs) && $getJobs > 0){
            
            $msg= "You Can Not Deleted this customer Account You Have Already $getJobs Jobs Your Account Please First Removes All Jobs";
            
        }else{
            $res=AllCustomersData::where('id',$id)->delete();
            $msg= "Account Deleted Successfully!";
        }
       
        $request->session()->flash('message',$msg);
        return redirect('admin/all-customer-data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AllCustomersData  $allCustomersData
     * @return \Illuminate\Http\Response
     */
    public function show(AllCustomersData $allCustomersData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AllCustomersData  $allCustomersData
     * @return \Illuminate\Http\Response
     */
    public function edit(AllCustomersData $allCustomersData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AllCustomersData  $allCustomersData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllCustomersData $allCustomersData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AllCustomersData  $allCustomersData
     * @return \Illuminate\Http\Response
     */
    public function destroy(AllCustomersData $allCustomersData)
    {
        //
    }
}
