<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Assessment;
use App\Models\OrderStatus;
use App\Models\AttachmentFilesUser;
use App\Models\Currencydata;
use App\Models\cmsModulesFront;
use App\Models\AllCustomersData;
use App\Models\orderassesmentimg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;


class DesignerJobsAllController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $CmsData = cmsModulesFront::all();
        
        $data = Assessment::WHERE(['assignId'=>session()->get('AGENT_ID')])->get();
        $dataStatus = OrderStatus::all();
        $Currencydata = Currencydata::all();
        $Admin = Admin::where(['userType'=>'1'])->get();
       return view('backend.alldesignerJobsorders')->with(['data'=>$data,'dataStatus'=>$dataStatus,'Currencydata'=>$Currencydata,'Admin'=>$Admin,'CmsData'=>$CmsData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getOrderfileAttachmentDesigner(Request $request){

        $orderid = $request->post('orderid');
        $cusidx = $request->post("cusidx");
        $CmsData = cmsModulesFront::all();

        if($request->hasFile('images')){

            foreach ($request->images as $image) {

                $image_name = md5(rand(1000,10000))."DD-".$orderid;
                $filenameWithExt = $image->getClientOriginalName();
                $extention = $image->getClientOriginalExtension();
                $fileNameToStore = $image_name.'.'.$extention;

                $path = $image->storeAs('public/OrderAttachment',$fileNameToStore);

                $AttachmentFilesUser = new orderassesmentimg();

                $AttachmentFilesUser->userid = $cusidx;
                $AttachmentFilesUser->orderid = $orderid;
                $AttachmentFilesUser->orderImg = $fileNameToStore;
                $AttachmentFilesUser->save();
            }

            $attachmentFiles = [];
            $attachmentFiles = orderassesmentimg::where(['orderid'=>$orderid])->get();
            $attachmentFiles = $attachmentFiles->pluck('orderImg')->toArray();
            $data=['name'=>$user[0]->name,"data"=>$user,'orderUrl'=>$fileNameToStore];
            $user['to']=$user[0]->emailaddress;
            Mail::send('backend/mailOrder',$data,function($messages) use ($user,$orderid,$attachmentFiles){
                $messages->to("citdev90@gmail.com");
                $messages->subject("Attachment for order DD-".$orderid);
                if(!empty($attachmentFiles)){
                    foreach($attachmentFiles as $attachment){
                        $messages->attach(Storage::disk('public')->path('OrderAttachment/'.$attachment));
                    }
                }
            });

        }
        
        $request->session()->flash('message',"Attachment Successfully Uploaded");
        return redirect('admin/all-orders-jobs')->with(['CmsData'=>$CmsData]);
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DesignerJobsAll  $designerJobsAll
     * @return \Illuminate\Http\Response
     */
    public function show(DesignerJobsAll $designerJobsAll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DesignerJobsAll  $designerJobsAll
     * @return \Illuminate\Http\Response
     */
    public function edit(DesignerJobsAll $designerJobsAll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DesignerJobsAll  $designerJobsAll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DesignerJobsAll $designerJobsAll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DesignerJobsAll  $designerJobsAll
     * @return \Illuminate\Http\Response
     */
    public function destroy(DesignerJobsAll $designerJobsAll)
    {
        //
    }
}
