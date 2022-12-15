<!DOCTYPE html>
@extends('layouts.app')
@section('content')

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
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
</style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<head>
<body>



<!-- Promo Section - "We know design" -->
<div class="w3-container w3-light-grey" style="padding:128px 16px">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3>Car Wash</h3>
      <p>Arrange for mobile car spa to pamper your vehicle instead of making a trip down to a petrol station or workshop. Skip the queue at the privacy of your own home. Hassle-free adhoc service right to your door step anytime, anywhere (:
.</p>
      <p><a href="#work" class="w3-button w3-black"><i class="fa fa-th"> </i> View Our Works</a></p>
    </div>
    <div class="w3-col m6">
      <img class="w3-image w3-round-large" src="{{asset('images/welcomePage/78510779.jpeg')}}" alt="Buildings" width="700" height="394">
    </div>
  </div>
</div>

<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">ABOUT THE COMPANY</h3>
  <p class="w3-center w3-large">Key features of our company</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="far fa-calendar-alt w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Speed</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="w3-quarter">
      <i class="fas fa-car-side w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Car Grooming</p>
      <p>All products & equipment used will be of top grade quality to ensure that your car is well taken care of.</p>
    </div>
    <div class="w3-quarter">
      <i class="far fa-smile-beam w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Service</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Support</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
  </div>
</div>



<!-- Team Section -->
<div class="w3-container" style="padding:128px 16px" id="team">
  <h3 class="w3-center">The Branch</h3>
  <p class="w3-center w3-large">The Branch Area</p>
  <div class="w3-row-padding w3-grayscale" style="margin-top:64px">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
       <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
        <div class="w3-container">
          <h3>Kuala Lumpur</h3>
          <p class="w3-opacity">create by 2021 year</p>
          <p>Address: Lot 4, Jalan Empat, Chan Sow Lin, 55200 Kuala Lumpur	</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
       <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
       <div class="w3-container">
          <h3>Selangor</h3>
          <p class="w3-opacity">creat by 2020 year	</p>
          <p>Address: 25g, Jalan Kenari 3, Bandar Puchong Jaya, 47100 Puchong, Selangor</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
       <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
       <div class="w3-container">
          <h3>Sarawak</h3>
          <p class="w3-opacity">creat by 2019 year	</p>
          <p>Address: 20D, Jln Mustafa, Kampung Pegawai, 93250 Kuching, Sarawak	</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
       <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
       <div class="w3-container">
          <h3>Penang</h3>
          <p class="w3-opacity">creat by 2020 year	</p>
          <p>Address: Jalan Air Itam, 11500 George Town, Pulau Pinang	</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
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
<div class="w3-container" style="padding:128px 16px" id="work">
  <h3 class="w3-center">OUR WORK</h3>
  <p class="w3-center w3-large">What we've done for people</p>

  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-col l3 m6">
      <img src="{{asset('images/welcomePage/car-coating-icon.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A microphone">
    </div>
    <div class="w3-col l3 m6">
      <img src="{{asset('images/welcomePage/car-polish1.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A phone">
    </div>
    <div class="w3-col l3 m6">
      <img src="{{asset('images/welcomePage/car-wash-icon.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A drone">
    </div>
    <div class="w3-col l3 m6">
      <img src="{{asset('images/welcomePage/car-wax.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Soundbox">
    </div>
  </div>

  <div class="w3-row-padding w3-section">
    <div class="w3-col l3 m6">
      <img src="{{asset('images/welcomePage/car-wheel-polish.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A tablet">
    </div>
    <div class="w3-col l3 m6">
      <img src="{{asset('images/welcomePage/carVacum.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A camera">
    </div>
    <div class="w3-col l3 m6">
      <img src="{{asset('images/welcomePage/enginebayWash.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A typewriter">
    </div>
    <div class="w3-col l3 m6">
      <img src="{{asset('images/welcomePage/premiumWash.jpeg')}}" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A tableturner">
    </div>
  </div>
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
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
      <div class="w3-card">
       <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
       <div class="w3-container">
          <h3>Normal Wash</h3>
          <p class="w3-opacity">RM12</p>
          <p>Normal wash only, including vacuum</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>

    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
       <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
       <div class="w3-container">
          <h3>Polish</h3>
          <p class="w3-opacity">RM99</p>
          <p>One layer RM99, plus one layer + RM99</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>

    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
       <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
       <div class="w3-container">
          <h3>Car Coating</h3>
          <p class="w3-opacity">RM809</p>
          <p>Car coating for protect your car (3layer)</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>

    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
       <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
       <div class="w3-container">
          <h3>Premium Wash</h3>
          <p class="w3-opacity">RM80</p>
          <p>Detail wash your car</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>

    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
       <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
       <div class="w3-container">
          <h3>Wax</h3>
          <p class="w3-opacity">RM99</p>
          <p>Wax is protect your car (1 layer)</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>

    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
       <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
       <div class="w3-container">
          <h3>Premium Vacuum</h3>
          <p class="w3-opacity">RM30</p>
          <p>Vacuum detail to your car</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>

    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
       <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
       <div class="w3-container">
          <h3>Engine Bay Wash</h3>
          <p class="w3-opacity">RM20</p>
          <p>Wash engine bay</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>

    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
       <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
       <div class="w3-container">
          <h3>Car Wheel Polish</h3>
          <p class="w3-opacity">RM120</p>
          <p>Polish car wheel   </p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
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
    <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> Chicago, US</p>
    <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone: +601 0123456789</p>
    <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: jj@gmail.com</p>
    <br>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Subject" required name="Subject"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Message" required name="Message"></p>
      <p>
        <button class="w3-button w3-black" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </p>
    </form>
    <!-- Image of location/map -->
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>Design by<a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">JJ</a></p>
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