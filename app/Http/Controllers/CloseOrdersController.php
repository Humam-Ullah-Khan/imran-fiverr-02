<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\cmsModulesFront;
use App\Models\Currencydata;
use App\Models\orderassesmentimg;
use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\ArchiveOrder;

class CloseOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $currentPage = $request->get('page', 1);
        $perPage = 100;
        $CmsData = cmsModulesFront::all();
        $data = [];
        if ($request->get('sid') != '') {
            $data = Assessment::WHERE(['Estatus' => 'Close'])->WHERE(['id' => $request->get('sid')])->orderBy('id', 'desc')->paginate($perPage);
        } elseif ($request->get('sna') != '') {
            $data = Assessment::WHERE(['Estatus' => 'Close'])->WHERE('name', 'LIKE', '%'.$request->get('sna').'%')->orderBy('id', 'desc')->paginate($perPage);
        } elseif ($request->get('sne') != '') {
            $data = Assessment::WHERE(['Estatus' => 'Close'])->WHERE('email', 'LIKE', '%'.$request->get('sne').'%')->orderBy('id', 'desc')->paginate($perPage);
        } else {
            $data = Assessment::WHERE(['Estatus' => 'Close'])->orderBy('id', 'desc')->paginate($perPage);
        }

        Paginator::defaultView('vendor.pagination.bootstrap-4');

        $dataStatus = OrderStatus::all();
        $Currencydata = Currencydata::all();

        return view('backend.allCloseorders')->with(['data' => $data, 'dataStatus' => $dataStatus, 'Currencydata' => $Currencydata, 'CmsData' => $CmsData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getorderCloseUpdate(Request $request)
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

        return redirect('admin/all-close-orders');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function getcloseOrderRequest(Request $request)
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

        return redirect('admin/all-close-orders');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrderClosefileAttachment(Request $request)
    {
        $cusidx = $request->post('cusidx');
        $orderid = $request->post('orderid');
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
            $user = User::where(['id' => $cusidx])->get();
            $data = ['name' => $user[0]->name, 'data' => $user, 'orderUrl' => $fileNameToStore];
            $user['to'] = $user[0]->emailaddress;
            Mail::send('backend/mailOrder', $data, function ($messages) use ($orderid, $attachmentFiles) {
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

        return redirect('admin/all-close-orders')->with(['CmsData' => $CmsData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function closeRemoveorders(Request $request)
    {
        $orderid = $request->post('checkitem');
        \DB::table('jobs')->whereIn('id', explode(',', $orderid))->delete();

        return response()->json(['success' => 'succ']);
    }


    // get all archive orders
    public function getArchiveOrders(Request $request){
        $currentPage = $request->get('page', 1);
        $perPage = 100;
        $CmsData = cmsModulesFront::all();
        $data = [];
        if ($request->get('sid') != '') {
            $data = ArchiveOrder::WHERE(['id' => $request->get('sid')])->orderBy('id', 'desc')->paginate($perPage);
        } elseif ($request->get('sna') != '') {
            $data = ArchiveOrder::WHERE('name', 'LIKE', '%'.$request->get('sna').'%')->orderBy('id', 'desc')->paginate($perPage);
        } elseif ($request->get('sne') != '') {
            $data = ArchiveOrder::WHERE('email', 'LIKE', '%'.$request->get('sne').'%')->orderBy('id', 'desc')->paginate($perPage);
        } else {
            $data = ArchiveOrder::orderBy('id', 'desc')->paginate($perPage);
        }

        Paginator::defaultView('vendor.pagination.bootstrap-4');

        $dataStatus = OrderStatus::all();
        $Currencydata = Currencydata::all();

        return view('backend.AllArchiveOrders')->with(['data' => $data, 'dataStatus' => $dataStatus, 'Currencydata' => $Currencydata, 'CmsData' => $CmsData]);

    }


    // archiveOrders
    public function archiveOrders(Request $request)
    {
        $orderid = $request->post('checkitem');
        $orders = Assessment::whereIn('id', explode(',', $orderid))->get();
        foreach ($orders as $order) {

            $orderImages = orderassesmentimg::where('orderid', $order->id)->get();
          
            try{
                foreach ($orderImages as $orderImage) {
                    $image = $orderImage->orderImg;
                    $path = 'public/OrderAttachment/';
                    mkdir('public/OrderAttachmentArchive/DD-'.$order->id, 0777, true);
                    $newPath = 'public/OrderAttachmentArchive/DD-'.$order->id;
                    Storage::move($path, $newPath);
                    // $orderImage->delete();
                }    
            }catch(\Exception $e){
                // dd($e);
            }
          
            $archiveOrder = new ArchiveOrder();
            $archiveOrder->id = $order->id;
            $archiveOrder->name = $order->name;
            $archiveOrder->email = $order->email;
            $archiveOrder->phone_number = $order->phone_number;
            $archiveOrder->type = $order->type;
            $archiveOrder->additional_attributes = $order->additional_attributes;
            $archiveOrder->height = $order->height;
            $archiveOrder->width = $order->width;
            $archiveOrder->details = $order->details;
            $archiveOrder->stripe_id = $order->stripe_id;
            $archiveOrder->stripe_status = $order->stripe_status;
            $archiveOrder->save();
            $order->delete();
        }

        return response()->json(['success' => 'succ']);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param \App\Models\ReadyOrders $readyOrders
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReadyOrders $readyOrders)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ReadyOrders $readyOrders
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReadyOrders $readyOrders)
    {
    }
}
