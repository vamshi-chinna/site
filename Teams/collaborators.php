<?php
require_once("../config/database.php");
require_once("../Public/header.php");
?>
 <section class="team-sec" id="team-sec">
    <div class="container" data-aos="fade-up" style="margin-top:80px;">
      <header class="section-header">
        <h3>Collaborators</h3>
      </header>

       <div class="row justify-content-center box mt-5" data-aos="fade-up">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="row justify-content-center">
              <?php
              $team_q="SELECT * from `team` where `Role` LIKE '%Collaborator%' ORDER BY substring_index(TRIM(`Name`), ' ', -1)";
              $team_query = $conn->query($team_q);
              while ($team= $team_query->fetch(PDO::FETCH_ASSOC)){ ?>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center member-block pt-1" data-aos="fade-up" data-aos-delay="100">
                   <?php if ($team['Display']>0) { ?><a href="team_details.php?TeamID=<?php echo $team['ID']; ?>"><?php }?>
                    <div class="portfolio-wrap">
                      <figure>
                        <img class="team-image mt-1" alt="<?php echo $team['Name'];?>" src="<?php echo $team['Img'];?>">
                      </figure>
                    </div>
                      <?php if ($team['Display']>0) { ?></a><?php }?>
                    <h3 class="up-effect pt-3 text-uppercase" style="color: #0ACFF3;">
                      <?php echo $team['Name'];?><br>
                      <span style="color:white; font-size:16px;"><?php echo $team['Affiliation'];?></span>
                    </h3>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>

        <div class="row justify-content-center box mt-5 border-top" data-aos="fade-up">
          <div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
           <p style="font-size:20px; margin:20px; color:#E5E5E5;line-height: 28px; font-family: 'Open Sans','Helvetica Neue',Arial,sans-serif; font-style: normal;font-weight:400;">
             Walk With Web collaborates with exceptional scholars around the globe on their research,
             projects and grant applications. Our rapidly expanding collaboration with such scholars
             help us to evolve with time and to be exceptional in our work. We work closely with our collaborators
             to improve our research methodologies and to create the best possible outcomes.<br><br>

             Our collaborators can be nominated by any member of our team and are mutually selected by
             our Board of Directors. We remain dedicated to collaborating on these scholars research whenever possible. Walk With Web does not provide any financial benefits to its collaborators unless specified in a written agreement signed by our Chief Executive Officer.

           </p>
         </div>
       </div>

    </div>
</section><!-- End About Us Section -->

<?php require_once("../Public/footer.php");?>
