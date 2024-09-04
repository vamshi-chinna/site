<?php
require_once("database.php");
require_once("../Public/header.php");
?>

<section id="about" class="about"><!--Using the #about class to keep css...originally -->
  <div class="container" data-aos="fade-up">
    <header class="section-header">
      <h3>Regenerated Identities</h3>
    </header>
    <div class="row mt-5">
      <div class="col-lg-12 p-4">
        <p>
          <b>WWW</b> provides digital content management services, called Regenerated Identities
          (RegID), to support the development, deployment, and long-term maintenance
          of digital humanities research with special focus on Africa and the African diaspora.<br><br>

          RegID, a new concept of gateway services, is a mid-way path between
          developing a single software and using a pipeline of multiple software to
          incorporate a wider range of research methodological requirements. <br><br>

          Through streamlined, online, user-friendly interfaces, RegID is a
          technical structure that combines a variety of components (usually software
          and virtual services) to support a community-specific requirement in
          data collection and analyses. <br><br>

          RegID is currently supporting over 15 major digital humanities projects in
          the field of African Studies. These projects were selected because
          they share a similar theme enabling
          an exploration of the lives of people of African descent, many of whom were
          enslaved and forcibly transported elsewhere in the world.<br><br>

          RegID includes a custom graphical user interface that fulfills
          specific needs of various research projects, thus enabling development
          of robust databases that lead to the creation and semi-automated self-publication
          of research outcomes on the world wide web. We strive to include as many projects as
          possible and are always looking for ways in which to overlap
          linkable data through computational methodologies.
        </p>
      </div>
      <div class="col-lg-12 p-4">
        <p>Regenerated Identities service includes the following features:</p>
        <div class="row p-4 d-flex  justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">
            <?php
            $service_q="SELECT * from `services` where `page` = 2";
            $service_query = $conn->query($service_q);
            $i=2;
            while ($service = $service_query->fetch(PDO::FETCH_ASSOC)){ ?>
              <div class="row p-3 d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-4 col-md-4 col-sm-12  mx-auto d-flex flex-column justify-content-center align-items-center text-center">
                  <img alt="Services WWW Offers - <?php echo $service['Title'];?>" src="../assets/img/icons/<?php echo $service['Img'];?>"><h2><?php echo $service['Title'];?></h2>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 align-items-center justify-content-center">
                  <h4><?php echo $service['SubTitle'];?></h4>
                  <h6><?php echo $service['Content'];?></h6>
               </div>
              </div>
            <?php }?>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="reidentities" class="reidentities">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-12 text-center p-5" data-aos="fade-up" data-aos-delay="100">
        <h6>Some of the researchers we are currently working with are based at:</h6>
        <h6>York University</h6>
        <h6>OCAD University</h6>
        <h6>Trent University</h6>
        <h6>University of Essex</h6>
        <h6>University of Ottawa</h6>
        <h6>University of Colorado Boulder</h6>
        <h6>Kings College London</h6>
        <h6>Royal Military College of Canada</h6>
      </div>
    </div>
  </div>
</section>

<?php require_once("../Public/footer.php");?>
