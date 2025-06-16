@extends('sitelayout/master')


@section('content')



<div class="OrderDetails pt-3 pb-3">



<div class="container">



<div class="row">



<div class="col-md-12">

@if(session()->has('message'))



<div class="alert alert-success">



    {{ session()->get('message') }}



</div>



@endif



            <div class="ContentInfo pt-4 pb-4">

    <h1 class="text-black font-weight-bolder text-uppercase">User Profile</h1>



  </div>


<form method="post" action="{{route('front.updateprofile')}}">

    @csrf

<div class="row">

<div class="col-md-6">

    <div class="form-group">

        <label for="">Name</label>

        <input type="text" name="uname" class="form-control" value="{{$UserData[0]->name}}">

    </div>

</div>

<div class="col-md-6">

    <div class="form-group">

        <label for="">Email</label>

        <input type="email" name="email" class="form-control" disabled value="{{$UserData[0]->emailaddress}}">

    </div>

</div>

<div class="col-md-6">

    <div class="form-group">

        <label for="">Company</label>

        <input type="text" name="company" class="form-control" value="{{$UserData[0]->company}}">

    </div>

</div>



<div class="col-md-6">

    <div class="form-group">

        <label for="">Date Of Birth</label>

        <input type="date" name="dob" class="form-control" value="{{$UserData[0]->dob}}">

    </div>

</div>



<div class="col-md-6">

    <div class="form-group">

        <label for="">Gender</label>

        <select name="gender" id="" class="form-control">

            <option value="">Select Gender</option>

            @if($UserData[0]->Gender == 'male')

            <option value="male" selected>Male</option>

            <option value="female">Female</option>

            @elseif($UserData[0]->Gender == 'female')

            <option value="female" selected>Female</option>

            <option value="male" >Male</option>

            @else

            <option value="male" >Male</option>

            <option value="female">Female</option>

            @endif

           

            

        </select>

    </div>

</div>



<div class="col-md-6">

    <div class="form-group">

        <label for="">Mobile No</label>

        <input type="tel" name="mobileno" class="form-control" value="{{$UserData[0]->mobileno}}">

    </div>

</div>





<div class="col-md-6">

    <div class="form-group">

        <label for="">Address</label>

        <input type="text" name="address" class="form-control" value="{{$UserData[0]->address}}">

    </div>

</div>



<div class="col-md-6">

    <div class="form-group">

        <label for="">City</label>

        <input type="text" name="city" class="form-control" value="{{$UserData[0]->city}}">

    </div>

</div>



<div class="col-md-6">

    <div class="form-group">

        <label for="">Postal Code</label>

        <input type="text" name="postalCode" class="form-control" value="{{$UserData[0]->postalCode}}">

    </div>

</div>



<!-- <div class="col-md-6">

    <div class="form-group">

        <label for="">Country</label>

        <select name="ctl00$MainContent$Country" id="MainContent_Country" class="txtField form-control">

        <option value="GBR">United Kingdom</option>

        <option value="USA">United States</option>

        <option value="AUS">Australia</option>

        <option value="CAN">Canada</option>

        <option value="FRA">France</option>

        <option value="DEU">Germany</option>

        <option value="CHE">Switzerland</option>

        <option value="AFG">Afghanistan</option>

        <option value="ALA">Aland Islands</option>

        <option value="ALB">Albania</option>

        <option value="DZA">Algeria</option>

        <option value="ASM">American Samoa</option>

        <option value="AND">Andorra</option>

        <option value="AGO">Angola</option>

        <option value="AIA">Anguilla</option>

        <option value="ATA">Antarctica</option>

        <option value="ATG">Antigua and Barbuda</option>

        <option value="ARG">Argentina</option>

        <option value="ARM">Armenia</option>

        <option value="ABW">Aruba</option>

        <option value="AUT">Austria</option>

        <option value="AZE">Azerbaijan</option>

        <option value="BHS">Bahamas</option>

        <option value="BHR">Bahrain</option>

        <option value="BGD">Bangladesh</option>

        <option value="BRB">Barbados</option>

        <option value="BLR">Belarus</option>

        <option value="BEL">Belgium</option>

        <option value="BLZ">Belize</option>

        <option value="BEN">Benin</option>

        <option value="BMU">Bermuda</option>

        <option value="BTN">Bhutan</option>

        <option value="BOL">Bolivia</option>

        <option value="BIH">Bosnia and Herzegovina</option>

        <option value="BWA">Botswana</option>

        <option value="BVT">Bouvet Island</option>

        <option value="BRA">Brazil</option>

        <option value="BRN">Brunei Darussalam</option>

        <option value="BGR">Bulgaria</option>

        <option value="BFA">Burkina Faso</option>

        <option value="BDI">Burundi</option>

        <option value="KHM">Cambodia</option>

        <option value="CMR">Cameroon</option>

        <option value="CPV">Cape Verde</option>

        <option value="CYM">Cayman Islands</option>

        <option value="CAF">Central African Republic</option>

        <option value="TCD">Chad</option>

        <option value="CHL">Chile</option>

        <option value="CHN">China</option>

        <option value="CXR">Christmas Island</option>

        <option value="CCK">Cocos Keeling Islands</option>

        <option value="COL">Colombia</option>

        <option value="COM">Comoros</option>

        <option value="COG">Congo</option>

        <option value="COD">Congo</option>

        <option value="COK">Cook Islands</option>

        <option value="CRI">Costa Rica</option>

        <option value="CIV">Côte dIvoire</option>

        <option value="HRV">Croatia</option>

        <option value="CUB">Cuba</option>

        <option value="CYP">Cyprus</option>

        <option value="CZE">Czech Republic</option>

        <option value="DNK">Denmark</option>

        <option value="DJI">Djibouti</option>

        <option value="DMA">Dominica</option>

        <option value="DOM">Dominican Republic</option>

        <option value="ECU">Ecuador</option>

        <option value="EGY">Egypt</option>

        <option value="SLV">El Salvador</option>

        <option value="GNQ">Equatorial Guinea</option>

        <option value="ERI">Eritrea</option>

        <option value="EST">Estonia</option>

        <option value="ETH">Ethiopia</option>

        <option value="FLK">Falkland Islands Malvinas</option>

        <option value="FRO">Faroe Islands</option>

        <option value="FJI">Fiji</option>

        <option value="FIN">Finland</option>

        <option value="GUF">French Guiana</option>

        <option value="PYF">French Polynesia</option>

        <option value="ATF">French Southern Territories</option>

        <option value="GAB">Gabon</option>

        <option value="GMB">Gambia</option>

        <option value="GEO">Georgia</option>

        <option value="GHA">Ghana</option>

        <option value="GIB">Gibraltar</option>

        <option value="GRC">Greece</option>

        <option value="GRL">Greenland</option>

        <option value="GRD">Grenada</option>

        <option value="GLP">Guadeloupe</option>

        <option value="GUM">Guam</option>

        <option value="GTM">Guatemala</option>

        <option value="GGY">Guernsey</option>

        <option value="GIN">Guinea</option>

        <option value="GNB">Guinea-Bissau</option>

        <option value="GUY">Guyana</option>

        <option value="HTI">Haiti</option>

        <option value="HND">Honduras</option>

        <option value="HKG">Hong Kong</option>

        <option value="HUN">Hungary</option>

        <option value="ISL">Iceland</option>

        <option value="IND">India</option>

        <option value="IDN">Indonesia</option>

        <option value="IRN">Iran</option>

        <option value="IRQ">Iraq</option>

        <option value="IRL">Ireland</option>

        <option value="IMN">Isle of Man</option>

        <option value="ISR">Israel</option>

        <option value="ITA">Italy</option>

        <option value="JAM">Jamaica</option>

        <option value="JPN">Japan</option>

        <option value="JEY">Jersey</option>

        <option value="JOR">Jordan</option>

        <option value="KAZ">Kazakhstan</option>

        <option value="KEN">Kenya</option>

        <option value="KIR">Kiribati</option>

        <option value="KWT">Kuwait</option>

        <option value="KGZ">Kyrgyzstan</option>

        <option value="LAO">Laos</option>

        <option value="LVA">Latvia</option>

        <option value="LBN">Lebanon</option>

        <option value="LSO">Lesotho</option>

        <option value="LBR">Liberia</option>

        <option value="LIE">Liechtenstein</option>

        <option value="LTU">Lithuania</option>

        <option value="LUX">Luxembourg</option>

        <option value="MAC">Macao</option>

        <option value="MKD">Macedonia</option>

        <option value="MDG">Madagascar</option>

        <option value="MWI">Malawi</option>

        <option value="MYS">Malaysia</option>

        <option value="MDV">Maldives</option>

        <option value="MLI">Mali</option>

        <option value="MLT">Malta</option>

        <option value="MHL">Marshall Islands</option>

        <option value="MTQ">Martinique</option>

        <option value="MRT">Mauritania</option>

        <option value="MUS">Mauritius</option>

        <option value="MYT">Mayotte</option>

        <option value="MEX">Mexico</option>

        <option value="FSM">Micronesia</option>

        <option value="MDA">Moldova</option>

        <option value="MCO">Monaco</option>

        <option value="MNG">Mongolia</option>

        <option value="MNE">Montenegro</option>

        <option value="MSR">Montserrat</option>

        <option value="MAR">Morocco</option>

        <option value="MOZ">Mozambique</option>

        <option value="MMR">Myanmar</option>

        <option value="NAM">Namibia</option>

        <option value="NRU">Nauru</option>

        <option value="NPL">Nepal</option>

        <option value="NLD">Netherlands</option>

        <option value="ANT">Netherlands Antilles</option>

        <option value="NCL">New Caledonia</option>

        <option value="NZL">New Zealand</option>

        <option value="NIC">Nicaragua</option>

        <option value="NER">Niger</option>

        <option value="NGA">Nigeria</option>

        <option value="NIU">Niue</option>

        <option value="NFK">Norfolk Island</option>

        <option value="PRK">North Korea</option>

        <option value="NOR">Norway</option>

        <option value="OMN">Oman</option>

        <option value="PAK">Pakistan</option>

        <option value="PLW">Palau</option>

        <option value="PSE">Palestinian Territory</option>

        <option value="PAN">Panama</option>

        <option value="PNG">Papua New Guinea</option>

        <option value="PRY">Paraguay</option>

        <option value="PER">Peru</option>

        <option value="PHL">Philippines</option>

        <option value="PCN">Pitcairn</option>

        <option value="POL">Poland</option>

        <option value="PRT">Portugal</option>

        <option value="PRI">Puerto Rico</option>

        <option value="QAT">Qatar</option>

        <option value="REU">Réunion</option>

        <option value="ROU">Romania</option>

        <option value="RUS">Russian Federation</option>

        <option value="RWA">Rwanda</option>

        <option value="BLM">Saint Barthelemy</option>

        <option value="SHN">Saint Helena</option>

        <option value="LCA">Saint Lucia</option>

        <option value="WSM">Samoa</option>

        <option value="SMR">San Marino</option>

        <option value="SAU">Saudi Arabia</option>

        <option value="SEN">Senegal</option>

        <option value="SRB">Serbia</option>

        <option value="SYC">Seychelles</option>

        <option value="SLE">Sierra Leone</option>

        <option value="SGP">Singapore</option>

        <option value="SVK">Slovakia</option>

        <option value="SVN">Slovenia</option>

        <option value="SLB">Solomon Islands</option>

        <option value="SOM">Somalia</option>

        <option value="ZAF">South Africa</option>

        <option value="KOR">South Korea</option>

        <option value="ESP">Spain</option>

        <option value="LKA">Sri Lanka</option>

        <option value="SDN">Sudan</option>

        <option value="SUR">Suriname</option>

        <option value="SJM">Svalbard and Jan Mayen</option>

        <option value="SWZ">Swaziland</option>

        <option value="SWE">Sweden</option>

        <option value="SYR">Syria</option>

        <option value="TWN">Taiwan</option>

        <option value="TJK">Tajikistan</option>

        <option value="TZA">Tanzania</option>

        <option value="THA">Thailand</option>

        <option value="TLS">Timor-Leste</option>

        <option value="TGO">Togo</option>

        <option value="TKL">Tokelau</option>

        <option value="TON">Tonga</option>

        <option value="TTO">Trinidad and Tobago</option>

        <option value="TUN">Tunisia</option>

        <option value="TUR">Turkey</option>

        <option value="TKM">Turkmenistan</option>

        <option value="TCA">Turks and Caicos Islands</option>

        <option value="TUV">Tuvalu</option>

        <option value="UGA">Uganda</option>

        <option value="UKR">Ukraine</option>

        <option value="ARE">United Arab Emirates</option>

        <option value="URY">Uruguay</option>

        <option value="UZB">Uzbekistan</option>

        <option value="VUT">Vanuatu</option>

        <option value="VEN">Venezuela</option>

        <option value="VNM">Viet Nam</option>

        <option value="VIR">Virgin Islands</option>

        <option value="VGB">Virgin Islands</option>

        <option value="WLF">Wallis and Futuna</option>

        <option value="ESH">Western Sahara</option>

        <option value="YEM">Yemen</option>

        <option value="ZMB">Zambia</option>

        <option value="ZWE">Zimbabwe</option>



        </select>

    </div>

</div> -->



<div class="col-12">

    <div class="form-group">

        <input type="hidden" name="id" value="{{$UserData[0]->id}}">

        <button type="submit" class="btn btn-success">Update</button>

    </div>

</div>





</div>

</form>

</div>

</div>

</div>

</div>



@endsection