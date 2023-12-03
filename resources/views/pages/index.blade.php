@extends('layouts.main')

@section('content')
 <!-- Home -->

 <section class="about d-flex align-items-center text-light py-5" id="about">
        <div class="container" >
            <div class="row d-flex align-items-center">
                <div class="col-lg-7" data-aos="fade-right">
                    
                    <h1>Walk to remember <br> event registration Platform</h1>
                    <p class="py-2 para-light">The Walk to Remember is an annual event that takes place on the night of April 7th, marking the beginning of the genocide in 1994.</p>
                    <p class="py-2 para-light">During this event, Rwandans, as well as visitors and participants from around the world, gather to walk in silent remembrance of the genocide victims.</p>
                    <p class="py-2 para-light">The walk usually covers a specific distance, often from a designated starting point to a memorial site or a place of significance related to the genocide..</p>


                    <div class="my-3">
                    <a class="btn" href="{{url('login')}}">Get Register Here For Ibuka Event</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center py-4 py-sm-0" data-aos="fade-down"> 
                    <img class="img-fluid" src="/images/wa5.jpg" alt="about" >
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of about -->

    <!-- Large modal -->


    <!-- Information -->
    <section class="information">
        <div class="container-fluid">  
            <div class="row text-light">
                <div class="col-lg-4 text-center p-5" data-aos="zoom-in">
                    <i class="fas fa-tachometer-alt fa-3x p-2"></i>
                    <h4 class="py-3">Download 1 GBPS</h4>
                    <p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>
                </div>
                <div class="col-lg-4 text-center p-5"  data-aos="zoom-in">
                    <i class="fas fa-clock fa-3x p-2"></i>
                    <h4 class="py-3">99% Internet Uptime</h4>
                    <p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>
                </div>
                <div class="col-lg-4 text-center p-5 text-dark"  data-aos="zoom-in"> 
                    <i class="fas fa-headset fa-3x p-2"></i>
                    <h4 class="py-3">24/7 Support </h4>
                    <p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>
                </div>
            </div>
        </div> <!-- end of container -->
    </section> <!-- end of information -->
@endsection