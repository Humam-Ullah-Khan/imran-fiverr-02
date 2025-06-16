@extends('sitelayout/master')

@section ('css')

<style>

  .imgx {

  display: flex;

  gap: 16px;

}

.imgX {

  width: 130px;

  position: relative;

}

a.removeItem {

  background: #ff0909;

  position: absolute;

  top: 0px;

  right: 10px;

  padding: 3px 10px;

  color: #fff;

  border-radius: 21px;

  text-decoration: none;

}

</style>

@endsection

@section('content')


<div class="HeaderContent bg-white">



<div class="container">



<div class="row">



<div class="col-7">







<form action="{{route('front.updateOrders')}}" method="post" enctype="multipart/form-data">



@csrf



<div class="row">



<div class="col-md-6">



<div class="form-group">



<input type="text" name="fullname" readonly class="form-control" placeholder="Enter Your Full Name" value="{{$OrdeData[0]->name}}" required>



</div>



</div>



<div class="col-md-6">



<div class="form-group">



<input type="email" name="Email" readonly class="form-control" placeholder="Enter Your Email" value="{{$OrdeData[0]->email}}" required>



</div>



</div>



</div>



<div class="row">



<div class="col-6">



<div class="form-group">



<input type="number" name="Phone" class="form-control" placeholder="Enter Your Phone No" value="{{$OrdeData[0]->phone_number}}" required>



</div>



</div>



<div class="col">



<div class="form-group">



<input type="text" name="Height" class="form-control allow_decimal" placeholder="Height (Inch)" value="{{$OrdeData[0]->height}}" title="field must be in Inches (Written) on It as " required>



</div>



</div>



<div class="col">



<div class="form-group">



<input type="text" name="Width" class="form-control allow_decimal" placeholder="Width (Inch)" value="{{$OrdeData[0]->width}}" title="field must be in Inches (Written) on It as " required>



</div>



</div>



</div>







<div class="row">



<div class="col-md-6">



<p style="margin:0; padding:0;">You Select : <b id="changeText">{{$OrdeData[0]->type}}</b></p>





</div>

<div class="col-md-6">

    <small style="font-size: 13px; text-align: right; display: block; padding-top: 4px;">Note (“Click <span class="textChange">Digitize</span> for <span class="textChange">Digitize</span> job”)</small>

</div>



</div>



<div class="row">



<div class="col pr-md-0">



<div class="form-group">



<a href="javascript:;" class="btn btn-green btn-block TypeOrder" dataPrice="{{$CmsData[0]->digitizePrice}}" datatext="Digitize">Digitize</a>



</div>



</div>







<div class="col pl-md-0">



<div class="form-group">



<a href="javascript:;" class="btn btn-danger btn-block TypeOrder" dataPrice="{{$CmsData[0]->vectorizePrice}}" datatext="Vectorized">Vectorized</a>



</div>



</div>



</div>







<div class="row">







@if($OrdeData[0]->type == 'Vectorized')







@else



<div class="col-md-12">



<div class="form-group ordertype">



<select name="ordertypexs" id="" class="form-control ordertypexs">



    <option value="">Order Type</option>



    @if($OrdeData[0]->additional_attributes == 'Left Chest')

    

    <option value="Left Chest" selected>Left Chest</option>

     <option value="Sleeve">Sleeve</option>

      <option value="Cap">Cap</option>

      <option value="Large Front/Back">Large Front/Back</option>

      <option value="Full Jacket Back">Full Jacket Back</option>

    

    @elseif($OrdeData[0]->additional_attributes == 'Sleeve')

    <option value="Sleeve" selected>Sleeve</option>

     <option value="Left Chest">Left Chest</option>

      <option value="Cap">Cap</option>

      <option value="Large Front/Back">Large Front/Back</option>

      <option value="Full Jacket Back">Full Jacket Back</option>

      

    @elseif($OrdeData[0]->additional_attributes == 'Cap')

     <option value="Cap" selected>Cap</option>

     <option value="Sleeve" selected>Sleeve</option>

     <option value="Left Chest">Left Chest</option>

      

      <option value="Large Front/Back">Large Front/Back</option>

      <option value="Full Jacket Back">Full Jacket Back</option>

    

    @elseif($OrdeData[0]->additional_attributes == 'Large Front/Back')

     <option value="Large Front/Back" selected>Large Front/Back</option>

      <option value="Cap" >Cap</option>

     <option value="Sleeve" >Sleeve</option>

     <option value="Left Chest">Left Chest</option>

    

    

    @elseif($OrdeData[0]->additional_attributes == 'Full Jacket Back')

    

     <option value="Full Jacket Back" selected>Full Jacket Back</option>

       <option value="Cap" >Cap</option>

     <option value="Sleeve" >Sleeve</option>

     <option value="Left Chest">Left Chest</option>

      

      <option value="Large Front/Back">Large Front/Back</option>

     

     @else

     

      <option value="Full Jacket Back">Full Jacket Back</option>

      <option value="Sleeve">Sleeve</option>

      <option value="Cap">Cap</option>

      <option value="Large Front/Back">Large Front/Back</option>

      <option value="Full Jacket Back">Full Jacket Back</option>

     @endif

     

     



</select>



</div>



@endif







<div class="col-md-12">





<div class="form-group">



<textarea name="additionalDetails" id="" cols="30" rows="3" class="form-control" placeholder="Additional Details" required>{{$OrdeData[0]->details}}</textarea>



</div>







<div class="form-group">



<input type="file" name="uploadfiles[]" class="form-control" multiple>



<p class="text-danger pt-1">You can use ctr (cmd) to select multiple files</p>



<div class="imgx">

   

   @foreach($OrdeImgData as $data)

   <div class="imgX">

    <a href="javascript:;" class="removeItem" dataid='{{$data->id}}'>X</a>

    <img src="{{asset('storage/OrderAttachment/')}}/{{$data->orderImg}}" alt="" width="100%">

    </div>

   @endforeach

    

</div>



</div>







<div class="form-group">



    <input type="hidden" name="orderType" class="orderType" value="{{$OrdeData[0]->type}}">



    <input type="hidden" name="orderprice" class="orderprice" value="@if($OrdeData[0]->type == 'Digitize'){{$CmsData[0]->digitizePrice}}@else{{$CmsData[0]->vectorizePrice}}@endif">



    <input type="hidden" name="id" value="{{$oid}}">



    <button type="submit" class="btn btn-danger btn-block">Update Order</button>



</div>





</div>







</div>



</div>







</form>











</div>



</div>



</div>







</div>







@endsection