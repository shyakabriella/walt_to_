@extends('layouts.main')

@section('content')
<section class="home py-5 d-flex align-items-center" id="header">
        <div class="container text-light py-5"  data-aos="fade-right"> 
            <h1 class="headline">Walk <span class="home_text">To Remember</span><br> Event Registaration</h1>
            <p class="para para-light py-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus tempore accusamus quis magnam doloremque itaque ad modi, pariatur iste labore similique officiis impedit aspernatur aperiam facere architecto. Eligendi, repellendus inventore!</p>
            
            <div class="my-3">
                <a class="btn" href="#plans">Get Register Here For Ibuka Event</a>
            </div>
        </div> <!-- end of container -->
    </section> <!-- end of home -->

<section class="services d-flex align-items-center py-5" id="services">
        <div class="container text-light">
            <div class="text-center pb-4" >
        
                <p>OUR SERVICES</p> 
                <h2 class="py-2">Explore unlimited possibilities</h2>
                <p class="para-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae asperiores, quia accusantium sunt corporis optio recusandae? Nostrum libero pariatur cumque, ipsa dolores voluptatibus voluptate alias sit fuga. Itaque, ea quo.</p>
            </div>
            <div class="row gy-4 py-2" data-aos="zoom-in">
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                        <i class="fas fa-home fa-2x"></i>
                        <h4 class="py-2">HOME BROADBAND</h4>
                        <p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                        <i class="fas fa-wifi fa-2x"></i>
                        <h4 class="py-2"> HOME WIFI</h4>
                        <p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                        <i class="fas fa-phone fa-2x"></i>
                        <h4 class="py-2">HOME BROADBAND</h4>
                        <p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                        <i class="fas fa-mobile fa-2x"></i>
                        <h4 class="py-2">MOBILE CONNECTION</h4>
                        <p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                        <i class="fas fa-home fa-2x"></i>
                        <h4 class="py-2">SECURITY</h4>
                        <p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                        <i class="fas fa-tv fa-2x"></i>
                        <h4 class="py-2">TV SETUP BOX</h4>
                        <p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>
                    </div>                    
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of services -->

@endsection