<script async src="https://www.google.com/recaptcha/api.js"></script>
@extends('sitelayout/master')
@section('content')

<div class="HeaderContent">

<div class="container">

<div class="row">

<div class="col">

  

  <div class="ContentInfo">


  <a href="{{ url('/embroidery-digitizing') }}"><i class="fa-solid fa-caret-right"></i> Digitize My Design</a>

  <br>

  <a href="{{ url('/vector-art') }}"><i class="fa-solid fa-caret-right"></i> Vector My Artwork</a>

  <br>

    <h1 class="text-white font-weight-bolder">We Are The Best Embroidery Digitizing Services According To Your Needs</h1>

    <h4 class="text-white">BEST AND DEPENDABLE DIGITIZING AND EMBROIDERY SERVICE IN TOWN</h4>

    <p class="text-white">Do you want quality embroidery digitizing services that consistently deliver exceptional results? Embroidery Digitizing Services offers professional, high-quality, breathable embroidery digitizing solutions.</p>

    <p class="text-white">Our expert embroidery digitizers focus on premium quality so your designs look as beautiful as you imagined. From hobbyists wanting to elevate their home project to business owners needing bulk embroidery conversion, we provide tailored solutions to match your exact requirements.</p>


    <h2 class="text-white">EMBROIDERY DIGITIZING DIRECT TO JUMPSTART YOUR DIGITIZING</h2>

    <p class="text-white"> Starting up an embroidery project is all fun and creativity until you have to transform your designs into a stitch file that you can actually use. That is where <b>Embroidery Digitizing</b> Services comes into play. We offer an easy-to-follow approach, converting your art into a machine-readable embroidery format promptly with excellent quality in every stitch.</p>
    
    <!--
    <a href="tel:{{$CmsData[0]->frontPhone}}" class="btn btn-dark mr-2"><i class="fa-solid fa-phone"></i> Call Now</a>

    <a href="javascript:void(Tawk_API.toggle())" class="btn btn-danger"><i class="fa-brands fa-rocketchat"></i> Chat With Us</a>
    -->

  </div>



</div>

<div class="col">

    <div class="OrderForm">

      <h3 class="m-0">Place an Order</h3>

      <p>& Get a Best Experience of Digitizing</p>


      {{-- captcha error --}}
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{route('front.placeOrder')}}" method="post" enctype="multipart/form-data">

        @csrf

      <div class="row">

        <div class="col-md-6">

          <div class="form-group">

            <input type="text" name="fullname" class="form-control" placeholder="Enter Your Design Name" required>

          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group">

            @if(session()->get('CUSTOMER_ID'))

              <input type="email" name="Email"  class="form-control" readonly value="{{session()->get('CUSTOMER_EMAIL')}}" placeholder="Enter Your Email" required>

            @else

              <input type="email" name="Email" class="form-control" placeholder="Enter Your Email" required>

            @endif

          </div>

        </div>

      </div>

      <div class="row">

        <div class="col-6">

          <div class="form-group">

            <input type="number" name="Phone" class="form-control " placeholder="Enter Your Phone No" required>

          </div>

        </div>

        <div class="col">

          <div class="form-group">

            <input type="text" name="Height" class="form-control allow_decimal" placeholder="Height (Inch)" required title="field must be in Inches (Written) on It as ">

          </div>

        </div>

        <div class="col">

           <div class="form-group">

            <input type="text" name="Width" class="form-control allow_decimal" placeholder="Width (Inch)" required title="field must be in Inches (Written) on It as ">

          </div>

        </div>

      </div>



      <div class="row">

        <div class="col-md-6">

          <p clas="m-0" style="font-size:12px;">You have Select : <b id="changeText">Digitize</b></p>

          

        </div>

        <div class="col-md-6">

            <small style="font-size: 10px; text-align: right; display: block; padding-top: 4px;">Note (“Click <span class="textChange">Digitize</span> for <span class="textChange">Digitize</span> job”)</small>

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

        <div class="col-md-12">

          <div class="form-group ordertype">

            <select name="ordertype" id="" class="form-control ordertypexs">

              <option value="">Order Type</option>

              <option value="Left Chest">Left Chest</option>

              <option value="Sleeve">Sleeve</option>

              <option value="Cap">Cap</option>

              <option value="Large Front/Back">Large Front/Back</option>

              <option value="Full Jacket Back">Full Jacket Back</option>

            </select>

          </div>



          <div class="form-group">

            <textarea name="additionalDetails" id="" cols="30" rows="3" class="form-control" placeholder="Additional Details" required></textarea>

          </div>



          <div class="form-group">

            <input type="file" name="uploadfiles[]" class="form-control" multiple required>

            <p class="text-danger pt-1">You can use ctr (cmd) to select multiple files</p>

          </div>

          <!--  Do Not show google recptcha input on form 
            <div id="recaptcha-container"></div> 
          -->


          <div class="form-group">

              <input type="hidden" name="orderType" class="orderType" value="Digitize">

              <input type="hidden" name="orderprice" class="orderprice" value="{{$CmsData[0]->digitizePrice}}">

             <!-- Hold recptcha for this site as its need to test
              <input type="hidden" name="recaptcha_token" id="recaptcha_token">
              <button type="submit" onclick="recaptchaValidation()" class="btn btn-danger btn-block">Proceed to Order</button>
             -->

             
             <button type="submit"  class="btn btn-danger btn-block">Proceed to Order</button>


          </div>



        </div>

      </div>



      </form>



    </div>

</div>

</div>

</div>

</div>



</div>





<div class="AboutSec pt-5 pb-5">

<div class="container">

<div class="row">

<div class="col-md-12">

  <h2 class="pt-3 pb-3 text-center"><span>Why Choose Embroidery Digitizing Direct? 5 GREAT REASONS</h2>

</div>

</div>

<div class="row">

<div class="col">

 <!-- <img src="{{asset('front_assets/img/turning-complex.webp')}}" alt="" class="img-fluid">  -->
 
  <img src="{{asset('front_assets/img/digitizingdirect.png')}}" alt="digitizing direct" class="img-fluid">

</div>

<div class="col">

 
 
 <p>Crystal-Clear Stitch Work: High-quality image digitizing ensures a high level of pixel density for precise image transfer.</p>
<p>Custom Solutions: Whether your design is minimalistic or intricate, we have customized solutions that cater to your project needs.</p>
<p>Formats Supported: PES, DST, XXX, and more. We make sure your files are compatible with your embroidery machine.</p>
<p>Quick Turnaround Times: We understand that time is often critical. Our streamlined processes and dedicated team deliver quickly without compromising on quality.</p>
<p>Best Rates: Our digitizing process offers the best value for your money without compromising on quality and efficiency.</p>
 
 
 


</div>

</div>

</div>

</div>





<div class="OurWork pt-5 pb-5">

<div class="container">

<div class="row">

<div class="col-md-12">

  <h3 class="pt-3 pb-3 text-center"><span>SOME OF</span> OUR WORK</h3>

</div>

</div>

<div class="row">

<div class="col">

  

  <ul class="nav nav-tabs justify-content-center border-0" id="myTab" role="tablist">

  <li class="nav-item" role="presentation">

  <a class="nav-link active" id="All-tab" data-toggle="tab" href="#All" role="tab" aria-controls="All" aria-selected="true">All</a>

  </li>

  <li class="nav-item" role="presentation">

  <a class="nav-link" id="CustomEmbrio-tab" data-toggle="tab" href="#CustomEmbrio" role="tab" aria-controls="CustomEmbrio" aria-selected="false">Custom Embroidery</a>

  </li>

  <li class="nav-item" role="presentation">

  <a class="nav-link" id="VectorArt-tab" data-toggle="tab" href="#VectorArt" role="tab" aria-controls="VectorArt" aria-selected="false">Vector Art</a>

  </li>

  <li class="nav-item" role="presentation">

  <a class="nav-link" id="Patches-tab" data-toggle="tab" href="#Patches" role="tab" aria-controls="Patches" aria-selected="false">Patches</a>

  </li>

  </ul>





  <div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active" id="All" role="tabpanel" aria-labelledby="All-tab">

    <div class="row">

      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/vector-art-work-1.webp')}}" alt="vector art work design" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>

      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/vector-art-work-2.webp')}}" alt="vector logo artwork" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>

      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/vector-art-work-3.webp')}}" alt="Vector work" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>



       <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/embroidery-patches-work-1.webp')}}" alt="embroidery-Digitizing-work" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>



      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/embroidery-patches-work-2.webp')}}" alt="logo-digitizing-work" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>



      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/embroidery-patches-work-3.webp')}}" alt="artwork design " class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>



      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/custom-embroidery-work-1.webp')}}" alt="custom-embroidery-work-1" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>



      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/custom-embroidery-work-2.webp')}}" alt="custom-digitizing logo design" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>



      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/custom-embroidery-work-3.webp')}}" alt="custom logo design" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>







    </div>

  </div>

  <div class="tab-pane fade" id="CustomEmbrio" role="tabpanel" aria-labelledby="CustomEmbrio-tab">

    <div class="row">

      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/custom-embroidery-work-1.webp')}}" alt="Cheap logo design" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>



      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/custom-embroidery-work-2.webp')}}" alt="digitize Logo designe" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>



      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/custom-embroidery-work-3.webp')}}" alt="quick turnaround logo designe" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>

    </div>

  </div>

  <div class="tab-pane fade" id="VectorArt" role="tabpanel" aria-labelledby="VectorArt-tab">

    <div class="row">

      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/vector-art-work-1.webp')}}" alt="vector design" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>

      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/vector-art-work-2.webp')}}" alt="vector job" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>

      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/vector-art-work-3.webp')}}" alt="vector artist" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>

    </div>

  </div>

  <div class="tab-pane fade" id="Patches" role="tabpanel" aria-labelledby="Patches-tab">

    <div class="row">

      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/embroidery-patches-work-1.webp')}}" alt="Logo embroidery" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>



      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/embroidery-patches-work-2.webp')}}" alt="best logo digitize" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>



      <div class="col-md-4">

        <div class="itemBox">

          <img src="{{asset('front_assets/img/embroidery-patches-work-3.webp')}}" alt="best logo design" class="img-fluid">

          <div class="overlay">

            <p>Vector Art</p>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>



</div>



</div>

</div>

</div>





<div class="OurServices pt-5 pb-5">

<div class="container">

<div class="row">

<div class="col-md-12">

   <h3 class="pt-5 pb-4 text-center"><span>OUR ONLINE</span> SERVICES</h3>

</div>

</div>

<div class="row">

<div class="col-6">

  <div class="serviceBox">

    <img src="{{asset('front_assets/img/digitizing.webp')}}" alt="digitizing logo" class="img-fluid">

    <div class="overlayBox">

      <h3>Digitizing</h3>

      <p>We’re here to provide reliable embroidery digitizing

service with prompt turnaround.</p>

    </div>

  </div>

</div>

<div class="col">

  <div class="serviceBox">

    <img src="{{asset('front_assets/img/vector-art.webp')}}" alt="vector art design" class="img-fluid">

    <div class="overlayBox">

      <h3>Vector Art</h3>

      <p>We’re here to provide reliable embroidery digitizing service with prompt turnaround.</p>

    </div>

  </div>

</div>

<div class="col">

   <div class="serviceBox">

    <img src="{{asset('front_assets/img/custom-patches.webp')}}" alt="custom patches" class="img-fluid">

    <div class="overlayBox">

      <h3>Custom Patches</h3>

      <p>We’re here to provide reliable embroidery digitizing service with prompt turnaround.</p>

    </div>

  </div>

</div>

</div>



<div class="row pt-4">

<div class="col">

  <div class="serviceBox">

    <img src="{{asset('front_assets/img/vector-art.webp')}}" alt="logo vector design" class="img-fluid">

    <div class="overlayBox">

      <h3>Vector Art</h3>

      <p>We’re here to provide reliable embroidery digitizing service with prompt turnaround.</p>

    </div>

  </div>

</div>

<div class="col">

   <div class="serviceBox">

    <img src="{{asset('front_assets/img/custom-patches.webp')}}" alt="quality embroidery service" class="img-fluid">

    <div class="overlayBox">

      <h3>Custom Patches</h3>

      <p>We’re here to provide reliable embroidery digitizing service with prompt turnaround.</p>

    </div>

  </div>

</div>



<div class="col-6">

  <div class="serviceBox">

    <img src="{{asset('front_assets/img/digitizing.webp')}}" alt="logo digitizing" class="img-fluid">

    <div class="overlayBox">

      <h3>Digitizing</h3>

      <p>We’re here to provide reliable embroidery digitizing

service with prompt turnaround.</p>

    </div>

  </div>

</div>



</div>

</div>

</div>





<div class="ReasonSec pt-5 pb-5">

<div class="container">

<div class="row pb-4">

<div class="col-md-12">

 
    <h2 >HIGH-CLASS EMBROIDERY DIGITIZERS IN BUDGET RANGE</h2>

    <p >At Embroidery Digitizing Direct, we understand that high quality should not come at a high price, even on a tight budget. We provide top-tier services at affordable prices, ensuring that small businesses and large corporates alike can avail of our services without spending a fortune.</p>
    
    
</div>

</div>



<div class="row">

<div class="col">

  

  <div class="ReasonItems">

    <div class="iconImg">

      <img src="{{asset('front_assets/img/fastest.webp')}}" alt="quick logo job">

    </div>

    <div class="InfoReason">

      <h3>Quality Products Without the Markup</h3>

      <p>On Latest Technology and Techniques: We use the latest digitizing software and processing hardware to ensure that every design is crafted with utmost precision and accuracy.</p>
<p>Accountability: All our services are backed by a money-back guarantee or a complete refund.</p>
<p>Clear Pricing: There are absolutely no hidden charges. You only pay for the digitizing services you receive, virtual handshakes included.</p>
<p>Quality Assurance: Each digitized design undergoes a comprehensive quality check to meet our high standards and your expectations.</p>

    </div>

  </div>



   <div class="ReasonItems">

    <div class="iconImg">

      <img src="{{asset('front_assets/img/free.webp')}}" alt="">

    </div>

    <div class="InfoReason">

      <h2>High Quality, Low Cost Embroidery Digitizing</h2>

      <p><b>Embroidery Digitizing Direct</b> is your go-to source for services that perfectly blend affordability with the highest quality. Whether you need digitization for a one-time project or are looking for a long-term digitizing partner, our pricing is designed to offer you high-quality services without financial constraints.
For more details about our services and how we can meet your embroidery needs within your budget, get in touch with us today! Let’s create something beautiful together, affordably.
</p>

    </div>

  </div>

</div>

<div class="col">

  <img src="{{asset('front_assets/img/digitizing-agency.webp')}}" alt="digitizing agency" class="img-fluid">

</div>

</div>

</div>

</div>







@endsection