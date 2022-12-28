<!DOCTYPE html>
@extends('layouts.app')
@section('content')

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="../js/loginRegister.js"></script>
        <style>
            body,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: "Raleway", sans-serif
            }

            body,
            html {
                height: 100%;
                line-height: 1.8;
            }

            /* Full height image header */
            .bgimg-1 {
                background-position: center;
                background-size: cover;
                background-image: url("/w3images/mac.jpg");
                min-height: 100%;
            }

            .w3-bar .w3-button {
                padding: 16px;
            }
            .price-black{
              background-color: black;
              border-radius:15px;
              color:white;
            }
            .price-white{
              background-color: white;
                border-radius:15px;
              color:black;
            }
        </style>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

        <head>

        <body>



            <!-- Promo Section - "We know design" -->
            <div class="w3-container w3-light-grey" style="padding:128px 16px; ">
                <div class="w3-row-padding">
                    <div class="w3-col m6">
                        <h1 style="color:black;">SU<b style="color:red">D</b>U Car Wash Detailing</h1>
                        <p>The purpose of <strong>SUDU Car Wash Detailing</strong> is to provide a service that cleans and
                            maintains the
                            appearance of vehicles. Car wash companies may have different specific goals, such as providing
                            high-quality service to customers, offering a variety of services to meet the needs of different
                            customers, or operating efficiently to maximize profits. However, the overall goal of a car wash
                            company is to provide a service that meets the needs of its customers and helps to keep their
                            vehicles looking clean and well-maintained. Some car wash companies may also have a social or
                            environmental mission, such as using eco-friendly cleaning products or providing employment
                            opportunities for members of the community.</p>
                        <p><a href="#work" class="w3-button w3-black" style="border-radius: 15px;"><i
                                    class="fa fa-th"> </i> View Our Works</a></p>
                    </div>
                    <div class="w3-col m6">
                        <img class="w3-image w3-round-large" src="{{ asset('images/welcomePage/sudu-logo.png') }}"
                            alt="Buildings" width="700" height="250">
                    </div>
                </div>
            </div>

            <!-- About Section -->
            <div class="w3-container" style="padding:128px 16px; background-color:white;" id="about">
                <h3 class="w3-center">ABOUT THE COMPANY</h3>
                <p class="w3-center w3-large">Key features of our company</p>
                <div class="w3-row-padding w3-center" style="margin-top:64px">
                    <div class="w3-quarter">
                        <i class="far fa-calendar-alt w3-margin-bottom w3-jumbo w3-center"></i>
                        <p class="w3-large">Speed</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore.</p>
                    </div>
                    <div class="w3-quarter">
                        <i class="fas fa-car-side w3-margin-bottom w3-jumbo"></i>
                        <p class="w3-large">Car Grooming</p>
                        <p>All products & equipment used will be of top grade quality to ensure that your car is well taken
                            care of.</p>
                    </div>
                    <div class="w3-quarter">
                        <i class="far fa-smile-beam w3-margin-bottom w3-jumbo"></i>
                        <p class="w3-large">Service</p>
                        <p>A car wash, carwash, or auto wash is a facility used to clean the exterior, and in some cases the
                            interior of motor vehicles. Car washes can be self-service, full-service (with attendants who
                            wash the vehicle), or fully automated (possibly connected to a gas station).</p>
                    </div>
                    <div class="w3-quarter">
                        <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
                        <p class="w3-large">Odjective</p>
                        <p>
                            Image result for car wash support explain
                            To provide a high quality, full-service car wash which will include complete car detailing,
                            restaurant, and gift shop so that customers will perceive great value and give them the
                            opportunity to have an enjoyable meal while their car is being washed or detailed.</p>
                    </div>
                </div>
            </div>



            <!-- Team Section -->
            <div class="w3-container" style="padding:128px 16px;     background-color: #f1f1f1!important;" id="team">
                <h3 class="w3-center">The Branch</h3>
                <p class="w3-center w3-large">The Branch Area</p>
                <div class="w3-row-padding w3-grayscale" style="margin-top:64px">
                    <div class="w3-col l3 m6 w3-margin-bottom">
                        <div class="w3-card" style="border-radius: 15px;">
                            <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
                            <div class="w3-container">
                                <h3>Kuala Lumpur</h3>
                                <p class="w3-opacity">create by 2021 year</p>
                                <p>Address: Lot 4, Jalan Empat, Chan Sow Lin, 55200 Kuala Lumpur </p>
                                <p><a style="text-decoration: none;" aria-label="Chat on WhatsApp"
                                        href="https://wa.me/127120500"><button class="w3-button w3-block"
                                            style="background-color:white; border-radius: 15px;"><i
                                                class="fa fa-envelope"></i>
                                            Contact</button></a></p>

                            </div>
                        </div>
                    </div>
                    <div class="w3-col l3 m6 w3-margin-bottom">
                        <div class="w3-card" style="border-radius: 15px;">
                            <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
                            <div class="w3-container price-white">
                                <h3>Selangor</h3>
                                <p class="w3-opacity">creat by 2020 year </p>
                                <p>Address: 25g, Jalan Kenari 3, Bandar Puchong Jaya, 47100 Puchong, Selangor</p>
                                <p><a style="text-decoration: none;" aria-label="Chat on WhatsApp"
                                        href="https://wa.me/127120500"><button class="w3-button w3-block"
                                            style="background-color: #f1f1f1; border-radius: 15px;"><i
                                                class="fa fa-envelope"></i>
                                            Contact</button></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="w3-col l3 m6 w3-margin-bottom">
                        <div class="w3-card" style="border-radius: 15px;">
                            <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
                            <div class="w3-container">
                                <h3>Johor Bahru</h3>
                                <p class="w3-opacity">creat by 2022 year </p>
                                <p>Address: 58 Jalann Perjiranan 15/2, Bandar Dato Onn, 81100, Johor Bahru, Johor.</p>
                                <p><a style="text-decoration: none;" aria-label="Chat on WhatsApp"
                                        href="https://wa.me/127120500"><button class="w3-button w3-block"
                                            style="background-color:white; border-radius: 15px;"><i
                                                class="fa fa-envelope"></i>
                                            Contact</button></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="w3-col l3 m6 w3-margin-bottom">
                        <div class="w3-card" style="border-radius: 15px;">
                            <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
                            <div class="w3-container price-white">
                                <h3>Sarawak</h3>
                                <p class="w3-opacity">creat by 2019 year </p>
                                <p>Address: 20D, Jln Mustafa, Kampung Pegawai, 93250 Kuching, Sarawak </p>
                                <p><a style="text-decoration: none;" aria-label="Chat on WhatsApp"
                                        href="https://wa.me/127120500"><button class="w3-button w3-block"
                                            style="background-color: #f1f1f1; border-radius: 15px;"><i
                                                class="fa fa-envelope"></i>
                                            Contact</button></a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Promo Section "Statistics" -->
            <div class="w3-container w3-row w3-center w3-dark-grey w3-padding-64">
                <div class="w3-quarter">
                    <span class="w3-xxlarge">4+</span>
                    <br>Branch
                </div>
                <div class="w3-quarter">
                    <span class="w3-xxlarge">50+</span>
                    <br>Proffesional Staff
                </div>
                <div class="w3-quarter">
                    <span class="w3-xxlarge">10+</span>
                    <br>Car Grooming Services
                </div>
                <div class="w3-quarter">
                    <span class="w3-xxlarge">1k+</span>
                    <br>Users
                </div>
            </div>

            <!-- Work Section -->
            <div class="w3-container" style="padding:128px 16px ;background-color: #f1f1f1!important;" id="work">
                <h3 class="w3-center">OUR WORK</h3>
                <p class="w3-center w3-large">What we've done for people</p>

                <div class="w3-row-padding" style="margin-top:64px">
                    <div class="w3-col l3 m6 ">
                        <img src="{{ asset('images/welcomePage/car-coating-icon.jpeg') }}"
                            style="width:100%; height:300px;" onclick="onClick(this)" class="w3-hover-opacity"
                            alt="">
                    </div>
                    <div class="w3-col l3 m6">
                        <img src="{{ asset('images/welcomePage/car-polish1.jpeg') }}" style="width:100%; height:300px;"
                            onclick="onClick(this)" class="w3-hover-opacity" alt="">
                    </div>
                    <div class="w3-col l3 m6">
                        <img src="{{ asset('images/welcomePage/car-wash-icon.jpeg') }}" style="width:100%; height:300px;"
                            onclick="onClick(this)" class="w3-hover-opacity" alt="">
                    </div>
                    <div class="w3-col l3 m6">
                        <img src="{{ asset('images/welcomePage/car-wax.jpeg') }}" style="width:100%; height:300px;"
                            onclick="onClick(this)" class="w3-hover-opacity" alt="">
                    </div>
                </div>

                <div class="w3-row-padding w3-section">
                    <div class="w3-col l3 m6">
                        <img src="{{ asset('images/welcomePage/car-wheel-polish.jpeg') }}"
                            style="width:100%; height:300px;" onclick="onClick(this)" class="w3-hover-opacity"
                            alt="">
                    </div>
                    <div class="w3-col l3 m6">
                        <img src="{{ asset('images/service/carwheelPolish.jpeg') }}" style="width:100%; height:300px;"
                            onclick="onClick(this)" class="w3-hover-opacity" alt="">
                    </div>
                    <div class="w3-col l3 m6">
                        <img src="{{ asset('images/welcomePage/enginebayWash.jpeg') }}" style="width:100%; height:300px;"
                            onclick="onClick(this)" class="w3-hover-opacity" alt="">
                    </div>
                    <div class="w3-col l3 m6">
                        <img src="{{ asset('images/welcomePage/premiumWash.jpeg') }}" style="width:100%; height:300px;"
                            onclick="onClick(this)" class="w3-hover-opacity" alt="">
                    </div>
                </div>
            </div>

            <!-- Modal for full size images on click-->
            <div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
                <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright"
                    title="Close Modal Image">×</span>
                <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
                    <img id="img01" class="w3-image">
                    <p id="caption" class="w3-opacity w3-large"></p>
                </div>
            </div>



            <!-- Pricing Section -->
            <div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="pricing">
                <h3>PRICING</h3>
                <p class="w3-large">Choose a pricing plan that fits your needs.</p>
                <div class="w3-row-padding" style="margin-top:64px">

                    <div class="w3-col l3 m6 w3-margin-bottom">
                        <div class="w3-card price-black"   style="width:100%; height:240px;">
                            <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
                            <div class="w3-container">
                                <h3>Normal Wash</h3>
                                <p>RM12</p>
                                <p>Car wash is a facility that is used to clean the exterior and sometimes the interior of a vehicle.</p>
                            </div>
                        </div>
                    </div>

                    <div class="w3-col l3 m6 w3-margin-bottom">
                        <div class="w3-card price-white"  style="width:100%; height:240px;">
                            <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
                            <div class="w3-container">
                                <h3>Polish</h3>
                                <p>RM99</p>
                                <p>Polishing a car is a process of using a polish or wax to improve the appearance and shine of the car's paintwork.</p>
                            </div>
                        </div>
                    </div>

                    <div class="w3-col l3 m6 w3-margin-bottom">
                        <div class="w3-card  price-black" style="width:100%; height:240px;">
                            <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
                            <div class="w3-container">
                                <h3>Car Coating</h3>
                                <p>RM809</p>
                                <p>Car coating is a process of applying a protective layer to the exterior of a car to protect the paint and improve the appearance of the vehicle.</p>
                            </div>
                        </div>
                    </div>

                    <div class="w3-col l3 m6 w3-margin-bottom">
                        <div class="w3-card  price-white"  style="width:100%; height:240px;">
                            <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
                            <div class="w3-container">
                                <h3>Premium Wash</h3>
                                <p>RM80</p>
                                <p>Premium washes may be offered at full-service car washes, detailing shops, or other facilities that specialize in car care services.</p>
                            </div>
                        </div>
                    </div>

                    <div class="w3-col l3 m6 w3-margin-bottom">
                        <div class="w3-card  price-white" style="width:100%; height:240px;">
                            <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
                            <div class="w3-container">
                                <h3>Wax</h3>
                                <p>RM99</p>
                                <p>Waxing a car is a process of applying a protective layer of wax to the exterior paintwork of a car to protect the paint and improve the appearance of the vehicle.</p>
                            </div>
                        </div>
                    </div>

                    <div class="w3-col l3 m6 w3-margin-bottom">
                        <div class="w3-card  price-black" style="width:100%; height:240px;">
                            <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
                            <div class="w3-container">
                                <h3>Premium Vacuum</h3>
                                <p>RM30</p>
                                <p>A premium vacuum service for a car is a type of car cleaning service that involves thoroughly vacuuming the interior of the car to remove dirt, debris, and other contaminants.</p>
                            </div>
                        </div>
                    </div>

                    <div class="w3-col l3 m6 w3-margin-bottom">
                        <div class="w3-card  price-white"  style="width:100%; height:240px;">
                            <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
                            <div class="w3-container">
                                <h3>Engine Bay Wash</h3>
                                <p>RM20</p>
                                <p>WAn engine bay wash is a type of car cleaning service that involves washing and cleaning the engine compartment of a car.</p>
                            </div>
                        </div>
                    </div>

                    <div class="w3-col l3 m6 w3-margin-bottom">
                        <div class="w3-card  price-black"  style="width:100%; height:240px;">
                            <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
                            <div class="w3-container">
                                <h3>Car Wheel Polish</h3>
                                <p>RM120</p>
                                <p>Car wheel polish is a product used to improve the appearance and shine of the wheels on a car. </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Contact Section -->
            <div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
                <h3 class="w3-center">CONTACT</h3>
                <p class="w3-center w3-large">Lets get in touch. Send us a message:</p>
                <div style="margin-top:48px">
                    <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> Johor, Malaysia</p>
                    <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone: +601 127120500</p>
                    <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: jj@gmail.com</p>
                    <br>
                    <form name="myForm" action="https://getform.io/f/7c97ab5f-af18-4676-8f19-0f5a432fea27" enctype="multipart/form-data" method="post">
                        <p><input style="border-radius:15px;" class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
                        </p>
                        <p><input style="border-radius:15px;"  class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
                        </p>
                        <p><input style="border-radius:15px;"  class="w3-input w3-border" type="text" placeholder="Subject" required
                                name="Subject"></p>
                        <p><input style="border-radius:15px;"  class="w3-input w3-border" type="text" placeholder="Message" required
                                name="Message"></p>
                        <p>
                            <button style="border-radius:15px;"class="w3-button w3-black" type="submit">
                                <i class="fa fa-paper-plane"></i> SEND MESSAGE
                            </button>
                        </p>
                    </form>
                    <!-- Image of location/map -->
                </div>
            </div>

            <!-- Footer -->
            <footer class="w3-center w3-black w3-padding-32">
                <a onclick="topFunction()" style="border-radius:15px;text-decoration: none;" class="w3-button w3-light-grey"><i
                        class="fa fa-arrow-up w3-margin-right"></i>To the top</a>

                <p>Design by<a href="http://localhost:8000/" title="W3.CSS" target="_blank" class="w3-hover-text-green">JJ</a></p>
            </footer>

            <script>
                // Modal Image Gallery
                function onClick(element) {
                    document.getElementById("img01").src = element.src;
                    document.getElementById("modal01").style.display = "block";
                    var captionText = document.getElementById("caption");
                    captionText.innerHTML = element.alt;
                }


                // Toggle between showing and hiding the sidebar when clicking the menu icon
                var mySidebar = document.getElementById("mySidebar");

                function w3_open() {
                    if (mySidebar.style.display === 'block') {
                        mySidebar.style.display = 'none';
                    } else {
                        mySidebar.style.display = 'block';
                    }
                }

                // Close the sidebar with the close button
                function w3_close() {
                    mySidebar.style.display = "none";
                }
            </script>

        </body>

        </html>
    @endsection
