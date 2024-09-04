<?php
require_once("database.php");
require_once("../Public/header.php");
?>
 <section id="about" class="about">
  <div class="container" data-aos="fade-up">
    <header class="section-header">
      <h3>Walk with Web</h3>
    </header>
    <div class="row mt-5">
      <div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
        <p>
          Walk With Web Inc. (WWW) is a federally operated Canadian corporation
          founded in July 2020. Our mission is to address the challenges surrounding the technical
          development, expansion and preservation of Social Sciences and Humanities
          research.
        </p>
        <p>
          We are an independent technical network that works in tandem with
          research groups, scholars and graduate students based at universities
          or educational organizations within Canada and abroad. We are a service
          that provides customized technical support for research and development.
          We are largely supported by federal granting agencies and academic
          institutions in Canada, the United States, and Western Europe.
        </p>
        <p>
        We create and maintain digital data, archives and digital platforms
        for research groups and develop innovative tools to visualize this
        information in an accessible and sustainable way for researchers,
        students, and the public. Our community shares resources openly so
        that others may use them freely.
        </p>
        <p>
          We are a real-time example of a partnership between industry
          professionals and academics. WWW is a solution to the longstanding
          problem of sustainability for research output. This service provides
          secured and shared digital spaces for past, present, and future
          research projects.
        </p>

      </div>
    </div>
    <div class="row mx-auto align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <h2 class="pt-5" style="margin-bottom: 0px;">
        <center> WALK THROUGH THESE SECTIONS TO LEARN MORE ABOUT US AND OUR SERVICES!</center>
      </h2>
        <?php
        $service_q="SELECT * from `services` where `page` = 1";
        $service_query = $conn->query($service_q);
        $i=2;
        while ($service = $service_query->fetch(PDO::FETCH_ASSOC)){ ?>

            <div class="col-lg-3 col-md-3 col-sm-12 p-4 mx-auto align-items-center justify-content-center">
              <center>
                <a href="<?php echo $service['Content'];?>">
                <img class="img img-responsive" alt="Services that WWW Offers - <?php echo $service['Title'];?>" style="max-height: 100%;" src="../assets/img/icons/<?php echo $service['Img'];?>">
              <br><br>
              <h5><?php echo $service['Title'];?></h5>
              </a>
            </center>
            </div>

        <?php }?>

    </div>
  </div>
</section><!-- End About Us Section -->

<?php require_once("../Public/footer.php");?>
