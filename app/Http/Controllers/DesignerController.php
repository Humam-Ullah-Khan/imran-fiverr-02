<?php

namespace App\Http\Controllers;

use App\Models\cmsModulesFront;
use Illuminate\Http\Request;
use App\Models\Designer;
use App\Models\DesignerJob;
use App\Models\Currencydata;
use Illuminate\Pagination\Paginator;
use App\Models\orderassesmentimg;
use App\Models\AllCustomersData;
use Illuminate\Support\Facades\Storage;


class DesignerController extends Controller
{
    public function index()
    {
        return view('designer.login');
    }

    public function auth(Request $request)
    {        
        $username = $request->post('username');
        $password = $request->post('password');

        $result = Designer::where(['username' => $username, 'password' => $password])->first();
        if (isset($result) && !empty($result) && $result->userType == '1' && $result->adminStatus == 'active') {
            session()->put('DES_AGENT_ID', $result->id);
            session()->put('DES_USER_NAME', $result->username);
            session()->put('DES_AGENT_USERTYPE', $result->userType);
            session()->put('DES_USER_NAME', $result->username);
            return redirect('designer/dashboard')->withCookie(cookie('desyes', 'value', 10));
        } else {
            $request->session()->flash('error', 'Please Enter Valid Login Details');

            return redirect('designer');
        }
    }


    public function dashboard()
    {
        if(!cookie('desyes')){
            return redirect('designer');
        }
        if(!session()->has('DES_AGENT_USERTYPE')){
            return redirect('designer');
        }
        $cmsModulesFront = cmsModulesFront::all();
        return view('designer.dashboard', ['cmsModulesFront' => $cmsModulesFront]);
    }


    // Job List
    public function jobList()
    {
        if(!cookie('desyes')){
            return redirect('designer');
        }
        if(!session()->has('DES_AGENT_USERTYPE')){
            return redirect('designer');
        }

        $CmsData = cmsModulesFront::all();
        $designer_id = session()->get('DES_AGENT_ID');
        $designerJob = DesignerJob::where('designer_id', $designer_id)->where('status', 'Processing')->paginate(10);
        Paginator::defaultView('vendor.pagination.bootstrap-4');
        $Currencydata = Currencydata::all();
        return view('designer.jobList', ['designerJob' => $designerJob, 'CmsData' => $CmsData, 'Currencydata' => $Currencydata]);
    }

    // job history
    public function jobHistory()
    {
        if(!cookie('desyes')){
            return redirect('designer');
        }
        if(!session()->has('DES_AGENT_USERTYPE')){
            return redirect('designer');
        }
        $CmsData = cmsModulesFront::all();
        $designer_id = session()->get('DES_AGENT_ID');
        $designerJob = DesignerJob::where('designer_id', $designer_id)
            ->where(function($query) {
            $query->where('status', 'Completed')
                  ->orWhere('status', 'Cancelled');
            })
            ->paginate(10);
            Paginator::defaultView('vendor.pagination.bootstrap-4');
        $Currencydata = Currencydata::all();
        return view('designer.jobHistory', ['designerJob' => $designerJob, 'CmsData' => $CmsData, 'Currencydata' => $Currencydata]);
    }

    public function orderComplete(Request $request){
        if(!cookie('desyes')){
            return redirect('designer');
        }
        if(!session()->has('DES_AGENT_USERTYPE')){
            return redirect('designer');
        }
        $designer_id = session()->get('DES_AGENT_ID');
        $job_id = $request->get('job_id');
        $designerJob = DesignerJob::where('id', $job_id)->first();
        if($designerJob){
            $designerJob->status = "Completed";
            $designerJob->complete_date = date('Y-m-d H:i:s');
            $designerJob->save();
            return back()->with('success', 'Order Completed Successfully!');
        }
        return back()->with('error', 'Something went wrong!');
    }

    public function orderProcessing(Request $request){
        if(!cookie('desyes')){
            return redirect('designer');
        }
        if(!session()->has('DES_AGENT_USERTYPE')){
            return redirect('designer');
        }

        $designer_id = session()->get('DES_AGENT_ID');
        $job_id = $request->get('job_id');
        $designerJob = DesignerJob::where('designer_id', $designer_id)->where('id', $job_id)->first();
        if($designerJob){
            $designerJob->status = "Processing";
            $designerJob->save();
            return back()->with('success', 'Order Processing Successfully!');
        }
        return back()->with('error', 'Something went wrong!');
    }

    public function getDesignerOrderfileAttachment(Request $request)
    {
        $orderid = $request->post('orderid');
        $cusidx = $request->post('cusidx');
        $CmsData = cmsModulesFront::all();
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $image_name = md5(rand(1000, 10000)).'DD-'.$orderid;
                $filenameWithExt = 'DD-'.$orderid.$image->getClientOriginalName();
                $extention = $image->getClientOriginalExtension();
                $fileNameToStore = $filenameWithExt;

                $path = $image->storeAs('public/OrderAttachment', $fileNameToStore);

                $AttachmentFilesUser = new orderassesmentimg();

                $AttachmentFilesUser->userid = $cusidx;
                $AttachmentFilesUser->orderid = $orderid;
                $AttachmentFilesUser->orderImg = $fileNameToStore;
                $AttachmentFilesUser->save();
            }

            // $attachmentFiles = [];
            // $attachmentFiles = orderassesmentimg::where(['orderid' => $orderid])->get();
            // $attachmentFiles = $attachmentFiles->pluck('orderImg')->toArray();
            // $user = AllCustomersData::where(['id' => $cusidx])->get();
            // // $data = ['name' => $user[0]->name, 'data' => $user, 'orderUrl' => $fileNameToStore];
            // // $user['to'] = $user[0]->emailaddress;
            // // \Mail::send('backend/mailOrder', $data, function ($messages) use ($orderid, $attachmentFiles) {
            // //     $messages->to('citdev90@gmail.com');
            // //     $messages->subject('Attachment for order DD-'.$orderid);
            // //     if (!empty($attachmentFiles)) {
            // //         foreach ($attachmentFiles as $attachment) {
            // //             $messages->attach(Storage::disk('public')->path('OrderAttachment/'.$attachment));
            // //         }
            // //     }
            // // });
        }

        $request->session()->flash('message', 'Attachment Successfully Uploaded');

        return redirect('designer/job-list')->with(['CmsData' => $CmsData]);
    }



    public function orderDownloadCOm($id)
{
    $datxx = orderassesmentimg::where(['orderid' => $id])->get();

    $imgarr = [];
    foreach ($datxx as $key => $value) {
        // Ensure to get the absolute path for the files
        $imgarr[] = storage_path('app/public/OrderAttachment/'.$value->orderImg);
    }

    // Pass the array of image paths to convertToZip
    return $this->converToZip($imgarr, $id);
}

public function converToZip($imgarr, $orderid)
{
    // Retrieve CMS data
    $CmsData = cmsModulesFront::all();

    // Create ZipArchive instance
    $zip = new \ZipArchive();
    $storage_path = storage_path('app/public/OrderAttachment'); // Absolute path for storage folder
    $timeName = $CmsData[0]->AttachmentZip.'-'.$orderid;
    $zipFileName = $storage_path.'/'.$timeName.'.zip';  // Absolute path for the zip file

    // Create and open the zip file
    if ($zip->open($zipFileName, \ZipArchive::CREATE) === true) {
        // Loop through image paths and add them to the zip archive
        foreach ($imgarr as $absFilePath) {
            // Check if the file exists before adding it to the zip
            if (file_exists($absFilePath)) {
                $zip->addFile($absFilePath, basename($absFilePath));  // Add with original filename
            } else {
                // Log or handle the case where the file doesn't exist
                \Log::warning("File does not exist: " . $absFilePath);
            }
        }
        // Close the zip file after adding all files
        $zip->close();

        // Return the zip file for download
        return response()->download($zipFileName);
    }

    // Return false if zip creation fails
    return response()->json(['error' => 'Failed to create zip file'], 500);
}

}
