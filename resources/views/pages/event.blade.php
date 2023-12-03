@extends('layouts.main')

@section('content')

<br><br><br>
<style>
* {
  box-sizing: border-box;
}

body {
    background-image: url(../assets/images/k.jfif);
    background-repeat: no-repeat;
    background-size: cover;
}

#regForm {
  background-color: #fff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 40%;
  min-width: 200px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 70%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 5px 10px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>
<body>

<form id="regForm" method="post" action="{{url('save-list')}}">
@csrf
<button  href="" type="button" class="btn btn-danger" >Back</button>
<br><br>
  <h4>Tell us About You:</h4>
  <!-- One "tab" for each step in the form: -->

  <div class="tab">personal Identification:
    <p><input placeholder="First name..." oninput="this.className = ''" name="fname"></p>
    <p><input placeholder="Last name..." oninput="this.className = ''" name="lname"></p>
  </div>
  <div class="tab">Contact Info:
    <p><input placeholder="National Id" oninput="this.className = ''" name="nid"></p>
    <p><input placeholder="Phone..." oninput="this.className = ''" name="phone"></p>
    <p><input  placeholder= "{{ Auth::user()->email }}" oninput="this.className = ''" name="email">
   
  </p>
  </div>
  <div class="tab">Location Info:
     <!-- Search Start -->
     <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <select name="province" id="the_province_select_option"  class="form-select border-0">
                                    <option selected>Province</option>
  
                                </select>
                            </div>

                            <div class="col-md-4">
                                <select id="the_district_select_option" name="district" id="the_district_select_option"  class="form-select border-0">
                                    <option selected>District</option>
                           
                                    
                                </select>
                            </div>
                            
                            <div class="col-md-4">
                                <select id="the_sectors_select_option" name="sector" id="the_sectors_select_option"  class="form-select border-0">
                                    <option selected>Sector</option>
                                </select>
                            </div>
                        
                        </div>
                    </div>

                </div>
            </div>
        </div>
 
  </div>
  <div class="tab">Event Location:
  <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <select name="start" id="the_province_select_option"  class="form-select border-0">
                                    <option selected>Walk start to.. </option>
  
                                </select>
                            </div>

                            <div class="col-md-6">
                                <select id="the_district_select_option" name="end" id="the_district_select_option"  class="form-select border-0">
                                    <option selected>Walk End to..</option>
                           
                                    
                                </select>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- <p><input placeholder="Walk Start From" oninput="this.className = ''" name="from"></p>
    <p><input placeholder="To.." oninput="this.className = ''" name="to" type="password"></p> -->
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>
</body>
</html>

@endsection