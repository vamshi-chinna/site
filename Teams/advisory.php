<?php
require_once("../config/database.php");
require_once("../Public/header.php");
?>

 <section class="team-sec" id="team-sec">
   <div class="container" data-aos="fade-up" style="margin-top:80px;">
        <header class="section-header">
            <h3>Board of Directors</h3>
        </header>


      <div class="row justify-content-center box mt-5" data-aos="fade-up">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="row justify-content-center">
             <?php
             $team_q="SELECT * from `team` where  `Role` LIKE '%Director%' OR `Role` LIKE '%CEO%' ORDER BY `list_order`";
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
                     <span style="color:white; font-size:16px;"><?php echo $team['position'];?></span>
                   </h3>
               </div>

             <?php } ?>
           </div>
         </div>
       </div>
  <div class="container" data-aos="fade-up" style="margin-top:80px;">
       <header class="section-header">
           <h3>Projects' Directors & Collaborators</h3>
       </header>


     <div class="row justify-content-center box mt-5" data-aos="fade-up">
       <div class="col-lg-12 col-md-12 col-sm-12">
         <div class="row justify-content-center">
            <?php
            $team_q="SELECT * from `team` where  `Role` LIKE '%Advisory%' OR `Role` LIKE '%Collaborator%' ORDER BY `list_order`";
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
           Walk With Web's Board of Directors includes world-class academic scholars and industry
           professionals, who guide our team and collaborators in conducting research and development
           to ensure high standards of our research agendas and leadership.
           The duties of our Board of Directors includes but does not limit to, providing on-going feedback
           on development of Walk With Web's and its client's projects when requested,
           particiaption and/or providing review or guidance for the funding applications in
           which Walk With Web is involved,
           bringing opportunities for research outreach, academic/non-academic publications,
           and providing insights on ethical aspects of our work. Walk With Web does not provide any
           compensation to the members of it's Board of Directors.<br><br>

           Walk With Web collaborates with exceptional scholars around the globe on their research,
           projects and grant applications. Our rapidly expanding collaboration with such scholars
           help us to evolve with time and to be exceptional in our work. We work closely with our research projects' directors,
           who are our clients and collaborators to improve research methodologies and create the best possible research outcomes.
            We remain dedicated to collaborating on these scholars research whenever possible. Walk With Web does
            not provide any compensation to Projects' Directors and Collaborators.

         </p>
       </div>
     </div>

   </div>
 </section>

<?php
require_once("../Public/footer.php");
?>
