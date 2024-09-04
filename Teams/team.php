<?php
require_once("../config/database.php");
require_once("../Public/header.php");
?>
<section id="team-sec" class="section-bg">
  <div class="container">

    <div class="row justify-content-center" style="position:relative; z-index:2;">
      <div class="col-12" style="position:fixed;background-color:black;padding-top:80px;">
        <header class="section-header">
          <h3>Core Team</h3>
        </header>
      </div>
    </div>
    <div class="forMobile"><!--hide on mobile phones-->
      <div class="row justify-content-center pt-1 statsPolicies">
        <div class="col-lg-3 col-md-4 col-sm-12 borderline">
          <div style="width:100%; height:50vh; overflow-y:scroll; position:fixed; overflow-y:auto;">
            <div class="sidebar">
              <a href="#ceo">
                <h5 class="mt-4">President | CEO</h5>
              </a>
              <a href="#secretary">
                <h5 class="mt-4">Administration</h5>
              </a>
              <a href="#developer">
                <h5 class="mt-4">Digital Development Division</h5>
              </a>
              <a href="#outreach">
                <h5 class="mt-4">Outreach & Communications</h5>
              </a>
              <a href="#RA-Hist">
                <h5 class="mt-4">Research Support Team</h5>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-12 member-block" data-aos="fade-up" data-aos-delay="100">
          <div id="ceo">
            <center>
              <h4 class="text-center text-uppercase col-lg-7 col-md-12 col-sm-12 mx-auto mt-3 mb-5 border-bottom p-3">
                President &<br> Chief Executive Officer</h4>
            </center>
            <div class="row text-center justify-content-center text-align-center" data-aos="fade-up"
              data-aos-delay="100">
              <?php
              $team_q = "SELECT * from `team` where `Role` LIKE '%CEO%'  ORDER BY `list_order`";
              $team_query = $conn->query($team_q);
              while ($team = $team_query->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="col-lg-4 col-md-6 col-sm-12  member-block pt-1" data-aos="fade-up" data-aos-delay="100">
                  <a href="team_details.php?TeamID=<?php echo $team['ID']; ?>">
                    <div class="portfolio-wrap">
                      <figure>
                        <img class="team-image mt-1" alt="WWW CEO - <?php echo $team['Name']; ?>"
                          src="<?php echo $team['Img']; ?>">
                      </figure>
                    </div>
                  </a>
                  <h3 class="up-effect pt-3 text-uppercase" style="color: #0ACFF3;">
                    <?php echo $team['Name']; ?>
                  </h3>
                </div>

              <?php } ?>
            </div>
          </div>



          <div id="secretary">
            <center>
              <h4
                class="text-center text-uppercase pt-3 col-lg-7 col-md-6 col-sm-12 mx-auto mt-3 mb-5 border-bottom p-3">
                Administration</h4>
            </center>
            <div class="row text-center justify-content-center text-align-center" data-aos="fade-up"
              data-aos-delay="100">
              <?php
              $team_q = "SELECT * from `team` where `Role` LIKE 'secretary' ORDER BY `list_order`";
              $team_query = $conn->query($team_q);
              while ($team = $team_query->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="col-lg-4 col-md-6 col-sm-12  member-block pt-1" data-aos="fade-up" data-aos-delay="100">
                  <?php if ($team['Display'] > 0) { ?><a href="team_details.php?TeamID=<?php echo $team['ID']; ?>">
                    <?php } ?>
                    <div class="portfolio-wrap">
                      <figure>
                        <img class="team-image mt-1" alt="WWW Secretaries - <?php echo $team['Name']; ?>"
                          src="<?php echo $team['Img']; ?>">
                      </figure>
                    </div>
                    <?php if ($team['Display'] > 0) { ?>
                    </a>
                  <?php } ?>
                  <h3 class="up-effect pt-3 text-uppercase" style="color: #0ACFF3;">
                    <?php echo $team['Name']; ?><br>
                    <span style="color:white; font-size:16px;">
                      <?php echo $team['position']; ?>
                    </span>
                  </h3>
                </div>


              <?php } ?>
            </div>
          </div>

          <div id="developer">
            <center>
              <h4
                class="text-center text-uppercase pt-3 col-lg-7 col-md-6 col-sm-12 mx-auto mt-3 mb-5 border-bottom p-3">
                Digital Development Division</h4>
            </center>
            <div class="row text-center justify-content-center text-align-center" data-aos="fade-up"
              data-aos-delay="100">
              <?php
              $team_q = "SELECT * from `team` where `Role` LIKE '%developer%' OR `Role` LIKE '%designer%' ORDER BY `list_order`";
              $team_query = $conn->query($team_q);
              while ($team = $team_query->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="col-lg-4 col-md-6 col-sm-8 text-center member-block pt-2" data-aos="fade-up"
                  data-aos-delay="100">
                  <?php if ($team['Display'] > 0) { ?><a href="team_details.php?TeamID=<?php echo $team['ID']; ?>">
                    <?php } ?>
                    <div class="portfolio-wrap">
                      <figure>
                        <img class="team-image mt-1" alt="WWW Technical Development Team - <?php echo $team['Name']; ?>"
                          src="<?php echo $team['Img']; ?>">
                      </figure>
                    </div>
                    <?php if ($team['Display'] > 0) { ?>
                    </a>
                  <?php } ?>
                  <h3 class="up-effect pt-3 text-uppercase" style="color: #0ACFF3;">
                    <?php echo $team['Name']; ?><br>
                    <span style="color:white; font-size:16px;">
                      <?php echo $team['position']; ?>
                    </span>
                  </h3>
                </div>

              <?php } ?>
            </div>
          </div>

          <div id="outreach">
            <center>
              <h4
                class="text-center text-uppercase pt-3 col-lg-7 col-md-6 col-sm-12 mx-auto mt-3 mb-5 border-bottom p-3">
                Outreach & Communications</h4>
            </center>
            <div class="row text-center justify-content-center text-align-center" data-aos="fade-up"
              data-aos-delay="100">
              <?php
              $team_q = "SELECT * from `team` where  `Role` LIKE '%Outreach%'  ORDER BY `list_order`";
              $team_query = $conn->query($team_q);
              while ($team = $team_query->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="col-lg-4 col-md-6 col-sm-8 text-center member-block pt-2" data-aos="fade-up"
                  data-aos-delay="100">
                  <?php if ($team['Display'] > 0) { ?><a href="team_details.php?TeamID=<?php echo $team['ID']; ?>">
                    <?php } ?>
                    <div class="portfolio-wrap">
                      <figure>
                        <img class="team-image mt-1" alt="WWW Outreach Team - <?php echo $team['Name']; ?>"
                          src="<?php echo $team['Img']; ?>">
                      </figure>
                    </div>
                    <?php if ($team['Display'] > 0) { ?>
                    </a>
                  <?php } ?>
                  <h3 class="up-effect pt-3 text-uppercase" style="color: #0ACFF3;">
                    <?php echo $team['Name']; ?><br>
                    <span style="color:white; font-size:16px;">
                      <?php echo $team['position']; ?>
                    </span>
                  </h3>
                </div>

              <?php } ?>
            </div>
          </div>

          <div id="RA-Hist">
            <center>
              <h4
                class="text-center text-uppercase pt-3 col-lg-7 col-md-6 col-sm-12 mx-auto mt-3 mb-5 border-bottom p-3">
                Research Support Team</h4>
            </center>
            <div class="row text-center justify-content-center text-align-center" data-aos="fade-up"
              data-aos-delay="100">
              <?php
              $team_q = "SELECT * from `team` where `Role` LIKE 'RA-Team' ORDER BY `list_order`";
              $team_query = $conn->query($team_q);
              while ($team = $team_query->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="col-lg-4 col-md-6 col-sm-12  member-block pt-1" data-aos="fade-up" data-aos-delay="100">
                  <?php if ($team['Display'] > 0) { ?><a href="team_details.php?TeamID=<?php echo $team['ID']; ?>">
                    <?php } ?>
                    <div class="portfolio-wrap">
                      <figure>
                        <img class="team-image mt-1" alt="WWW Director -  <?php echo $team['Name']; ?>"
                          src="<?php echo $team['Img']; ?>">
                      </figure>
                    </div>
                    <?php if ($team['Display'] > 0) { ?>
                    </a>
                  <?php } ?>
                  <h3 class="up-effect pt-3 text-uppercase" style="color: #0ACFF3;">
                    <?php echo $team['Name']; ?><br>
                    <span style="color:white; font-size:16px;">
                      <?php echo $team['position']; ?>
                    </span>
                  </h3>
                </div>


              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div> <!--end of forMobile-->

    <div class="forLargeScreens"><!--hide on desktops-->
      <div class="row statsPolicies">
        <div class="col-12 text-center">
          <div class="sidebar">
            <a href="#ceoteam">
              <h5>President | CEO</h5>
            </a>
            <a href="#secretaryteam">
              <h5 class="mt-4">Administration</h5>
            </a>
            <a href="#developerteam">
              <h5 class="mt-4">Digital Developement Division</h5>
            </a>
            <a href="#outreachteam">
              <h5 class="mt-4">Outreach & Communications</h5>
            </a>
            <a href="#researchSupportTeam">
              <h5 class="mt-4">Research Support Team</h5>
            </a>
          </div>
        </div>
        <div class="col-12 pt-2 member-block" data-aos="fade-up" data-aos-delay="100">
          <div id="ceoteam">
            <center>
              <h4 class="text-center text-uppercase col-lg-7 col-md-12 col-sm-12 mx-auto mt-3 mb-5 border-bottom p-3">
                President &<br> Chief Executive Officer</h4>
            </center>
            <div class="row text-center justify-content-center text-align-center" data-aos="fade-up"
              data-aos-delay="100">
              <?php
              $team_q = "SELECT * from `team` where  `Role` LIKE '%CEO%'  ORDER BY `ID`";
              $team_query = $conn->query($team_q);
              while ($team = $team_query->fetch(PDO::FETCH_ASSOC)) { ?>
                <?php if ($team['Role'] == 'President | CEO'): ?>
                  <div class="col-lg-4 col-md-6 col-sm-12  member-block pt-1" data-aos="fade-up" data-aos-delay="100">
                    <a href="team_details.php?TeamID=<?php echo $team['ID']; ?>">
                      <div class="portfolio-wrap">
                        <figure>
                          <img class="team-image mt-1" alt="WWW CEO and President - <?php echo $team['Name']; ?>"
                            src="<?php echo $team['Img']; ?>">
                        </figure>
                      </div>
                    </a>
                    <h3 class="up-effect pt-3 text-uppercase" style="color: #0ACFF3;">
                      <?php echo $team['Name']; ?>
                    </h3>
                  </div>
                <?php endif; ?>
              <?php } ?>
            </div>
          </div>

      

          <div id="secretaryteam">
            <center>
              <h4
                class="text-center text-uppercase pt-3 col-lg-7 col-md-6 col-sm-12 mx-auto mt-3 mb-5 border-bottom p-3">
                Administration</h4>
            </center>
            <div class="row text-center justify-content-center text-align-center" data-aos="fade-up"
              data-aos-delay="100">
              <?php
              $team_q = "SELECT * from `team` where `Role` LIKE 'secretary' ORDER BY `list_order`";
              $team_query = $conn->query($team_q);
              while ($team = $team_query->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="col-lg-4 col-md-6 col-sm-12  member-block pt-1" data-aos="fade-up" data-aos-delay="100">
                  <?php if ($team['Display'] > 0) { ?><a href="team_details.php?TeamID=<?php echo $team['ID']; ?>">
                    <?php } ?>
                    <div class="portfolio-wrap">
                      <figure>
                        <img class="team-image mt-1" alt="WWW Secretary - <?php echo $team['Name']; ?>"
                          src="<?php echo $team['Img']; ?>">
                      </figure>
                    </div>
                    <?php if ($team['Display'] > 0) { ?>
                    </a>
                  <?php } ?>
                  <h3 class="up-effect pt-3 text-uppercase" style="color: #0ACFF3;">
                    <?php echo $team['Name']; ?><br>
                    <span style="color:white; font-size:16px;">
                      <?php echo $team['position']; ?>
                    </span>
                  </h3>
                </div>


              <?php } ?>
            </div>
          </div>

          <div id="developerteam">
            <center>
              <h4
                class="text-center text-uppercase pt-3 col-lg-7 col-md-6 col-sm-12 mx-auto mt-3 mb-5 border-bottom p-3">
                Digital Developement Division</h4>
            </center>
            <div class="row text-center justify-content-center text-align-center" data-aos="fade-up"
              data-aos-delay="100">
              <?php
              $team_q = "SELECT * from `team` where  `Role` LIKE '%developer%' OR `Role` LIKE '%designer%' ORDER BY `list_order`";
              $team_query = $conn->query($team_q);
              while ($team = $team_query->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="col-lg-4 col-md-6 col-sm-12 text-center member-block pt-2" data-aos="fade-up"
                  data-aos-delay="100">
                  <?php if (!empty(trim($team['Bio']))) { ?><a href="team_details.php?TeamID=<?php echo $team['ID']; ?>">
                    <?php } ?>
                    <div class="portfolio-wrap">
                      <figure>
                        <img class="team-image mt-1"
                          alt="WWW Technical Design / Development - <?php echo $team['Name']; ?>"
                          src="<?php echo $team['Img']; ?>">
                      </figure>
                    </div>
                  </a>
                  <h3 class="up-effect pt-3 text-uppercase" style="color: #0ACFF3;">
                    <?php echo $team['Name']; ?><br>
                    <span style="color:white; font-size:16px;">
                      <?php echo $team['position']; ?>
                    </span>
                  </h3>
                </div>

              <?php } ?>
            </div>
          </div>

          <div id="outreachteam">
            <center>
              <h4
                class="text-center text-uppercase pt-3 col-lg-7 col-md-6 col-sm-12 mx-auto mt-3 mb-5 border-bottom p-3">
                OUTREACH</h4>
            </center>
            <div class="row text-center justify-content-center text-align-center" data-aos="fade-up"
              data-aos-delay="100">
              <?php
              $team_q = "SELECT * from `team` where  `Role` LIKE '%outreach%'  ORDER BY `list_order`";
              $team_query = $conn->query($team_q);
              while ($team = $team_query->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="col-lg-4 col-md-6 col-sm-12 text-center member-block pt-2" data-aos="fade-up"
                  data-aos-delay="100">
                  <?php if (!empty(trim($team['Bio']))) { ?><a href="team_details.php?TeamID=<?php echo $team['ID']; ?>">
                    <?php } ?>
                    <div class="portfolio-wrap">
                      <figure>
                        <img class="team-image mt-1" alt="WWW Outreach Team - <?php echo $team['Name']; ?>"
                          src="<?php echo $team['Img']; ?>">
                      </figure>
                    </div>
                  </a>
                  <h3 class="up-effect pt-3 text-uppercase" style="color: #0ACFF3;">
                    <?php echo $team['Name']; ?><br>
                    <span style="color:white; font-size:16px;">
                      <?php echo $team['position']; ?>
                    </span>
                  </h3>
                </div>

              <?php } ?>
            </div>
          </div>

          <div id="researchSupportTeam">
            <center>
              <h4
                class="text-center text-uppercase pt-3 col-lg-7 col-md-6 col-sm-12 mx-auto mt-3 mb-5 border-bottom p-3">
                RESEARCH SUPPORT TEAM</h4>
            </center>
            <div class="row text-center justify-content-center text-align-center" data-aos="fade-up"
              data-aos-delay="100">
              <?php
              $team_q = "SELECT * from `team` where  `Role` LIKE '%RA-Team%'  ORDER BY `list_order`";
              $team_query = $conn->query($team_q);
              while ($team = $team_query->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="col-lg-4 col-md-6 col-sm-12 text-center member-block pt-2" data-aos="fade-up"
                  data-aos-delay="100">
                  <?php if (!empty(trim($team['Bio']))) { ?><a href="team_details.php?TeamID=<?php echo $team['ID']; ?>">
                    <?php } ?>
                    <div class="portfolio-wrap">
                      <figure>
                        <img class="team-image mt-1" alt="WWW Research Support Team - <?php echo $team['Name']; ?>"
                          src="<?php echo $team['Img']; ?>">
                      </figure>
                    </div>
                  </a>
                  <h3 class="up-effect pt-3 text-uppercase" style="color: #0ACFF3;">
                    <?php echo $team['Name']; ?><br>
                    <span style="color:white; font-size:16px;">
                      <?php echo $team['position']; ?>
                    </span>
                  </h3>
                </div>

              <?php } ?>
            </div>
          </div>

        </div>
      </div>
    </div> <!--end of forLargeScreens-->



  </div>
</section>

<script type="text/javascript">
  $(document).on('click', 'a[href^="#"]', function (e) {
    // target element id
    var id = $(this).attr('href');

    // target element
    var $id = $(id);
    if ($id.length === 0) {
      return;
    }

    // prevent standard hash navigation (avoid blinking in IE)
    e.preventDefault();

    // top position relative to the document
    var pos = $id.offset().top - 250;

    // animated top scrolling
    $('body, html').animate({ scrollTop: pos });
  });
</script>

<?php
require_once("../Public/footer.php");
?>
