<?php

namespace App\Http\Controllers;

use App\Models\AllCustomersData;
use App\Models\Assessment;
use App\Models\cmsModulesFront;
use App\Models\orderassesmentimg;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\DiscountCode;

use PayPal\Api\Payment as PPayment;
use PayPal\Api\PaymentExecution;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\Webhook;
use App\Http\Controllers\ReadyOrdersController;
use App\Models\User;
use App\Services\PayPalService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon; // Ensure Carbon is imported for date comparisons

class FrontControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CmsData = cmsModulesFront::all();

        return view('front.index')->with(['CmsData' => $CmsData]);
      //  return view('front.landing-page')->with(['CmsData' => $CmsData]);
    }

    public function aboutPage(Request $request)
    {
        $CmsData = cmsModulesFront::all();

        return view('front.aboutus')->with(['CmsData' => $CmsData]);
    }
    
    //testing
       public function zeeindex(Request $request)
    {
        $CmsData = cmsModulesFront::all();

        return view('front.zeeindex')->with(['CmsData' => $CmsData]);
    }
    //testing

    public function fun_embroiderydigitizing(Request $request)
    {
        $CmsData = cmsModulesFront::all();

        return view('front.v_embroiderydigitizing')->with(['CmsData' => $CmsData]);
    }

    public function fun_vectorart(Request $request)
    {
        $CmsData = cmsModulesFront::all();

        return view('front.v_vectorart')->with(['CmsData' => $CmsData]);
    }


    public function samples(Request $request)
    {
        $CmsData = cmsModulesFront::all();

        return view('front.samples')->with(['CmsData' => $CmsData]);
    }

    public function logoDigitizing(Request $request)
    {
        $CmsData = cmsModulesFront::all();

        return view('front.logoDigitizing')->with(['CmsData' => $CmsData]);
    }

    public function appliqueDigitizing(Request $request)
    {
        $CmsData = cmsModulesFront::all();

        return view('front.appliqueDigitizing')->with(['CmsData' => $CmsData]);
    }

    public function puffDigitizing(Request $request)
    {
        $CmsData = cmsModulesFront::all();

        return view('front.puffDigitizing')->with(['CmsData' => $CmsData]);
    }

    public function embroiderdPatches(Request $request)
    {
        $CmsData = cmsModulesFront::all();

        return view('front.embroiderdPatches')->with(['CmsData' => $CmsData]);
    }

    public function vectorArtDigitizing(Request $request)
    {
        $CmsData = cmsModulesFront::all();

        return view('front.vectorArtDigitizing')->with(['CmsData' => $CmsData]);
    }

    public function jacketBackDigitizing(Request $request)
    {
        $CmsData = cmsModulesFront::all();

        return view('front.jacketBackDigitizing')->with(['CmsData' => $CmsData]);
    }

    public function Pricingdigitizing(Request $request)
    {
        $CmsData = cmsModulesFront::all();

        return view('front.Pricingdigitizing')->with(['CmsData' => $CmsData]);
    }

    public function contactUsDigitizing(Request $request)
    {
        $CmsData = cmsModulesFront::all();

        return view('front.contactUsDigitizing')->with(['CmsData' => $CmsData]);
    }

    public function placeOrderForm(Request $request)
    {
       
        if(session()->get('discountcode')){
            session()->forget('discountcode');
            session()->forget('discountprice');
        }

       
        //***********This Code is not using working. recaptcha Testing Required */

         //   $request->validate([
         //      'g-recaptcha-response' => 'required',
         //  ]);



        //$recaptchaResponse = $request->input('g-recaptcha-response');
        //$recaptchaSecret = config('services.recaptcha.secret');

        // Verify reCAPTCHA with Google
        //$response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
          //  'secret' => $recaptchaSecret,
          //  'response' => $recaptchaResponse,
        //]);

        //$responseBody = $response->json();

        //if ($responseBody['success']) {
        //} else {
            // reCAPTCHA failed, return with an error message
          //  return back()->withErrors(['captcha' => 'reCAPTCHA verification failed. Please try again.']);
        //}

//***********This Code is not using working. recaptcha Testing Required */


        $fullname = $request->post('fullname');
        $Email = $request->post('Email');
        $Phone = $request->post('Phone');
        $Height = $request->post('Height');
        $Width = $request->post('Width');
        $ordertypexs = $request->post('ordertype');
        $additionalDetails = $request->post('additionalDetails');
        $orderType = $request->post('orderType');
        $orderprice = $request->post('orderprice');
        // $pass = mt_rand(11111,99999);
        $pass = Str::random(12);

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
            if(session()->get('discountcode')){
                $customerDiscount = session()->get('discountcode') . ' - ( $' . $orderprice . ' - $' . ($orderprice - ($orderprice * session()->get('discountprice') / 100)) . ' )';
                $modelAssignment->discountCode = $customerDiscount; 
            }
            $modelAssignment->Estatus = '';

            $modelAssignment->save();

            $orderid = $modelAssignment->id;

            if ($request->hasFile('uploadfiles')) {
                foreach ($request->uploadfiles as $image) {
                    $image_name = md5(rand(1000, 10000)).'DD-'.$orderid;
                    $filenameWithExt = 'DD-'.$orderid.$image->getClientOriginalName();
                    $extention = $image->getClientOriginalExtension();
                    $fileNameToStore = $filenameWithExt;

                    $path = $image->storeAs('public/OrderAttachment', $fileNameToStore);

                    $orderassesmentimg = new orderassesmentimg();

                    $orderassesmentimg->userid = $AsignmentDataCheck[0]->id;
                    $orderassesmentimg->orderid = $orderid;
                    $orderassesmentimg->orderImg = $fileNameToStore;
                    $orderassesmentimg->save();
                }
            }

            // $ordeEmad = $AsignmentDataCheck[0]->emailaddress;

            // $orderUrl = "https://www.paypal.com/cgi-bin/webscr?business=order@mastersdigitizing.co.uk&cmd=_xclick&currency_code=USD&amount=$orderprice&item_name=DD$orderid";

            // $data = ['name' => $fullname, 'Email' => $AsignmentDataCheck[0]->emailaddress, 'pass' => $AsignmentDataCheck[0]->upass, 'orderId' => $orderid, 'Height' => $Height, 'Width' => $Width, 'orderType' => $orderType, 'orderUrl' => $orderUrl];
            // $user['to'] = "$ordeEmad";

            // try {
            //     \Mail::send('front/mailAnother', $data, function ($messages) use ($ordeEmad, $orderid) {
            //         $messages->to($ordeEmad);
            //         $messages->subject('New Orders ID -'.$orderid);
            //     });
            // } catch (\Exception $e) {
            //     Log::error('Webhook error: '.$e->getMessage());
            // }

            $request->session()->flash('message', 'Order Submitted Successfully!');

            session()->put('OrderIDFront', $orderid);
            session()->put('discountcode','');
            session()->get('discountprice','');        

            return redirect('/checkout');
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
            $modelAssignment->Estatus = '';
            if(session()->get('discountcode')){
                $customerDiscount = session()->get('discountcode') . ' - ( $' . $orderprice . ' - $' . ($orderprice - ($orderprice * session()->get('discountprice') / 100)) . ' )';
                $modelAssignment->discountCode = $customerDiscount; 
            }

            $modelAssignment->CurrencyType = 'USD';
            $modelAssignment->Amount = $orderprice;

            $modelAssignment->save();
            $orderid = $modelAssignment->id;

            if ($request->hasFile('uploadfiles')) {
                foreach ($request->uploadfiles as $image) {
                    $image_name = md5(rand(1000, 10000)).'DD-'.$orderid;
                    $filenameWithExt = 'DD-'.$orderid.$image->getClientOriginalName();
                    $extention = $image->getClientOriginalExtension();
                    $fileNameToStore = $filenameWithExt;

                    $path = $image->storeAs('public/OrderAttachment', $fileNameToStore);

                    $orderassesmentimg = new orderassesmentimg();

                    $orderassesmentimg->userid = $userId;
                    $orderassesmentimg->orderid = $orderid;
                    $orderassesmentimg->orderImg = $fileNameToStore;
                    $orderassesmentimg->save();
                }
            }

            // $orderUrl = "https://www.paypal.com/cgi-bin/webscr?business=order@mastersdigitizing.co.uk&cmd=_xclick&currency_code=USD&amount=$orderprice&item_name=DD$orderid";

            // $data = ['name' => $fullname, 'Email' => $Email, 'pass' => $pass, 'orderId' => $orderid, 'orderType' => $orderType, 'Width' => $Width, 'Height' => $Height, 'orderUrl' => $orderUrl];
            // $user['to'] = $Email;

            // try {
            //     \Mail::send('front/mail', $data, function ($messages) use ($Email, $orderid) {
            //         $messages->to($Email);
            //         $messages->subject('New Orders ID -'.$orderid);
            //     });
            // } catch (\Exception $e) {
            //     Log::error('Webhook error: '.$e->getMessage());
            // }

            // $data2 = ['name' => $fullname, 'Email' => $Email, 'pass' => $pass, 'orderId' => $orderid, 'orderType' => $orderType, 'Width' => $Width, 'Height' => $Height];
            // $user2['to'] = $Email;

            // try {
            //     \Mail::send('front/accountmail', $data2, function ($messages) use ($Email) {
            //         $messages->to($Email);
            //         $messages->subject('Account Registration');
            //     });
            // } catch (\Exception $e) {
            //     Log::error('Webhook error: '.$e->getMessage());
            // }

            session()->put('OrderIDFront', $orderid);
            session()->put('discountcode','');
            session()->get('discountprice','');        

            $request->session()->flash('message', 'Order Submitted Successfully!');

            return redirect('/checkout');
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkoutData(Request $request)
    {
        $CmsData = cmsModulesFront::all();


        $discount = session()->get('discountcode');
        $discountPrice = session()->get('discountprice');

        return view('front.checkout')->with(['CmsData' => $CmsData, 'discount' => $discount, 'discountPrice' => $discountPrice]);
    }




    public function StripeWebhook(Request $request) {
        // Set your Stripe secret key
        // Set Stripe API key
        Stripe::setApiKey(config('services.stripe.secret'));
    
        // Retrieve the payload from Stripe
        $payload = @file_get_contents('php://input');
        $sigHeader = $request->header('Stripe-Signature');
        $webhookSecret = config('services.stripe.webhhok_secret'); // Stripe webhook secret
    
        try {
            // Construct the event from the payload and signature
            $event = Webhook::constructEvent($payload, $sigHeader, $webhookSecret);
        } catch (UnexpectedValueException $e) {
            // Log error if payload is invalid
            Log::error('Webhook error: '.$e->getMessage());
    
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Log error if signature verification fails
            Log::error('Webhook error: '.$e->getMessage());
    
            return response()->json(['error' => 'Invalid signature'], 400);
        }
    
        // Handle successful payment event
        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;
    
            // Get email and order details from session metadata
            $email = $session->metadata->customer_email;
            $uid = $session->metadata->order_id;
            $user_id = $session->metadata->customer_id;
    
            if ($user_id > 0) {
                // Update existing user and job details
                $job = Assessment::where('id', $uid)->first();
                $user = User::where('id', $user_id)->first();
                $job->update([
                    'Estatus' => 'Pending',
                    'userid' => $user->id,
                    'email' => $email,
                    'Amount' => $session->amount_total / 100,
                    'stripe_id' => $session->id,
                    'stripe_status' => $session->payment_status,
                    // 'cusDiscountCode' =>  $session->metadata->discountcode . ' - ( $' . $session->amount_total / 100 . ' - $' . ($session->amount_total / 100 - ($session->amount_total / 100 * $session->metadata->discountprice / 100)) . ' )',
                ]);
    
                // Create payment record
                $payments = Payment::create([
                    'email' => $email,
                    'job_id' => $uid,
                    'cusDiscountCode' => $session->metadata->discountcode . ' - ( $' . $session->amount_total / 100 . ' - $' . ($session->amount_total / 100 - ($session->amount_total / 100 * $session->metadata->discountprice / 100)) . ' )',
                    'amount' => $session->amount_total / 100,
                    'stripe_reference' => $session->id,
                    'stripe_status' => $session->payment_status.'_Stripe',
                ]);
    
                // Send order confirmation email to user
                try {
                    Mail::send('emails.order', [
                        'orderId' => $job->id,
                        'name' => $job->name,
                        'orderType' => $job->type,
                        'Height' => $job->height,
                        'Width' => $job->width,
                    ], function ($message) use ($email) {
                        $message->to($email)->subject('Order Received');
                    });
                } catch (Exception $e) {
                    Log::error('Email sending failed: '.$e->getMessage());
                }
    
                // Send alert email to admin
                // $adminEmail = 'zishanmcs@gmail.com'; // replace with your admin email
                // try {
                //     Mail::send('emails.admin_alert', ['email' => $email], function ($message) use ($adminEmail) {
                //         $message->to($adminEmail)->subject('New Order Placed');
                //     });
                // } catch (Exception $e) {
                //     Log::error('Email sending failed: '.$e->getMessage());
                // }
            } else {
                // Create new user with a random password
                $randomPassword = Str::random(12);
                $user = User::create([
                    'emailaddress' => $email,
                    'name' => Str::before($email, '@'),
                    'status' => 'active',
                    'upass' => $randomPassword,
                ]);
    
                // Update job details with new user information
                $job = Assessment::where('id', $uid);
                $job->update([
                    'Estatus' => 'Pending',
                    'userid' => $user->id,
                    'email' => $email,
                    'Amount' => $session->amount_total / 100,
                    'stripe_id' => $session->id,
                    'stripe_status' => $session->payment_status,
                ]);
    
                // Create payment record
                $payments = Payment::create([
                    'email' => $email,
                    'job_id' => $uid,
                    'amount' => $session->amount_total / 100,
                    'cusDiscountCode' =>  $session->metadata->discountcode . ' - ( $' . $session->amount_total / 100 . ' - $' . ($session->amount_total / 100 - ($session->amount_total / 100 * $session->metadata->discountprice / 100)) . ' )',
                    'stripe_reference' => $session->id,
                    'stripe_status' => $session->payment_status,
                ]);
    
                // Send credentials to user via email
                try {
                    Mail::send('emails.user_credentials', ['email' => $email, 'password' => $randomPassword], function ($message) use ($email) {
                        $message->to($email)->subject('Your Account Created Successfully');
                    });
                } catch (Exception $e) {
                    Log::error('Email sending failed: '.$e->getMessage());
                }
    
                // Send order confirmation email to user
                try {
                    Mail::send('emails.order', [
                        'orderId' => $job->id,
                        'name' => $job->name,
                        'orderType' => $job->type,
                        'Height' => $job->height,
                        'Width' => $job->width,
                    ], function ($message) use ($email) {
                        $message->to($email)->subject('Your Order Placed Successfully Zee02');
                    });
                } catch (Exception $e) {
                    Log::error('Email sending failed: '.$e->getMessage());
                }
    
                // Send alert email to admin
                // try {
                //     $adminEmail = 'zishanmcs@gmail.com'; // replace with your admin email
                //     Mail::send('emails.admin_alert', ['email' => $email], function ($message) use ($adminEmail) {
                //         $message->to($adminEmail)->subject('New Order Placed');
                //     });
                // } catch (Exception $e) {
                //     Log::error('Email sending failed: '.$e->getMessage());
                // }
            }
        }
    
        return response()->json(['status' => 'success'], 200);
    }
    



    public function StripeCancel() {
        return redirect('/checkout');
    }


    public function CreateStripeSession(Request $request) {
        /**
         * This script handles the creation of a Stripe payment session for an order.
         *
         * Workflow:
         * 1. Retrieve CMS data and user session data.
         * 2. Fetch order data based on the user ID from the session.
         * 3. Calculate the amount to be charged in cents.
         * 4. Set the Stripe API key.
         * 5. Retrieve user data based on the email address from the order data.
         * 6. Encode the order ID into a base62 string.
         * 7. Create a Stripe payment session with the order details and metadata.
         * 8. Return the session ID as a JSON response.
         *
         * Variables:
         * - $CmsData: Data from CMS modules.
         * - $userid: User ID from the session.
         * - $reuseorderid: Reuse order ID from the session.
         * - $OrdeData: Order data fetched from the database.
         * - $amount: Amount to be charged in cents.
         * - $user: User data fetched from the database.
         * - $user_id: ID of the user.
         * - $number: Order ID.
         * - $base: Base for encoding the order ID.
         * - $characters: Characters used for base62 encoding.
         * - $encoded: Encoded order ID.
         * - $session: Stripe payment session.
         */
        $CmsData = cmsModulesFront::all();
        $userid = session()->get('OrderIDFront');
        $reuseorderid = session()->pull('reuseorder_id', 0);
        $OrdeData = Assessment::where(['id' => $userid])->get();
        // $totalCharges = $OrdeData[0]->Amount / 100 * $CmsData[0]->paypalCharges;
    
        $amount = (int) ($OrdeData[0]->Amount * 100);
        Stripe::setApiKey(config('services.stripe.secret'));
    
        $user = User::where('emailaddress', $OrdeData[0]->email)->first();
    
        $user_id = 0;
        if ($user) {
            $user_id = $user->id;
        }
    
        $number = $OrdeData[0]->id;
    
        $base = 62;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $encoded = '';
    
        while ($number > 0) {
            $remainder = $number % $base;
            $number = intdiv($number, $base);
            $encoded = $characters[$remainder].$encoded;
        }

        if(session()->get('discountprice')){
            $amount = $amount - ($amount * session()->get('discountprice') / 100);
        }

    
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $OrdeData[0]->name,
                    ],
                    'unit_amount' => $amount,
                ],
                'quantity' => 1,
            ]],
            'metadata' => [
                'order_id' => $OrdeData[0]->id,
                'customer_id' => $user_id,
                'reuseorderid' => $reuseorderid,
                'customer_email' => $OrdeData[0]->email,
                'discountcode' => session()->get('discountcode'),
                'discountprice' => session()->get('discountprice'),
            ],
            'customer_email' => $OrdeData[0]->email,
            'mode' => 'payment',
            'success_url' => route('checkout.success', ['id' => $encoded]),
            'cancel_url' => route('checkout.cancel'),
        ]);
    
        return response()->json(['id' => $session->id]);
    }

    public function StripeSuccess($id, Request $request) {
        /**
         * This script handles the payment processing and order management for an assessment.
         *
         * Steps:
         * 1. Decode the provided ID from base 62 to base 10.
         * 2. Retrieve the assessment data and CMS data.
         * 3. Check if paymentId and payerId are set in the request.
         * 4. If set, execute the PayPal payment.
         * 5. On successful payment:
         *    - Update the assessment status and payment details.
         *    - Create a new payment record.
         *    - Send a confirmation email to the user.
         *    - Send an alert email to the admin.
         * 6. Render the success view with payment and CMS data.
         * 7. If payment execution fails, handle the exception.
         * 8. If no assessment data is found, redirect to the homepage.
         * 9. If assessment data is found, render the success view with the data.
         *
         * Variables:
         * - $base: The base for decoding the ID (base 62).
         * - $characters: The characters used in base 62 encoding.
         * - $length: The length of the provided ID.
         * - $decoded: The decoded ID in base 10.
         * - $data: The assessment data retrieved from the database.
         * - $CmsData: The CMS data retrieved from the database.
         * - $paymentId: The payment ID from the request.
         * - $payerId: The payer ID from the request.
         * - $paypalService: The PayPal service instance.
         * - $payment: The PayPal payment instance.
         * - $execution: The PayPal payment execution instance.
         * - $result: The result of the payment execution.
         * - $job: The assessment data retrieved after payment execution.
         * - $email: The email address of the user.
         * - $adminEmail: The email address of the admin.
         *
         * Exceptions:
         * - Handles exceptions during payment execution.
         * - Handles exceptions during email sending.
         */
        $base = 62;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = strlen($id);
        $decoded = 0;
    
        for ($i = 0; $i < $length; ++$i) {
            $decoded = $decoded * $base + strpos($characters, $id[$i]);
        }
    
        $data = Assessment::where(['id' => $decoded])->first();
        $CmsData = cmsModulesFront::all();
    
        $paymentId = $request->paymentId;
        $payerId = $request->PayerID;
    
        if (isset($paymentId) && isset($payerId)) {
            $paypalService = new PayPalService();
            $payment = PPayment::get($paymentId, $paypalService->apiContext);
            $execution = new PaymentExecution();
            $execution->setPayerId($payerId);
    
            // Execute the payment
            try {
                $result = $payment->execute($execution, $paypalService->apiContext);
                if ($result->getState() == 'approved') {
                    $job = Assessment::where('id', $decoded)->first();

                    try{
                        $cusDiscountCode = '';
                        if(session()->get('discountcode')){
                            $dprice = number_format($job->Amount - ($job->Amount * session()->get('discountprice') / 100), 2);

                            $cusDiscountCode = session()->get('discountcode') . ' - ( $' . $job->Amount . ' - $' . $dprice . ' = $' .  ($result->transactions[0]->amount->total) . ' )';
                        }                            
                        
                        $job->update([
                                'Estatus' => 'Pending',
                                'Amount' => $result->transactions[0]->amount->total,
                                'paypal_id' => $paymentId,
                                'paypal_status' => $result->state . '_Paypal',
                                // 'cusDiscountCode' => $cusDiscountCode
                            ]);
                    }catch(\Exception $e){
                        Log::error("Error updating job: " . $e->getMessage());
                    }
                    $payment = Payment::create(
                        [
                            'user_id' => $job->userid,
                            'email' => $job->email,
                            'job_id' => $job->id,
                            'cusDiscountCode' => $cusDiscountCode,
                            'amount' => $result->transactions[0]->amount->total,
                            'stripe_reference' => $paymentId,
                            'stripe_status' => 'Paid_Paypal',
                        ]
                    );
    
                    $email = $job->email;


                    // check if the user is already registered
                    $user = User::where('emailaddress', $email)->first();

                    if($user){
                    }else{
                        // Create new user with a random password
                        $randomPassword = Str::random(12);
                        $user = User::create([
                            'emailaddress' => $email,
                            'name' => Str::before($email, '@'),
                            'status' => 'active',
                            'upass' => $randomPassword,
                        ]);
                        // Send credentials to user via email
                        try {
                            Mail::send('emails.user_credentials', ['email' => $email, 'password' => $randomPassword], function ($message) use ($email) {
                                $message->to($email)
                                    ->subject('Your Account Created Successfully');
                            });
                        } catch (Exception $e) {
                            Log::error('Email sending failed: '.$e->getMessage());
                        }
                    }
                    try {
                        Mail::send('emails.order', [
                            'orderId' => $job->id,
                            'name' => $job->name,
                            'orderType' => $job->type,
                            'Height' => $job->height,
                            'Width' => $job->width,
                        ], function ($message) use ($email) {
                            $message->to($email)
                                ->subject('Order Received');
                        });
                    } catch (Exception $e) {
                        Log::error('Email sending failed: '.$e->getMessage());
                    }
    
                    // Send alert to admin
                    // $adminEmail = 'zishanmcs@gmail.com'; // replace with your admin email
    
                    // try {
                    //     Mail::send('emails.admin_alert', ['email' => $email], function ($message) use ($adminEmail) {
                    //         $message->to($adminEmail)
                    //             ->subject('New Order Placed');
                    //     });
                    // } catch (Exception $e) {
                    //     Log::error('Email sending failed: '.$e->getMessage());
                    // }
    
                    return view('front.success', ['paymentId' => $paymentId, 'PayerID' => $payerId, 'data' => $data, 'CmsData' => $CmsData]);
                }
            } catch (Exception $ex) {
                // Handle execution failure
                // return json_encode($ex->getMessage());
                // return response()->json(['/checkout/success/' => 'Payment execution failed'], 500);
            }
        }
        // dd();
    
        if (!$data) {
            return redirect('/');
        } else {
            return view('front.success', ['data' => $data, 'CmsData' => $CmsData]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CustomerLogin(Request $request)
    {
        $email = $request->post('emailaddress');
        $Pass = $request->post('Pass');
        $time = time();
        $result = AllCustomersData::where(['emailaddress' => $email, 'upass' => $Pass])->get();

        if (isset($result[0]->id)) {
            session()->put('CUSTOMER_ID', $result[0]->id);
            session()->put('CUSTOMER_NAME', $result[0]->name);
            session()->put('CUSTOMER_EMAIL', $result[0]->emailaddress);
            session()->put('CUSTOMER_LOGIN_TIME', $time);

            return redirect('/dashboard')->withCookie(cookie('yes', 'value', 30));
        } else {
            echo 'error';
            // return redirect('/');
        }
    }

    public function orderTransactions(Request $request)
    {
        // $eda = $request->cookie('adyes');
        $eda = $request->cookie('adyes');
        if ($eda == true) {
            // $userid = session()->get('CUSTOMER_ID');
            // $cookieData = $request->cookie('digitizing_session');
            $order_id = $request->oid;

            // if ($userid == '') {
            // return redirect('/');
            // } else {
            $payments = Payment::where(['job_id' => $order_id])->get();

            return response()->json($payments)->header('Content-Type', 'application/json');
        // }
        } else {
            session()->forget('CUSTOMER_ID');
            session()->forget('CUSTOMER_NAME');
            session()->forget('CUSTOMER_LOGIN_TIME');

            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function UserDashboard(Request $request)
    {
        $eda = $request->cookie('yes');
        if ($eda == true) {
            $userid = session()->get('CUSTOMER_ID');
            $cookieData = $request->cookie('digitizing_session');

            $orderData = Assessment::where(['userid' => $userid])->get();

            if ($userid == '') {
                return redirect('/');
            } else {
                $CmsData = cmsModulesFront::all();

                return view('front.UserDashboard')->with(['orderData' => $orderData, 'CmsData' => $CmsData]);
            }
        } else {
            session()->forget('CUSTOMER_ID');
            session()->forget('CUSTOMER_NAME');
            session()->forget('CUSTOMER_LOGIN_TIME');

            return redirect('/');
        }
    }


public function checkoutDiscount(Request $request) {
    // Fetch CMS data (might be needed later)
    $CmsData = cmsModulesFront::all();

    // Get the discount code from the request
    $discountcode = $request->post('discountcode');

    // If a discount code exists in the session, clear it first
    if (session()->get('discountcode')) {
        session()->forget('discountcode');
        session()->forget('discountprice');
    }

    // If no discount code is provided in the request, check the order data
    if (empty($discountcode)) {
        $orderData = Assessment::where(['id' => session()->get('OrderIDFront')])->first();
        if (isset($orderData->discountCode)) {
            $discountcode = $orderData->discountCode;  
        }
    }

    // Proceed if we have a discount code to validate
    if (!empty($discountcode)) {
        // Fetch the discount code data from the database
        $discountData = DiscountCode::where(['discountcode' => $discountcode])->first();
        
        // Check if the discount code is valid and active
        if ($discountData && $discountData->active == '1') {
            // Check if the discount code has expired
            if (isset($discountData->expiry_at) && Carbon::parse($discountData->expiry_at)->isPast()) {
                $request->session()->flash('message', 'Discount Code Expired!');
                return back();
            }



            // If valid, save the discount code and percentage to the session
            session()->put('discountcode', $discountData->discountCode);
            session()->put('discountprice', $discountData->discountPercentage);
            
            // Inform the user that the discount code has been applied
            $request->session()->flash('message', 'Discount Code Applied Successfully!');
        } else {
            // If the discount code is invalid or inactive
            $request->session()->flash('message', 'Discount Code Not Valid or Expired!');
        }
    } else {
        // If no discount code is provided or found
        $request->session()->flash('message', 'No Discount Code Provided!');
    }

    // Redirect back to the checkout page
    return back();
}

    public function paymore(Request $request, $id)
    {
        $eda = $request->cookie('yes');
        $adeda = $request->cookie('adyes');
        if ($eda == true || $adeda == true) {
            // $userid = session()->get('CUSTOMER_ID');
            // $cookieData = $request->cookie('digitizing_session');

            // if ($userid == '') {
            //     return redirect('/');
            // } else {
            $CmsData = cmsModulesFront::all();
            $orderData = Assessment::where(['id' => $id])->get();
            if ($orderData) {
                session()->put('discountcode','');
                session()->get('discountprice','');        
                session()->put('OrderIDFront', $id);
                session()->put('reuseorder_id', $id);
                $request->session()->flash('message', 'Order Added into cart!');

                return redirect('/checkout');
            }
        // }
        } else {
            session()->forget('CUSTOMER_ID');
            session()->forget('CUSTOMER_NAME');
            session()->forget('CUSTOMER_LOGIN_TIME');

            return redirect('/');
        }
    }

    public function UserProfile(Request $request)
    {
        $eda = $request->cookie('yes');
        if ($eda == true) {
            $userid = session()->get('CUSTOMER_ID');
            if ($userid == '') {
                return redirect('/');
            } else {
                $UserData = AllCustomersData::where(['id' => $userid])->get();
                $CmsData = cmsModulesFront::all();

                return view('front.profile')->with(['CmsData' => $CmsData, 'UserData' => $UserData]);
            }
        } else {
            session()->forget('CUSTOMER_ID');
            session()->forget('CUSTOMER_NAME');
            session()->forget('CUSTOMER_LOGIN_TIME');

            return redirect('/');
        }
    }

    public function UserChangePass(Request $request)
    {
        $userid = session()->get('CUSTOMER_ID');
        if ($userid == '') {
            return redirect('/');
        } else {
            $CmsData = cmsModulesFront::all();

            return view('front.changePassword')->with(['CmsData' => $CmsData, 'userid' => $userid]);
        }
    }

    public function CustomerupdatePassword(Request $request)
    {
        $request->validate([
            'oldpass' => 'required',
            'newpass' => 'required|min:9|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[#?!@$%^&*-]).{9,}$/',
            'confirmpass' => 'required|same:newpass',
        ], [
            'newpass.regex' => 'New Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'newpass.min' => 'New Password must be at least 9 characters long.',
            'newpass.required' => 'New Password is required.',
            'oldpass.required' => 'Old Password is required.',
            'confirmpass.required' => 'Confirm Password is required.',
            'confirmpass.same' => 'New Password and Confirm Password must be the same.',
        ]);

        $eda = $request->cookie('yes');
        if ($eda == true) {
            $userid = session()->get('CUSTOMER_ID');
            $oldpass = $request->post('oldpass');

            $queryF = AllCustomersData::where(['upass' => $oldpass])->get();
            if (count($queryF) > 0) {
                $uemail = $queryF[0]->emailaddress;

                $newpass = $request->post('newpass');
                $confirmpass = $request->post('confirmpass');

                if ($newpass == $confirmpass) {
                    $model = AllCustomersData::find($request->post('id'));
                    $model->upass = $newpass;

                    $model->save();

                    $data = ['newpass' => $newpass];
                    $user['to'] = $uemail;
                    try {
                        \Mail::send('front/changepassmailconfirm', $data, function ($messages) use ($uemail) {
                            $messages->to($uemail);
                            $messages->subject('Password Change Successfully!');
                        });
                    } catch (\Exception $e) {
                        Log::error('Webhook error: '.$e->getMessage());
                    }

                    $request->session()->flash('message', 'Your Password Has Been Successfully Changed!');

                    return redirect('/change-password');
                } else {
                    $request->session()->flash('error', 'Error! New Pasword and Conformed password are not same');

                    return redirect('/change-password');
                }
            } else {
                $request->session()->flash('message', 'Password Incorrect');

                return redirect('/change-password');
            }
        } else {
            session()->forget('CUSTOMER_ID');
            session()->forget('CUSTOMER_NAME');
            session()->forget('CUSTOMER_LOGIN_TIME');

            return redirect('/');
        }

        // $newpass = $request->post('newpass');
        // $confirmpass = $request->post('confirmpass');
        // $confirmpass = $request->post('confirmpass');
    }

    public function CustomerUpdateProfile(Request $request)
    {
        if ($request->post('id') > 0) {
            $model = AllCustomersData::find($request->post('id'));

            $model->name = $request->post('uname');
            $model->company = $request->post('company');
            $model->dob = $request->post('dob');
            $model->Gender = $request->post('gender');
            $model->address = $request->post('address');
            $model->city = $request->post('city');
            $model->postalCode = $request->post('postalCode');
            $model->mobileno = $request->post('mobileno');

            session()->put('CUSTOMER_NAME', $request->post('uname'));

            $model->save();
            $request->session()->flash('message', 'Customer Information Update Successfully!');

            return redirect('/profile');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function OrderEdit(Request $request, $oid = '')
    {
        $CmsData = cmsModulesFront::all();
        $OrdeData = Assessment::where(['id' => $oid])->get();
        $OrdeImgData = orderassesmentimg::where(['orderid' => $oid])->get();

        return view('front.orderUpdate')->with(['CmsData' => $CmsData, 'OrdeData' => $OrdeData, 'oid' => $oid, 'OrdeImgData' => $OrdeImgData]);
    }

    public function updateOrders(Request $request)
    {
        if ($request->post('id') > 0) {
            $fullname = $request->post('fullname');
            $Email = $request->post('Email');
            $Phone = $request->post('Phone');
            $Height = $request->post('Height');
            $Width = $request->post('Width');
            $ordertypexs = $request->post('ordertypexs');
            $additionalDetails = $request->post('additionalDetails');
            $orderType = $request->post('orderType');
            $orderprice = $request->post('orderprice');
            $userid = session()->get('CUSTOMER_ID');
            $orderid = $request->post('id');

            $model = Assessment::find($request->post('id'));

            if ($request->hasFile('uploadfiles')) {
                foreach ($request->uploadfiles as $image) {
                    $image_name = md5(rand(1000, 10000)).'DD-'.$orderid;
                    $filenameWithExt = 'DD-'.$orderid.$image->getClientOriginalName();
                    $extention = $image->getClientOriginalExtension();
                    $fileNameToStore = $filenameWithExt;

                    $path = $image->storeAs('public/OrderAttachment', $fileNameToStore);

                    $AttachmentFilesUser = new orderassesmentimg();

                    $AttachmentFilesUser->userid = $userid;
                    $AttachmentFilesUser->orderid = $orderid;
                    $AttachmentFilesUser->orderImg = $fileNameToStore;
                    $AttachmentFilesUser->save();
                }
            }

            $model->name = $fullname;
            $model->phone_number = $Phone;
            $model->type = $orderType;
            $model->additional_attributes = $ordertypexs;
            $model->height = $Height;
            $model->width = $Width;
            $model->details = $additionalDetails;

            $model->save();
            $request->session()->flash('message', 'Order Details Update Successfully!');

            return redirect('/dashboard');
        } else {
        }
    }

    public function OrderDownload($id)
{
    $datxx = orderassesmentimg::where(['orderid' => $id])->get();

    $imgarr = [];
    foreach ($datxx as $key => $value) {
        // Ensure we use the correct full file path here
        $imgarr[] = storage_path('app/public/OrderAttachment/' . $value->orderImg);
    }

    $ziplink = $this->convertToZip($imgarr, $id);

    return $ziplink;
}

public function convertToZip($imgarr, $orderid)
{
    // Retrieve CMS data for the zip filename
    $CmsData = cmsModulesFront::all();

    $zip = new \ZipArchive();
    $storage_path = storage_path('app/public/OrderAttachment');
    $timeName = $CmsData[0]->AttachmentZip . '-' . $orderid;
    $zipFileName = $storage_path . '/' . $timeName . '.zip'; // Use absolute path here
    $zipPath = public_path('storage/OrderAttachment/' . $timeName . '.zip'); // Use public_path() to get the public URL for the zip file

    // Ensure that the zip file opens correctly
    if ($zip->open($zipFileName, \ZipArchive::CREATE) === true) {
        foreach ($imgarr as $absFilePath) {
            // Add files to the zip with the correct file path and file name in the zip
            $zip->addFile($absFilePath, basename($absFilePath)); // Add file with original filename
        }
        $zip->close(); // Close the zip file

        // Return the zip file for download
        return response()->download($zipFileName);
    }

    return false; // Return false if zip creation failed
}


    public function customerForgot(Request $request)
    {
        $email = $request->post('forgotEmail');
        $pass = mt_rand(11111, 99999);
        $AsignmentDataCheck = AllCustomersData::where(['emailaddress' => $email])->get();
        if (isset($AsignmentDataCheck[0])) {
            $User_Update = AllCustomersData::where(['emailaddress' => $email])->update(['upass' => $pass]);

            $data = ['Pass' => $pass];
            $user['to'] = $email;
            try {
                \Mail::send('front/forgotmail', $data, function ($messages) use ($email) {
                    $messages->to($email);
                    $messages->subject('Forgot Password ');
                });
            } catch (\Exception $e) {
                Log::error('Webhook error: '.$e->getMessage());
            }
        } else {
            echo 'error';
        }
    }

    public function frontgetorderremoveAttachment(Request $request)
    {
        $dataid = $request->post('dataid');

        $attachmentFiles = orderassesmentimg::where(['id' => $dataid])->get();
        @unlink('public/storage/OrderAttachment/'.$data->orderImg);

        // unlink("public/orderfile/".$AttachmentFilesUser->customerFileUpload);

        $removeData = orderassesmentimg::where('id', $dataid)->delete();
        if ($removeData) {
            echo 'succ';
        } else {
            echo 'error';
        }
    }
}
