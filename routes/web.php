<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllCustomersDataController;
use App\Http\Controllers\CloseOrdersController;
use App\Http\Controllers\CmsModulesFrontController;
use App\Http\Controllers\DesignerJobsAllController;
use App\Http\Controllers\FrontControllerController;
use App\Http\Controllers\GraphicDesignerController;
use App\Http\Controllers\HoldOrdersController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\DesignerController;
// stripe start
use App\Http\Controllers\ReadyOrdersController;
use App\Models\Assessment;
use App\Models\cmsModulesFront;
use App\Models\Payment;
use App\Models\User;
use App\Services\PayPalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

// stripe end

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/linkstorage', function () {
  Artisan::call('storage:link');
});

// optimize
Route::get('/optimize', function () {
  Artisan::call('optimize');
  Artisan::call('config:cache');
  Artisan::call('route:cache');
  Artisan::call('view:cache');

  // deattach symb links
  Artisan::call('storage:link');



  return 'Optimized';
});

Route::get('/', [FrontControllerController::class, 'index']);
Route::get('/about-us', [FrontControllerController::class, 'aboutPage']);
Route::get('/embroidery-digitizing', [FrontControllerController::class, 'fun_embroiderydigitizing']);
Route::get('/vector-art', [FrontControllerController::class, 'fun_vectorart']);

//Testing
Route::get('/zeeindex', [FrontControllerController::class, 'zeeindex']);
//Testing

Route::get('/samples', [FrontControllerController::class, 'samples']);
Route::get('/logo-digitizing', [FrontControllerController::class, 'logoDigitizing']);
Route::get('/applique-digitizing', [FrontControllerController::class, 'appliqueDigitizing']);
Route::get('/3d-puff-digitizing', [FrontControllerController::class, 'puffDigitizing']);
Route::get('/embroidered-patches', [FrontControllerController::class, 'embroiderdPatches']);
Route::get('/vector-art-digitizing', [FrontControllerController::class, 'vectorArtDigitizing']);
Route::get('/jacket-back-digitizing', [FrontControllerController::class, 'jacketBackDigitizing']);
Route::get('/pricing', [FrontControllerController::class, 'Pricingdigitizing']);
Route::get('/contact-us', [FrontControllerController::class, 'contactUsDigitizing']);
Route::get('/order/edit/{id}', [FrontControllerController::class, 'OrderEdit']);
Route::post('/updateOrders', [FrontControllerController::class, 'updateOrders'])->name('front.updateOrders');
Route::get('/order/download/{id}', [FrontControllerController::class, 'OrderDownload']);

Route::get('/order/paymore/{id}', [FrontControllerController::class, 'paymore'])->name('front.paymore');
Route::post('/placeOrder', [FrontControllerController::class, 'placeOrderForm'])->name('front.placeOrder');
Route::get('/checkout', [FrontControllerController::class, 'checkoutData']);
Route::post('/customerlogin', [FrontControllerController::class, 'CustomerLogin'])->name('front.customerlogin');
Route::get('/dashboard', [FrontControllerController::class, 'UserDashboard'])->name('front.dashboard');
Route::get('/profile', [FrontControllerController::class, 'UserProfile']);
Route::get('/change-password', [FrontControllerController::class, 'UserChangePass']);
Route::post('/updateprofile', [FrontControllerController::class, 'CustomerUpdateProfile'])->name('front.updateprofile');
Route::post('/updatePassword', [FrontControllerController::class, 'CustomerupdatePassword'])->name('front.updatePassword');
Route::post('/customerForgot', [FrontControllerController::class, 'customerForgot'])->name('front.customerForgot');


// checkout discount
Route::post('/checkout-discount', [FrontControllerController::class, 'checkoutDiscount'])->name('front.checkoutDiscount');

Route::get('/checkout/success/{id}', [FrontControllerController::class, 'StripeSuccess'])->name('checkout.success');

Route::get('/checkout/cancel', [FrontControllerController::class, 'StripeCancel'])->name('checkout.cancel');

Route::post('/checkout-session', [FrontControllerController::class, 'CreateStripeSession']);

// paypal start
Route::get('paypal/payment', [PayPalController::class, 'createPayment'])->name('paypal.payment');
// paypal end

Route::post('order/transactions', [FrontControllerController::class, 'orderTransactions'])->name('order.transactions');
Route::post('/webhook/stripe', [FrontControllerController::class, 'StripeWebhook']);
Route::post('/orderCancel', [AdminController::class, 'orderCancel'])->name('designer.orderCancel');

// stripe end

Route::post('/frontorderremoveAttachment', [FrontControllerController::class, 'frontgetorderremoveAttachment'])->name('front.frontorderremoveAttachment');

Route::get('/logout', function () {
  session()->forget('CUSTOMER_ID');
  session()->forget('CUSTOMER_NAME');

  return redirect('/');
});

Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('admin/all-pending-orders', [AdminController::class, 'PendingOrders'])->name('admin.all-pending-orders');
Route::get('admin/add-new-job', [AdminController::class, 'AddNEwJobs']);
Route::post('admin/placeOrderjob', [AdminController::class, 'getplaceOrderjob'])->name('backend.placeOrderjob');
Route::get('/admin/all-discount-code', [AdminController::class, 'getAllDiscountCode']);
Route::get('/admin/add-discount-code', [AdminController::class, 'getAddDiscountCode']);
Route::post('/admin/add-discount-code', [AdminController::class, 'getAddItionDiscountCode'])->name('admin.DiscountAddition');
Route::get('/admin/edit-discount-code/{id}', [AdminController::class, 'getEditDiscountCode'])->name('admin.getDiscountedit');
Route::post('/admin/edit-discount-code', [AdminController::class, 'editDiscountCode'])->name('admin.editDiscount');
Route::get('/admin/all-discount-code/remove/{id}', [AdminController::class, 'getRemoveDiscountCode']);


Route::post('/getOrderStatusChange', [AdminController::class, 'getOrderStatusChange'])->name('admin.getOrderStatusChange');

Route::post('/orderfileattachment', [AdminController::class, 'getOrderfileAttachment'])->name('admin.orderfileattachment');

Route::post('/orderfileattachmentprocessing', [AdminController::class, 'getOrderfileAttachmentprocessing'])->name('admin.orderfileattachmentprocessing');

Route::post('/pendorderstatus', [AdminController::class, 'getPendingOrderRequest'])->name('admin.pendorderstatus');
Route::get('admin/JobDelete/{id}', [AdminController::class, 'getJobDelete']);

Route::post('/orderUpdate', [AdminController::class, 'getorderUpdate'])->name('admin.orderUpdate');

Route::get('/admin/getimagedetails', [AdminController::class, 'GetImageDetails'])->name('admin.GetImageDetails');

Route::get('admin/all-processing-orders', [AdminController::class, 'ProcessingOrders'])->name('admin.all-processing-orders');
Route::post('/processorderstatus', [AdminController::class, 'getprocessingOrderRequest'])->name('admin.processorderstatus');
Route::post('/orderProcessingUpdate', [AdminController::class, 'getorderProcessingUpdate'])->name('admin.orderProcessingUpdate');

Route::post('/orderProcessingMail', [AdminController::class, 'getorderProcessingMail'])->name('admin.orderProcessingMail');
Route::post('/orderProcessingAssignJob', [AdminController::class, 'getorderProcessingAssignJob'])->name('admin.orderProcessingAssignJob');

Route::post('/orderPendingMalQuotationJob', [AdminController::class, 'orderPendingMalQuotationJob'])->name('admin.orderPendingMalQuotationJob');

Route::post('/orderPendingMalJob', [AdminController::class, 'getorderPendingMalJob'])->name('admin.orderPendingMalJob');

Route::post('/orderPendingAssingJob', [AdminController::class, 'getorderPendingAssingJob'])->name('admin.orderPendingAssingJob');

Route::post('/orderremoveAttachment', [AdminController::class, 'getorderremoveAttachment'])->name('admin.orderremoveAttachment');

Route::get('admin/pending/orderDownload/{id}', [AdminController::class, 'orderDownloadCOm']);

Route::post('/applyDiscount', [AdminController::class, 'getapplyDiscount'])->name('admin.applyDiscount');
Route::post('/checkAssignedDesigner', [AdminController::class, 'checkAssignedDesigner'])->name('admin.checkAssignedDesigner');

// ReadyOrderController
Route::get('admin/all-ready-orders', [ReadyOrdersController::class, 'index'])->name('admin.all-ready-orders');
Route::post('/orderReadyUpdate', [ReadyOrdersController::class, 'getorderReadyUpdate'])->name('admin.orderReadyUpdate');
Route::post('/readyorderstatus', [ReadyOrdersController::class, 'getReadyOrderRequest'])->name('admin.readyorderstatus');
Route::post('/orderreadyfileattachment', [ReadyOrdersController::class, 'getOrderReadyfileAttachment'])->name('admin.orderreadyfileattachment');
Route::post('/ReadOrdersendEmail', [ReadyOrdersController::class, 'ReadGetOrdersendEmail'])->name('admin.ReadOrdersendEmail');

// holdOrderController
Route::get('admin/all-hold-orders', [HoldOrdersController::class, 'index'])->name('admin.all-hold-orders');
Route::post('/orderHoldUpdate', [HoldOrdersController::class, 'getorderHoldUpdate'])->name('admin.orderHoldUpdate');
Route::post('/holdorderstatus', [HoldOrdersController::class, 'getholdOrderRequest'])->name('admin.holdorderstatus');
Route::post('/orderholdfileattachment', [HoldOrdersController::class, 'getOrderHoldfileAttachment'])->name('admin.orderholdfileattachment');

// CloseOrderController
Route::get('admin/all-close-orders', [CloseOrdersController::class, 'index'])->name('admin.all-close-orders');
Route::post('/orderCloseUpdate', [CloseOrdersController::class, 'getorderCloseUpdate'])->name('admin.orderCloseUpdate');
Route::post('/closeorderstatus', [CloseOrdersController::class, 'getcloseOrderRequest'])->name('admin.closeorderstatus');
Route::post('/orderclosefileattachment', [CloseOrdersController::class, 'getOrderClosefileAttachment'])->name('admin.orderclosefileattachment');
Route::post('/closeRemoveorders', [CloseOrdersController::class, 'closeRemoveorders'])->name('admin.closeRemoveorders');
Route::post('/archiveOrders', [CloseOrdersController::class, 'archiveOrders'])->name('admin.archiveOrders');
Route::get('admin/archive-orders', [CloseOrdersController::class, 'getArchiveOrders'])->name('admin.archive-orders');


// DesignerCOntroller
Route::get('admin/all-graphic-designer', [GraphicDesignerController::class, 'index']);
Route::post('/designerReg', [GraphicDesignerController::class, 'getdesignerReg'])->name('admin.designerReg');
Route::post('/designerUpdate', [GraphicDesignerController::class, 'GetdesignerUpdate'])->name('admin.designerUpdate');
Route::get('/admin/designerEdit', [GraphicDesignerController::class, 'getdesignerEdit'])->name('admin.designerEdit');
// OrderJobsbyDesigner
Route::get('admin/all-orders-jobs', [DesignerJobsAllController::class, 'index']);
Route::post('/OrderfileAttachmentDesigner', [DesignerJobsAllController::class, 'getOrderfileAttachmentDesigner'])->name('admin.OrderfileAttachmentDesigner');

// CustomerController
Route::get('admin/all-customer-data', [AllCustomersDataController::class, 'index'])->name('customer.all-customer-data');
Route::post('/CustomerUpdate', [AllCustomersDataController::class, 'GetCustomerUpdate'])->name('customer.CustomerUpdate');
Route::get('/CustomerDelete/{id}', [AllCustomersDataController::class, 'CustomerDelete']);

// CmsModulesController
Route::get('admin/all-cms-content', [CmsModulesFrontController::class, 'index']);
Route::post('/processPanel', [CmsModulesFrontController::class, 'GetprocessPanel'])->name('cms.processPanel');
Route::get('admin/logout', function () {
  return redirect('/admin/');
});




// Designer Routes
Route::get('designer', [DesignerController::class, 'index']);
Route::post('designer/auth', [DesignerController::class, 'auth'])->name('designer.auth');
Route::get('designer/logout', function () {
  session()->forget('DES_AGENT_ID');
  session()->forget('DES_USER_NAME');
  session()->forget('DES_AGENT_USERTYPE');
  session()->forget('DES_USER_NAME');
  return redirect('designer');
});
Route::get('designer/dashboard', [DesignerController::class, 'dashboard'])->name('designer.dashboard');
Route::get('designer/job-list', [DesignerController::class, 'jobList'])->name('designer.job-list');
Route::get('designer/job-history', [DesignerController::class, 'jobHistory'])->name('designer.job-history');
Route::post('/orderComplete', [DesignerController::class, 'orderComplete'])->name('designer.orderComplete');
// Route::post('/orderProcessing', [DesignerController::class, 'orderProcessing'])->name('designer.orderProcessing');
route::post('designerorderfileattachment', [DesignerController::class, 'getDesignerOrderfileAttachment'])->name('designer.designerorderfileattachment');
Route::get('designer/orderDownload/{id}', [DesignerController::class, 'orderDownloadCOm']);