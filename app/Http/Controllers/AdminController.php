<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AllCustomersData;
use App\Models\Assessment;
use App\Models\cmsModulesFront;
use App\Models\Currencydata;
use App\Models\DiscountCode;
use App\Models\orderassesmentimg;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use App\Models\DesignerJob;
use App\Models\Designer;
class AdminController extends Controller
{
    public function index()
    {
        return view('backend.login');
    }

    public function auth(Request $request)
    {
        $username = $request->post('username');
        $password = $request->post('password');

        $result = Admin::where(['username' => $username, 'password' => $password])->get();
        if (isset($result[0]->id)) {
            session()->put('AGENT_ID', $result[0]->id);
            session()->put('USER_NAME', $result[0]->username);
            session()->put('AGENT_USERTYPE', $result[0]->userType);

            return redirect('admin/dashboard')->withCookie(cookie('adyes', 'value', 10));
        } else {
            $request->session()->flash('error', 'Please Enter Valid Login Details');

            return redirect('admin');
        }
    }

    public function orderCancel(Request $request){
        if(!cookie('adyes')){
            return redirect('admin');
        }
        $job_id = $request->get('job_id');
        $designerJob = DesignerJob::where('job_id', $job_id)->latest()->first();
        if($designerJob){
            $designerJob->status = "Cancelled";
            $designerJob->save();
            // Assessment::where('id', $job_id)->update(['Estatus' => 'Pending']);
            return back()->with('success', 'Order Cancelled Successfully!');
        }

        return back()->with('error', 'Something went wrong!');
    }

    
    public function dashboard(Request $request)
    {
        $eda = $request->cookie('adyes');

        // pagination code

        try {
            if ($eda) {
                $currentPage = $request->get('page', 1);
                $perPage = 10;

                if ($request->get('sid') != '') {
                    $data = Assessment::whereRaw('Estatus != ""')->where(['id' => $request->get('sid')])->orderBy('id', 'desc')->paginate($perPage);
                } elseif ($request->get('sna') != '') {
                    $data = Assessment::whereRaw('Estatus != ""')->where('name', 'LIKE', '%'.$request->get('sna').'%')->orderBy('id', 'desc')->paginate($perPage);
                } elseif ($request->get('sne') != '') {
                    $data = Assessment::whereRaw('Estatus != ""')->where('email', 'LIKE', '%'.$request->get('sne').'%')->orderBy('id', 'desc')->paginate($perPage);
                } else {
                    $data = Assessment::whereRaw('Estatus != ""')->orderBy('id', 'desc')->paginate($perPage);
                }


                Paginator::defaultView('vendor.pagination.bootstrap-4');

                if (session()->get('AGENT_USERTYPE') == 1) {
                    $dataCount = Assessment::where(['assignId' => session()->get('AGENT_ID')])->whereRaw('Estatus != ""')->count();
                } else {
                    $dataCount = Assessment::whereRaw('Estatus != ""')->count();
                }

                $dataStatus = OrderStatus::all();

                $rejectCount = Assessment::where(['Estatus' => 'Close'])->count();
                $PendingCount = Assessment::where(['Estatus' => 'Pending'])->count();
                $onProcessCount = Assessment::where(['Estatus' => 'Processing'])->count();
                $onReadyCount = Assessment::where(['Estatus' => 'Ready'])->count();
                $onHoldCount = Assessment::where(['Estatus' => 'Hold'])->count();

                $CmsData = cmsModulesFront::all();

                return view('backend.dashboard')->with(['data' => $data, 'dataCount' => $dataCount, 'dataStatus' => $dataStatus, 'rejectCount' => $rejectCount, 'PendingCount' => $PendingCount, 'onProcessCount' => $onProcessCount, 'onReadyCount' => $onReadyCount, 'onHoldCount' => $onHoldCount, 'CmsData' => $CmsData]);
            } else {
                session()->forget('AGENT_ID');
                session()->forget('USER_NAME');
                session()->forget('AGENT_USERTYPE');

                return redirect('/admin');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function getOrderStatusChange(Request $request)
    {
        $dataid = $request->post('dataid');
        $statusx = $request->post('statusx');

        // $data = Assessment::find('');

        $model = Assessment::find($dataid);
        $model->Estatus = $statusx;
        $model->update();

        $msg = 'okay';

        return $msg;
    }

    public function getOrderfileAttachmentprocessing(Request $request)
    {
        $orderid = $request->post('orderid');
        $cusidx = $request->post('cusidx');
        $CmsData = cmsModulesFront::all();
        $user = AllCustomersData::where(['id' => $cusidx])->get();
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
                // $attachmentFiles = $fileNameToStore;
            }

            $attachmentFiles = [];
            $attachmentFiles = orderassesmentimg::where(['orderid' => $orderid])->get();
            $attachmentFiles = $attachmentFiles->pluck('orderImg')->toArray();
            $data = ['name' => $user[0]->name, 'data' => $user, 'orderUrl' => $fileNameToStore];
            $user['to'] = $user[0]->emailaddress;
            \Mail::send('backend/mailOrder', $data, function ($messages) use ($orderid, $attachmentFiles) {
                $messages->to('citdev90@gmail.com');
                $messages->subject('Attachment for order DD-'.$orderid);
                if (!empty($attachmentFiles)) {
                    foreach ($attachmentFiles as $attachment) {
                        $messages->attach(Storage::disk('public')->path('OrderAttachment/'.$attachment));
                    }
                }
            });
        }

        $request->session()->flash('message', 'Attachment Successfully Uploaded');

        return redirect('admin/all-processing-orders')->with(['CmsData' => $CmsData]);
    }

    public function getOrderfileAttachment(Request $request)
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

            $attachmentFiles = [];
            $attachmentFiles = orderassesmentimg::where(['orderid' => $orderid])->get();
            $attachmentFiles = $attachmentFiles->pluck('orderImg')->toArray();
            $user = AllCustomersData::where(['id' => $cusidx])->get();
            // $data = ['name' => $user[0]->name, 'data' => $user, 'orderUrl' => $fileNameToStore];
            // $user['to'] = $user[0]->emailaddress;
            // \Mail::send('backend/mailOrder', $data, function ($messages) use ($orderid, $attachmentFiles) {
            //     $messages->to('citdev90@gmail.com');
            //     $messages->subject('Attachment for order DD-'.$orderid);
            //     if (!empty($attachmentFiles)) {
            //         foreach ($attachmentFiles as $attachment) {
            //             $messages->attach(Storage::disk('public')->path('OrderAttachment/'.$attachment));
            //         }
            //     }
            // });
        }

        $request->session()->flash('message', 'Attachment Successfully Uploaded');

        return redirect('admin/all-pending-orders')->with(['CmsData' => $CmsData]);
    }

    public function GetImageDetails(Request $request)
    {
        $orderid = $request->get('orderid');
        // $cusid = $request->get('cusid');

        $data = orderassesmentimg::where(['orderid' => $orderid])->get();

        return json_encode($data);
    }

    

    public function PendingOrders(Request $request)
    {
        $eda = $request->cookie('adyes');
        if ($eda == true) {
            $CmsData = cmsModulesFront::all();
            $currentPage = $request->get('page', 1);
            $perPage = 100;

            if ($request->get('sid') != '') {
                $data = Assessment::where(['Estatus' => 'Pending'])->where(['id' => $request->get('sid')])->orderBy('id', 'desc')->paginate($perPage);
            } elseif ($request->get('sna') != '') {
                $data = Assessment::where(['Estatus' => 'Pending'])->where('name', 'LIKE', '%'.$request->get('sna').'%')->orderBy('id', 'desc')->paginate($perPage);
            } elseif ($request->get('sne') != '') {
                $data = Assessment::where(['Estatus' => 'Pending'])->where('email', 'LIKE', '%'.$request->get('sne').'%')->orderBy('id', 'desc')->paginate($perPage);
            } else {
                $data = Assessment::where(['Estatus' => 'Pending'])->orderBy('id', 'desc')->paginate($perPage);
            }


            $discountCodes = DiscountCode::all();

            Paginator::defaultView('vendor.pagination.bootstrap-4');
            $dataStatus = OrderStatus::all();
            $Currencydata = Currencydata::all();
            $Admin = Designer::where(['userType' => '1'])->get();

            return view('backend.allpendingorders')->with(['data' => $data,'discountCodes'=>$discountCodes, 'dataStatus' => $dataStatus, 'Currencydata' => $Currencydata, 'Admin' => $Admin, 'CmsData' => $CmsData]);
        } else {
            session()->forget('AGENT_ID');
            session()->forget('USER_NAME');
            session()->forget('AGENT_USERTYPE');

            return redirect('/admin');
        }
    }

    public function ProcessingOrders(Request $request)
    {
        $eda = $request->cookie('adyes');
        if ($eda == true) {
            $CmsData = cmsModulesFront::all();

            $currentPage = $request->get('page', 1);
            $perPage = 100;

            if ($request->get('sid') != '') {
                $data = Assessment::where(['Estatus' => 'Processing'])->where(['id' => $request->get('sid')])->orderBy('id', 'desc')->paginate($perPage);
            } elseif ($request->get('sna') != '') {
                $data = Assessment::where(['Estatus' => 'Processing'])->where('name', 'LIKE', '%'.$request->get('sna').'%')->orderBy('id', 'desc')->paginate($perPage);
            } elseif ($request->get('sne') != '') {
                $data = Assessment::where(['Estatus' => 'Processing'])->where('email', 'LIKE', '%'.$request->get('sne').'%')->orderBy('id', 'desc')->paginate($perPage);
            } else {
                $data = Assessment::where(['Estatus' => 'Processing'])->orderBy('id', 'desc')->paginate($perPage);
            }

            Paginator::defaultView('vendor.pagination.bootstrap-4');

            $dataStatus = OrderStatus::all();
            $Currencydata = Currencydata::all();
            $Admin = Designer::where(['userType' => '1'])->get();

            return view('backend.allprocessingorders')->with(['data' => $data, 'dataStatus' => $dataStatus, 'Currencydata' => $Currencydata, 'Admin' => $Admin, 'CmsData' => $CmsData]);
        } else {
            session()->forget('AGENT_ID');
            session()->forget('USER_NAME');
            session()->forget('AGENT_USERTYPE');

            return redirect('/admin');
        }
    }

    public function getPendingOrderRequest(Request $request)
    {
        $orderid = $request->get('orderid');
        $jobstatus = $request->post('jobstatus');
        $Amount = $request->post('AmountStatus');
        $commentLabel = $request->post('commentLabel');

        $model = Assessment::find($orderid);
        $model->Estatus = $jobstatus;
        $model->Amount = $Amount;
        $model->update();

        $request->session()->flash('message', 'Order Status Successfully Changed');

        return redirect('admin/all-pending-orders');
    }

    public function getprocessingOrderRequest(Request $request)
    {
        $orderid = $request->get('orderid');
        $jobstatus = $request->post('jobstatus');
        $Amount = $request->post('Amount');
        $commentLabel = $request->post('commentLabel');

        $model = Assessment::find($orderid);
        $model->Estatus = $jobstatus;
        $model->Amount = $Amount;
        $model->update();

        if($jobstatus == 'Ready'){
            $designerJob = DesignerJob::where('job_id', $orderid)->whereRaw("Status = 'Processing'")->first();
            if($designerJob){
                $designerJob->status = 'Ready';
                $designerJob->update();
            }
        }

        $request->session()->flash('message', 'Order Status Successfully Changed');

        return redirect('admin/all-processing-orders');
    }

    public function getorderUpdate(Request $request)
    {
        $orderid = $request->get('orderid');
        $orderattrib = $request->post('orderattrib');
        $height = $request->post('height');
        $width = $request->post('width');
        $Amount = $request->post('Amount');
        $details = $request->post('details');
        $currency = $request->post('currency');

        $model = Assessment::find($orderid);
        $model->additional_attributes = $orderattrib;
        $model->height = $height;
        $model->width = $width;
        $model->details = $details;
        $model->CurrencyType = $currency;
        $model->Amount = $Amount;
        $model->update();

        $request->session()->flash('message', 'Order Details Successfully Updated');

        return redirect('admin/all-pending-orders');
    }

    public function getorderProcessingUpdate(Request $request)
    {
        $orderid = $request->get('orderid');
        $orderattrib = $request->post('orderattrib');
        $height = $request->post('height');
        $width = $request->post('width');
        $Amount = $request->post('Amount');
        $details = $request->post('details');
        $currency = $request->post('currency');

        $model = Assessment::find($orderid);
        $model->additional_attributes = $orderattrib;
        $model->height = $height;
        $model->width = $width;
        $model->details = $details;
        $model->CurrencyType = $currency;
        $model->Amount = $Amount;
        $model->update();

        $request->session()->flash('message', 'Order Details Successfully Updated');

        return redirect('admin/all-processing-orders');
    }

    public function getorderProcessingMail(Request $request)
    {
        $orderidx = $request->post('oid');

        $Assessment = Assessment::where(['id' => $orderidx])->get();

        $ordeEmail = $Assessment[0]->email;
        $orderName = $Assessment[0]->name;
        $ordePrice = $Assessment[0]->Amount;
        $CurrencyType = $Assessment[0]->CurrencyType;

        $orderUrl = "https://www.paypal.com/cgi-bin/webscr?business=order@mastersdigitizing.co.uk&cmd=_xclick&currency_code=$CurrencyType&amount=$ordePrice&item_name=DD$orderidx";

        $data = ['name' => $orderName, 'data' => $Assessment, 'orderUrl' => $orderUrl];
        $user['to'] = $ordeEmail;
        \Mail::send('backend/mailOrder', $data, function ($messages) use ($orderidx, $ordeEmail) {
            $messages->to($ordeEmail);
            $messages->subject('Complete your order DD-'.$orderidx);
        });

        $request->session()->flash('message', 'Payment Email Send to Customer');

        return redirect('admin/all-processing-orders');
    }

    public function getorderProcessingAssignJob(Request $request)
    {
        $CmsData = cmsModulesFront::all();
        $orderxidx = $request->post('orderxidx');
        $designerlist = $request->post('designerlist');

        $model = Assessment::find($orderxidx);
        $model->assignId = $designerlist;
        $model->update();

        $request->session()->flash('message', 'Order Assign Successfully');

        return back()->with(['CmsData' => $CmsData]);
    }

    public function orderPendingMalQuotationJob(Request $request)
    {
        $CmsData = cmsModulesFront::all();
        $orderidx = $request->post('oid');

        $Assessment2 = Assessment::where(['id' => $orderidx])->get();

        $ordeEmail = $Assessment2[0]->email;
        $orderName = $Assessment2[0]->name;
        $ordePrice = $Assessment2[0]->Amount;
        $CurrencyType = $Assessment2[0]->CurrencyType;
        $orderUrl = "https://www.paypal.com/cgi-bin/webscr?business=order@mastersdigitizing.co.uk&cmd=_xclick&currency_code=$CurrencyType&amount=$ordePrice&item_name=DD$orderidx";

        $data = ['name' => $orderName, 'datax' => $Assessment2, 'orderUrl' => $orderUrl];
        $user['to'] = $ordeEmail;
        \Mail::send('backend/mailquotationOrder', $data, function ($messages) use ($orderidx, $ordeEmail) {
            $messages->to($ordeEmail);
            $messages->subject('Quotation your order DD-'.$orderidx);
        });

        $request->session()->flash('message', 'Payment Email Send to Customer');

        return redirect('admin/all-pending-orders')->with(['CmsData' => $CmsData]);
    }

    public function getorderPendingMalJob(Request $request)
    {
        $CmsData = cmsModulesFront::all();
        $orderidx = $request->post('oid');

        $Assessment = Assessment::where(['id' => $orderidx])->get();

        $ordeEmail = $Assessment[0]->email;
        $orderName = $Assessment[0]->name;
        $ordePrice = $Assessment[0]->Amount;
        $CurrencyType = $Assessment[0]->CurrencyType;
        $orderUrl = "https://www.paypal.com/cgi-bin/webscr?business=order@mastersdigitizing.co.uk&cmd=_xclick&currency_code=$CurrencyType&amount=$ordePrice&item_name=DD$orderidx";

        $data = ['name' => $orderName, 'data' => $Assessment, 'orderUrl' => $orderUrl];
        $user['to'] = $ordeEmail;
        \Mail::send('backend/mailOrder', $data, function ($messages) use ($orderidx, $ordeEmail) {
            $messages->to($ordeEmail);
            $messages->subject('Complete your order DD-'.$orderidx);
        });

        $request->session()->flash('message', 'Payment Email Send to Customer');

        return redirect('admin/all-pending-orders')->with(['CmsData' => $CmsData]);
    }

    public function getorderPendingAssingJob(Request $request)
    {

        $CmsData = cmsModulesFront::all();
        $orderxidx = $request->post('orderxidx');
        $designerlist = $request->post('designerlist');
        $amountpkr = $request->post('amountpkr');

        if($designerlist == ''){

            $request->session()->flash('message', 'Please Select Designer');

            return redirect('admin/all-pending-orders')->with(['CmsData' => $CmsData]);
        }

        $model2 = Assessment::find($orderxidx);
        $model2->Estatus = 'Processing';
        $model2->update();

        $model = Assessment::find($orderxidx);
        $model->assignId = $designerlist;
        $model->update();


        $designer = Designer::where('id', $designerlist)->first();
        $designerEmail = $designer->username;
        $designerJob = DesignerJob::where('job_id', $orderxidx)->whereRaw("Status != 'Cancelled'")->first();

        if(!$designerJob){
            DesignerJob::create([
                'designer_id' => $designerlist,
                'job_id' => $orderxidx,
                'job_name' => $model->name,
                'designer_email' => $designerEmail,
                'status' => 'Processing',
                'amount' => $amountpkr,
                'assign_date' => date('Y-m-d'),
            ]);
        }else{
            // Update Designer Job
        }
        

        $request->session()->flash('message', 'Order Assign Successfully');

        return back()->with(['CmsData' => $CmsData]);
    }



    public function checkAssignedDesigner(Request $request)
    {
        $orderxidx = $request->post('order_id');
        $designerJob = DesignerJob::where('job_id', $orderxidx)->whereRaw("status != 'Cancelled'")->first();
        if($designerJob){
            return response()->json(['status' => 'success', 'designer_id' => $designerJob->designer_id]);
        }else{
            return response()->json(['status' => 'error']);
        }
    }




    public function getorderremoveAttachment(Request $request)
    {
        $dataid = $request->post('dataid');

        $data = orderassesmentimg::find($dataid);

        $image_path = 'public/storage/OrderAttachment/'.$data->orderImg;

        if(file_exists($image_path)){
            unlink($image_path);
        }
        // $attachmenxs = orderassesmentimg::where(['id'=>$dataid])->get();

        // unlink("public/storage/OrderAttachment/".$attachmenxs->orderImg);

        $removeData = orderassesmentimg::where('id', $dataid)->delete();

        if ($removeData) {
            echo 'succ';
        } else {
            echo 'error';
        }
    }

    public function getJobDelete(Request $request, $id = '')
    {
        $attachmentFiles = orderassesmentimg::where(['orderid' => $id])->get();
        foreach ($attachmentFiles as $data) {
            @unlink('public/storage/OrderAttachment/'.$data->orderImg);
        }

        $res = Assessment::where('id', $id)->delete();
        $request->session()->flash('message', 'Job Successfully Deleted!');

        return redirect('admin/all-pending-orders');
    }

    public function AddNEwJobs()
    {
        $CmsData = cmsModulesFront::all();

        return view('backend.addnewjobs')->with(['CmsData' => $CmsData]);
    }

    public function getplaceOrderjob(Request $request)
    {
        $fullname = $request->post('fullname');
        $Email = $request->post('Email');
        $Phone = $request->post('Phone');
        $Height = $request->post('Height');
        $Width = $request->post('Width');
        $ordertypexs = $request->post('ordertype');
        $additionalDetails = $request->post('additionalDetails');
        $orderType = $request->post('orderType');
        $orderprice = $request->post('orderprice');
        $pass = mt_rand(11111, 99999);
        $jobemailtype = $request->post('jobemailtype');

        $AsignmentDataCheck = AllCustomersData::where(['emailaddress' => $Email])->get();
        if (isset($AsignmentDataCheck[0])) {
            $modelAssignment = new Assessment();

            $modelAssignment->userid = $AsignmentDataCheck[0]->id;
            $modelAssignment->name = $fullname;
            $modelAssignment->email = $Email;
            $modelAssignment->phone_number = $Phone;
            $modelAssignment->type = $orderType;
            $modelAssignment->additional_attributes = $ordertypexs;
            $modelAssignment->height = $Height;
            $modelAssignment->width = $Width;
            $modelAssignment->details = $additionalDetails;
            $modelAssignment->Amount = $orderprice;
            $modelAssignment->CurrencyType = 'USD';
            $modelAssignment->Estatus = 'Pending';

            $modelAssignment->save();

            $orderid = $modelAssignment->id;

            if ($request->hasFile('uploadfiles')) {
                foreach ($request->uploadfiles as $image) {
                    $image_name = md5(rand(1000, 10000));
                    $filenameWithExt = $image->getClientOriginalName();
                    $extention = $image->getClientOriginalExtension();
                    $fileNameToStore = $image_name.'.'.$extention;

                    $path = $image->storeAs('public/OrderAttachment', $fileNameToStore);

                    $orderassesmentimg = new orderassesmentimg();

                    $orderassesmentimg->userid = $AsignmentDataCheck[0]->id;
                    $orderassesmentimg->orderid = $orderid;
                    $orderassesmentimg->orderImg = $fileNameToStore;
                    $orderassesmentimg->save();
                }
            }

            $ordeEmad = $AsignmentDataCheck[0]->emailaddress;

            $data = ['name' => $fullname, 'Email' => $AsignmentDataCheck[0]->emailaddress, 'pass' => $AsignmentDataCheck[0]->upass, 'orderId' => $orderid, 'orderType' => $orderType, 'ordertypexs' => $ordertypexs];
            $user['to'] = $ordeEmad;
            \Mail::send('backend/quotationmail', $data, function ($messages) use ($ordeEmad, $orderid) {
                $messages->to($ordeEmad);
                $messages->subject('Quotation for job DD-'.$orderid);
            });

            $request->session()->flash('message', 'Order Submitted Successfully!');

            session()->put('OrderIDFront', $orderid);

            return redirect()->back();
        } else {
            $modelCus = new AllCustomersData();

            $modelCus->name = $fullname;
            $modelCus->mobileno = $Phone;
            $modelCus->emailaddress = $Email;
            $modelCus->upass = $pass;
            $modelCus->status = 'inactive';

            $modelCus->save();
            $userId = $modelCus->id;

            $modelAssignment = new Assessment();

            $modelAssignment->userid = $userId;
            $modelAssignment->name = $fullname;
            $modelAssignment->email = $Email;
            $modelAssignment->phone_number = $Phone;
            $modelAssignment->type = $orderType;
            $modelAssignment->additional_attributes = $ordertypexs;
            $modelAssignment->height = $Height;
            $modelAssignment->width = $Width;
            $modelAssignment->details = $additionalDetails;
            $modelAssignment->Estatus = 'Pending';
            $modelAssignment->CurrencyType = 'USD';
            $modelAssignment->Amount = $orderprice;

            $modelAssignment->save();
            $orderids = $modelAssignment->id;

            if ($request->hasFile('uploadfiles')) {
                foreach ($request->uploadfiles as $image) {
                    $image_name = md5(rand(1000, 10000));
                    $filenameWithExt = $image->getClientOriginalName();
                    $extention = $image->getClientOriginalExtension();
                    $fileNameToStore = $image_name.'.'.$extention;

                    $path = $image->storeAs('public/OrderAttachment', $fileNameToStore);

                    $orderassesmentimg = new orderassesmentimg();

                    $orderassesmentimg->userid = $userId;
                    $orderassesmentimg->orderid = $orderids;
                    $orderassesmentimg->orderImg = $fileNameToStore;
                    $orderassesmentimg->save();
                }
            }

            $data = ['name' => $fullname, 'Email' => $Email, 'pass' => $pass, 'orderId' => $orderids];
            $user['to'] = $Email;
            \Mail::send('front/mail', $data, function ($messages) use ($Email, $orderids) {
                $messages->to($Email);
                $messages->subject('New Orders ID -'.$orderids);
            });

            session()->put('OrderIDFront', $orderids);
            $request->session()->flash('message', 'Order Submitted Successfully!');

            return redirect()->back();
        }
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
    

    public function getAllDiscountCode(Request $request)
    {
        $eda = $request->cookie('adyes');
        if ($eda == true) {
            $CmsData = cmsModulesFront::all();
            $data = DiscountCode::all();
            $dataStatus = OrderStatus::all();
            $Currencydata = Currencydata::all();
            $Admin = Admin::where(['userType' => '1'])->get();

            return view('backend.alldiscountCode')->with(['data' => $data, 'CmsData' => $CmsData]);
        } else {
            session()->forget('AGENT_ID');
            session()->forget('USER_NAME');
            session()->forget('AGENT_USERTYPE');

            return redirect('/admin');
        }
    }

    public function getAddDiscountCode()
    {
        $CmsData = cmsModulesFront::all();

        return view('backend.alladddiscountCode')->with(['CmsData' => $CmsData]);
    }

    public function getAddItionDiscountCode(Request $request)
    {
        $discountcode = $request->post('discountcode');
        $discountpercentage = $request->post('discountpercentage');
        $expiry_at = $request->post('expiry_at');
        $status = $request->post('status');
        $DiscountCode = new DiscountCode();
        $DiscountCode->discountCode = $discountcode;
        $DiscountCode->discountPercentage = $discountpercentage;
        $DiscountCode->expiry_at = (string)$expiry_at;
        $DiscountCode->active = $status;
        $DiscountCode->save();

        $request->session()->flash('message', 'Discount Code Add Successfully!');

        return redirect()->back();
    }


    public function getEditDiscountCode(Request $request, $id)
    {
        $CmsData = cmsModulesFront::all();
        $data = DiscountCode::where('id', $id)->firstOrFail();

        return view('backend.editdiscountCode')->with(['data' => $data, 'CmsData' => $CmsData]);
    }

    // editDiscountCode
    public function editDiscountCode(Request $request)
    {
        $discountcode = $request->post('discountcode');
        $discountpercentage = $request->post('discountpercentage');
        $expiry_at = $request->post('expiry_at');
        $status = $request->post('status');
        $id = $request->post('id');

        $DiscountCode = DiscountCode::find($id);
        $DiscountCode->discountCode = $discountcode;
        $DiscountCode->discountPercentage = $discountpercentage;
        $DiscountCode->expiry_at = (string)$expiry_at;
        $DiscountCode->active = $status;
        $DiscountCode->update();

        $request->session()->flash('message', 'Discount Update Successfully!');

        return redirect('admin/all-discount-code');
    }

    public function getRemoveDiscountCode(Request $request, $id)
    {

        if($id == 1){
            $request->session()->flash('message', 'You can not remove this Discount Code!');
            return redirect('admin/all-discount-code');
        }

        
        $removeData = DiscountCode::where('id', $id)->delete();

        $request->session()->flash('message', 'Discount Remove Successfully!');

        return redirect('admin/all-discount-code');
    }

    public function getapplyDiscount(Request $request)
    {
        $id = $request->post('orderidx');
        $discountCode = $request->post('discountCode');
        $discountCodeData = DiscountCode::where('discountCode', $discountCode)->first();
        if($discountCodeData){
            $model = Assessment::find($id);
            $model->discountCode = $discountCode;
            $model->discountPercentage = $discountCodeData->discountPercentage;
            $model->update();
            $request->session()->flash('message', 'Discount Code Apply Successfully!');
        }else{
            $request->session()->flash('error', 'Discount Code Not Found!');
        }

        return redirect()->back();
    }
}
