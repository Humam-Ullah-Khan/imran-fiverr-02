<?php

namespace App\Http\Controllers;

use App\Models\cmsModulesFront;
use Illuminate\Http\Request;

class CmsModulesFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = cmsModulesFront::all();
         $CmsData = cmsModulesFront::all();
        return view('backend.allCmsPanel')->with(['data'=>$data,'CmsData'=>$CmsData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetprocessPanel(Request $request)
    {
        $frontemail = $request->post('frontemail');
        $frontphone = $request->post('frontphone');
        $abouttitle = $request->post('abouttitle');
        $aboutDesc = $request->post('aboutDesc');
        $primaryColorCode = $request->post('primaryColorCode');
        $secondaryColorCode = $request->post('secondaryColorCode');
        $cusid = $request->post('cusid');
        $DigitizePrice = $request->post('DigitizePrice');
        $vectorizedPrice = $request->post('vectorizedPrice');
        $paypalcharges = $request->post('paypalcharges');
        $attachmentzipCode = $request->post('attachmentzipCode');


        if($request->hasFile('logo')){

            $image = $request->logo;

            $image_name = md5(rand(1000,10000));
            $filenameWithExt = $image->getClientOriginalName();
            $extention = $image->getClientOriginalExtension();
            $fileNameToStore = $image_name.'.'.$extention;

            $path = $image->storeAs('public/FrontLogo',$fileNameToStore);

        }else{

            $dataget = cmsModulesFront::where(['id'=>$cusid])->get();
            $fileNameToStore = $dataget[0]->FrontLogo;

        }


        if($request->hasFile('banner')){

            $image = $request->banner;

            $image_name = md5(rand(1000,10000));
            $filenameWithExt = $image->getClientOriginalName();
            $extention = $image->getClientOriginalExtension();
            $fileNameToStore2 = $image_name.'.'.$extention;

            $path = $image->storeAs('public/FrontBanner',$fileNameToStore2);

        }else{

            $dataget = cmsModulesFront::where(['id'=>$cusid])->get();
            $fileNameToStore2 = $dataget[0]->frontBanner;

        }

        
        

        $model=cmsModulesFront::find($cusid);
        $model->frontEmail = $frontemail;
        $model->frontPhone = $frontphone;
        $model->FrontLogo = $fileNameToStore;
        $model->frontBanner = $fileNameToStore2;
        $model->aboutTitle = $abouttitle;
        $model->aboutDesc = $aboutDesc;
        $model->primaryColor = $primaryColorCode;
        $model->secondaryColor = $secondaryColorCode;
        $model->digitizePrice = $DigitizePrice;
        $model->vectorizePrice = $vectorizedPrice;
        $model->paypalCharges = $paypalcharges;
        $model->AttachmentZip = $attachmentzipCode;
        $model->update();

        $request->session()->flash('message',"Cms Content Successfully Updated");
        return redirect('admin/all-cms-content');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cmsModulesFront  $cmsModulesFront
     * @return \Illuminate\Http\Response
     */
    public function show(cmsModulesFront $cmsModulesFront)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cmsModulesFront  $cmsModulesFront
     * @return \Illuminate\Http\Response
     */
    public function edit(cmsModulesFront $cmsModulesFront)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cmsModulesFront  $cmsModulesFront
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cmsModulesFront $cmsModulesFront)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cmsModulesFront  $cmsModulesFront
     * @return \Illuminate\Http\Response
     */
    public function destroy(cmsModulesFront $cmsModulesFront)
    {
        //
    }
}
