<style type="text/css">
#header.header-transparent {
  background: transparent;
}

</style>
<?php
require_once("../config/database.php");
require_once("header.php");
?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="pb-5">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <video autoplay muted loop playsinline id="myVideo">
          <source src="https://cloudshare.regeneratedidentities.org/WWW/videofiles/walkwithweb01.mp4" type="video/mp4">
        </video>
        <div class="carousel-item active" style="">
          <div class="carousel-container">
            <div id="hText" class="container-fluid pt-3 pb-3">

              <div class="row justify-content-center">
                <div class="col-10 col-md-11 col-lg-11 text-left">
                  <p class="forMobile" style="margin-bottom:0px;">
                    We Develop, Support & Sustain<br><span style="color:#007BFF">Digital Social Sciences and Humanities Research</span>.
                  </p>
                  <p class="forLargeScreens" style="margin-bottom:0px;">
                    We Develop, Support & Sustain <span style="color:#007BFF">Digital Social Sciences and Humanities Research</span>.
                  </p>
                </div>
                <div class="col-2 col-md-1 col-lg-1">
                  <a href="#offer" class="btn-get-started scrollto text-uppercase" title="scroll down" style="margin-bottom:10vh"><i class="fa fa-arrow-down fa-2x"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

      <!-- Slide 2 -->
          <!--<div class="carousel-item" style="background-image: url(../assets/img/project/LM.png)">
          <div class="carousel-container">
           <div class="container-fluid">
              <p class="mt-5">Developing, supporting and sustaining digital Social Sciences and Humanities research.</p>
              <a href="#offer" class="btn-get-started scrollto pb-5">explore <i class="fas fa-chevron-right"></i></a><br><br>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <!--  <!--  <div class="carousel-item" style="background-image: url(../assets/img/project/FN.png)">
          <div class="carousel-container">
            <div class="container-fluid">
              <p class="mt-5">Developing, supporting and sustaining digital Social Sciences and Humanities research.</p>
              <a href="#offer" class="btn-get-started scrollto pb-5">explore <i class="fas fa-chevron-right"></i></a><br><br>
            </div>
          </div>
        </div>


       <!-- Slide 4 -->
        <!--  <div class="carousel-item" style="background-image: url(../assets/img/project/LM.png)">
          <div class="carousel-container">
            <div class="container-fluid">
              <p class="mt-5">Developing, supporting and sustaining digital Social Sciences and Humanities research.</p>
              <a href="#offer" class="btn-get-started scrollto pb-5">explore <i class="fas fa-chevron-right"></i></a><br><br>
            </div>
          </div>
        </div>-->
      </div>
   </div>
  </section><!-- End Hero -->

<section id="offer" class="offer mt-5">
  <div class="container pb-5" data-aos="fade-up">
    <?php $i=0; $offer_title_arr = array(); $offer_text_arr = array();
     $offer_q="SELECT * from `offer` order by listorder";
     $offer_query = $conn->query($offer_q);
     while ($offer = $offer_query->fetch(PDO::FETCH_ASSOC)){
       $offer_title_arr[$i+1] = $offer['Title'];
       $offer_text_arr[$i+1] = $offer['Main_Text'];
       $i++;
    }?>
    <div id="scroller">
      <div class="row" data-aos="fade-up">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
          <header class="section-header">
            <h3 class="section-title pb-5">Walk With Us</h3>
          </header>
        </div>
        <div class="col-lg-4">
          <svg class="forMobile" id="l1_svg" xmlns="http://www.w3.org/2000/svg" width="102" height="200">
            <path class="svg_lines" id="l1_path" d="M 0,50 L 80,50 L 80,250"/>
            <path class="svg_lines_blue" id="l1_path_b" d="m 0,46 L 83,46 L 83,250"/>
          </svg>
        </div>
      </div>
      <!-- Offer:1 -->
      <div class="row oRow" data-aos="fade-up">
        <div class="col-6 text-right oRight" >
          <svg class="forMobile" id="l2_svg" xmlns="http://www.w3.org/2000/svg" width="302" height="400">
            <path class="svg_lines" id="l2_path" d="M 302,100 L 22,100 L 22,400"/>
            <path class="svg_lines_blue" id="l2_path_b" d="m 302,96 L 19,96 L 19,400"/>
          </svg>
        </div>
        <div class="col-lg-6 oLeft">
          <div class="forSmallScreens" style="background-color:black;padding:15px;border:solid 2px white;" min-width="200">
            <h6 style="position:static !important;"><?php echo htmlspecialchars_decode($offer_title_arr[1]); ?></h6>
            <p style="position:static !important;"><?php echo htmlspecialchars_decode($offer_text_arr[1]); ?></p>
          </div>
        </div>
      </div>
      <!-- Offer:2 -->
      <div class="row oRow" data-aos="fade-up">
        <div class="col-lg-6 oRight">
          <div class="forSmallScreens" style="background-color:black;padding:15px;border:solid 2px white;" min-width="200">
            <h6 style="position:static !important;"><?php echo htmlspecialchars_decode($offer_title_arr[2]); ?></h6>
            <p style="position:static !important;"><?php echo htmlspecialchars_decode($offer_text_arr[2]); ?></p>
          </div>
        </div>
        <div class="col-lg-6 text-left oLeft">
          <svg class="forMobile" id="l3_svg" xmlns="http://www.w3.org/2000/svg" width="302" height="400">
            <path class="svg_lines" id="l3_path" d="M 0,100 L 280,100 L 280,400"/>
            <path class="svg_lines_blue" id="l3_path_b" d="M 0,96 L 283,96 L 283,400"/>
          </svg>
        </div>
      </div>
      <!-- Offer:3 -->
      <div class="row oRow" data-aos="fade-up">
        <div class="col-lg-6 text-left oRight">
          <img class="forMobile" src="../assets/img/WalkingMan.png" alt="Walking Stick Man" style="margin-top: -185px; margin-left: 45px; position: absolute;"/>
        </div>
        <div class="col-lg-6 oLeft">
          <div class="forSmallScreens" style="background-color:black;padding:15px;border:solid 2px white;" min-width="200">
            <h6 style="position:static !important;"><?php echo htmlspecialchars_decode($offer_title_arr[3]); ?></h6>
            <p style="position:static !important;"><?php  echo htmlspecialchars_decode($offer_text_arr[3]);  ?></p>
          </div>
        </div>
      </div>
      <!-- Offer:4 -->
      <div class="row oRow" data-aos="fade-up">
        <div class="col-lg-6 text-left oRight">
          <div class="forMobile" style="margin-top:200px !important;"></div>
          <div class="forSmallScreens" style="background-color:black;padding:15px;border:solid 2px white;" min-width="200">
            <h6 style="position:static !important;"><?php echo htmlspecialchars_decode($offer_title_arr[4]); ?></h6>
            <p style="position:static !important;"><?php echo htmlspecialchars_decode($offer_text_arr[4]); ?></p>
          </div>
        </div>
        <div class="col-lg-6 oLeft">
          <svg class="forMobile" id="l4_svg" xmlns="http://www.w3.org/2000/svg" width="300" height="305">
            <path class="svg_lines" id="l4_path" d="M 280,0 L 280,300 L 0,300"/>
            <path class="svg_lines_blue" id="l4_path_b" d="M 283,0 L 283,304 L 0,304"/>
          </svg>
        </div>
      </div>
      <!-- Offer:5 -->
      <div class="row oRow" data-aos="fade-up">
        <div class="col-lg-6 text-right oRight">
          <svg class="forMobile" id="l5_svg" xmlns="http://www.w3.org/2000/svg" width="282" height="305">
            <path class="svg_lines" id="l5_path" d="M 5,0 L 5,300 L 282,300"/>
            <path class="svg_lines_blue" id="l5_path_b" d="M 2,0 L 2,304 L 282,304"/>
          </svg>
        </div>
        <div class="col-lg-6 text-left oLeft">
          <div class="forMobile" style="margin-top:200px !important;"></div>
          <div class="forSmallScreens" style="background-color:black;padding:15px;border:solid 2px white;" min-width="200">
            <h6 style="position:static !important;"><?php echo htmlspecialchars_decode($offer_title_arr[5]); ?></h6>
            <p style="position:static !important;"><?php echo htmlspecialchars_decode($offer_text_arr[5]); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <section id="index" class="index mt-5 pb-5">
    <div class="container" data-aos="fade-up">
      <header class="section-header">
        <h3 class="section-title">Featured Projects</h3>
      </header>
    </div>
    <?php
    $project_q="SELECT * from `projects` where featured ='1' order by listorder";
    $project_query = $conn->query($project_q);
    $i=1; ?>

    <div class="container p-5" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-lg-12 col-md-9">
          <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php while ($projects = $project_query->fetch(PDO::FETCH_ASSOC)){ ?>
                <div class="carousel-item <?php if($i==1){ echo "active";} ?>" >
                  <img src="<?php echo $projects['Img'];?>" class="d-block w-100 img-fluid" alt="WWW Project - <?php echo $projects['Title'];?>"  >

                  <div class="carousel-caption  d-md-block">
                    <h4 class=""><?php echo $projects['Title'];?></h4>
                  </div>
                </div>
              <?php $i++; }?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev" title="Previous button">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next" title="Next button">
              <span class="carousel-control-next-icon"></span>
             </a>
          </div>
        </div>
      </div>

      <div class="row mt-5">
         <div class="col-lg-12 col-md-12 col-sm-12 text-center mt-5">
           <a href="../Project/project.php" class="btn-get-started btn-primary animated fadeInUp scrollto">Walk With Us To Our Projects<img alt="Walking Stick Man" src="../assets/img/man1.png"  style="width:2.2rem;" class="pl-1"/></a>
         </div>
      </div>

    </div>
</section>    <!-- Modal -->



<section id="index1" class="index1">
  <div class="container pb-5" data-aos="fade-up">
    <header class="section-header">
      <h3 class="section-title">Our Activities</h3>
    </header>
    <div class="row  d-flex align-items-center justify-content-center">
      <div class="col-lg-7 col-md-12 col-sm-12 p-5 mt-5 text-center pb-5 borderline">
        <div class="card border">
          <div class="card-body">
            <img style="width:100%; max-width:200px;" alt="Walk With Web Inc." src="../assets/img/logo_link.png"/>
            <!--<p class="card-text mt-4 p-3">Coming Soon!</p>-->
            <p class="card-text mt-4 pb-2">Learn about our Knowledge Moblization Activities!
            </p>
            <p style="font-size: 16px;">
              As an academics-oriented organization we strive to organize events to support networking
              and knowledge sharing.   <br><a href="https://walkwithweb.org/Events/eventslisting.php">View our events</a> <br>&<br> Subscribe to your email list for occational updates...</p>
            <h5 class="text-right text-bottom"><a   href="https://api.clixlo.com/widget/form/kGCvwv1qokafpQHHRFld" class="about-btn btn-primary d-flex align-items-center justify-content-center" target="_blank">Subscribe now!</i></a></h5>
          </div>
        </div>
      </div>
      <?php
      $patners_q="SELECT * from `partners`";
      $patners_query = $conn->query($patners_q); ?>
      <div class="col-lg-5 col-md-12 col-sm-12 p-5 mt-2 text-center pb-5">
        <h4 class="pb-3">OUR PARTNERS</h4>

        <div id="slideshow" style="position:relative; width:100%; max-width: 300px; height:220px; display: flex; margin: auto;text-align: center;">
          <?php $id=1;
          while ($partners = $patners_query->fetch(PDO::FETCH_ASSOC)){ ?>
            <div>
              <a href="<?php echo $partners['link'];?>" target="_blank"><img id="img<?php echo $id;?>" style="position:absolute;margin: auto;text-align: center;vertical-align: middle; width:100%; max-width: 300px;" class="img-fluid" alt="<?php echo $partners['Name']; ?>" src="../assets/img/partners/<?php echo $partners['logos'];?>"></a></div>
         <?php $id++;}?>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<!--<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-full">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><a href="../Public/index.php" class="logo"><img src="../assets/img/logo-white.png" alt="" style="width:12rem !important;height:auto;"class="img-fluid"></a>
      </h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <h1 class="pt-5">Welcome to our brand new online home! </br></br>
        We are currently editing and testing the upgraded version of our website. Feel free to <span style="color:#007BFF;"> WALK </span> through it by clicking the button below.</h1>
        <h6 class="pt-5">Please email us any corrections or suggestions at <span style="color:#007BFF;">support@regid.ca</span></h6>
      </div>

    </div>
  </div>
</div>-->


<script type="text/javascript">
$(window).on("load",function() {
        $("#slideshow > div:gt(0)").hide();

        setInterval(function () {
            $('#slideshow > div:first')
              .fadeOut(500)
              .next()
              .fadeIn(500)
              .end()
              .appendTo('#slideshow');
        }, 4000);
    });

</script>
<!-- SVG Animation JS -->
<script src="https://cdn.jsdelivr.net/npm/vivus@latest/dist/vivus.min.js"></script>
<script src="../assets/js/svg.js"></script>
<?php require_once("footer.php");?>
