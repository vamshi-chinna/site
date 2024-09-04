<?php
require_once("../config/database.php");
require_once("../Public/header.php");
$sql = "SELECT * FROM projects where ID=" . $_GET['ProjectID'] . " limit 1;";
$id=$_GET['ProjectID'];
$query = $conn->query($sql);
$projects = $query->fetch(PDO::FETCH_ASSOC);
$project_code=$projects['project_code'];
?>


<section id="projectdetails" class="section-bg">
  <div class="container" data-aos="fade-up">
    <div class="row backbtn pb-5">
      <div class="col-lg-12 text-right">
         <a href="javascript:history.go(-1)" class="btn-get-started scrollto"><i class="fas fa-chevron-left"></i>back</a>
      </div>
    </div>
    <header class="section-header">
      <h3><?php echo $projects['Title'] ?></h3>
    </header>

    <article class="row single-post mt-5 no-gutters">
      <div class="col-md-12 mt-5">
        <div class="image-wrapper float-right">
          <?php if($projects['link']!='0'){ ?>
          <a target="_blank" href="<?php echo $projects['link'];?>"> <?php }?>
          <img  class="img-project img-fluid" src="<?php echo $projects['Img'];?>" style="width:550px;" alt="<?php echo $projects['Title'];?>"></a>
        </div>
        <div class="single-post-content-wrapper">
          <div class="content-box">
            <h2 class="p-1"><?php echo $projects['Content'];?>
          </div>
        </div>
      </div>
    </article>

    <div class="row pt-3">
          <div class="col-lg-6 col-md-12 col-sm-12 content-box pt-3"  data-aos="fade-up" data-aos-delay="100">
            <div class="box pb-4">
                <h2>Current Status:</h2>
                <div class="table-responsive statusTable">
                     <table class="table table-bordered text-center">
                       <tr>
                          <th scope="col" style="color:#007bff;">Development</th>
                          <th scope="col" style="color:#007bff;">Deployment</th>
                          <th scope="col" style="color:#007bff;">Control</th>
                          <th scope="col" style="color:#007bff;">Support</th>
                       </tr>
                       <tr>
                          <td scope="row" class="pt-5">
                          <?php if($projects['Development']==0){ ?>
                             <p style="color: #0AF318;"><b>Active</b></p>
                          <?php }?>
                          <?php if($projects['Development']==1){ ?>
                             <p style="color: #D7F30A;"><b>In Progress</b></p>
                          <?php }?>
                          <?php if($projects['Development']==2){ ?>
                            <p style="color: #0A94F3;"><b>Not Required</b></p>
                          <?php }?>
                          </td>
                          <td scope="row" class="pt-5">
                          <?php if($projects['Deployment']==0){ ?>
                           <p style="color: #0AF318;"><b>Active</b></p>
                          <?php }?>
                          <?php if($projects['Deployment']==1){ ?>
                           <p style="color: #D7F30A;"><b>In Progress</b></p>
                          <?php }?>
                          <?php if($projects['Deployment']==2){ ?>
                           <p style="color: #0A94F3;"><b>Not Required</b></p>
                          <?php }?>
                          </td>
                          <td scope="row" class="pt-5">
                         <?php if($projects['Control']==0){ ?>
                         <p style="color: #0AF318;"><b>Active</b></p>
                         <?php }?>
                         <?php if($projects['Control']==1){ ?>
                         <p style="color: #D7F30A;"><b>In Progress</b></p>
                         <?php }?>
                         <?php if($projects['Control']==2){ ?>
                         <p style="color: #0A94F3;"><b>Not Required</b></p>
                          <?php }?>
                         </td>
                         <td scope="row" class="pt-5">
                         <?php if($projects['Support']==0){ ?>
                         <p style="color: #0AF318;"><b>Active</b></p>
                         <?php }?>
                          <?php if($projects['Support']==1){ ?>
                          <p style="color: #D7F30A;"><b>In Progress</b></p>
                          <?php }?>
                          <?php if($projects['Support']==2){ ?>
                          <p style="color: #0A94F3;"><b>Not Required</b></p>
                         <?php }?>
                        </td>
                     </tr>
                 </table>
               </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 align-middle"  data-aos="fade-up" data-aos-delay="100">
            <br>
            <div class="p-2 pt-5">
                <?php if($projects['link']!='0'){ ?>
                 <a target="_blank" href="<?php echo $projects['link'];?>"><button style="width: 100%;font-weight:bold; min-height: 3.5rem;" class="button btn-primary p-2">Walk With us to the Website<img src="../assets/img/man1.png"  style="width:2.2rem;" class="pl-1" alt="Walking Stick Man"/></button></a>
                 <?php } ?>
              </div>
              <div class="p-2 pt-3">
               <?php if($projects['gateway']!='0'){ ?>
                <a target="_blank" href="<?php echo $projects['link_regid'];?>"><button style="width: 100%;font-weight:bold; min-height: 3.5rem;" class="button btn-info p-2">Login with <?php echo $projects['gateway'];?> <i class="fas fa-sign-in-alt"></i></button></a>
               <?php } ?>
              </div>
          </div>
        </div>

        <?php if($projects['References']){ ?>
            <div class="row justify-content-left pt-4" style="min-height: 25rem !important;">
              <div class="col-lg-12 col-md-12 col-sm-12 mt-5"  data-aos="fade-up" data-aos-delay="100">
                <h2 class="border-bottom p-3 pb-5">Featured Resources</h2>
                <div class="FeaturedR">
                      <h2><?php echo htmlspecialchars_decode($projects['References']);?></h2>
                </div>
              </div>
            </div>
        <?php }?>



         <?php
         $team_q="select  team.Name,team.Display,team.Bio,projects.project_code,team.ID,team_project.position,team_project.id,team.Img,team_project.project_code from projects,team,team_project where team_project.project_code=projects.project_code and team_project.team_email=team.email and  team_project.position='Directors' and team_project.project_code='$project_code' order by team_project.listorder";
         $team_query = $conn->query($team_q);
          if($team_query->fetchColumn()){ ?>
         <div class="row justify-content-left" style="min-height: 15rem !important;">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-5"  data-aos="fade-up" data-aos-delay="100">
             <h2 class="border-bottom p-3">Directors</h2>
            </div>
         <?php
         $team_query = $conn->query($team_q);
         while ($team= $team_query->fetch(PDO::FETCH_ASSOC)){ ?>

            <div class="col-lg-3 col-md-6 col-sm-8 text-center member-block" data-aos="fade-up" data-aos-delay="100">
              <?php if ($team['Display']>0) { ?><a href="../Teams/team_details.php?TeamID=<?php echo $team['ID']; ?>"><?php }?>
                <div class="portfolio-wrap ">
                    <figure>
                      <img class="team-image  mt-5" src="<?php echo $team['Img'];?>" alt="<?php echo $team['Name'];?>">
                    </figure>
                </div>
                 <?php if ($team['Display']>0) {?></a><?php }?>
                <h3 class="up-effect pt-3 text-uppercase teamHdr" style="color: #0ACFF3; font-weight:600;">
                  <?php echo $team['Name'];?>
                </h3>
              </div>
            <?php } ?>
           </div>
         <?php } ?>



         <?php
         $team_q="select  team.Name,team.Display, team.Bio,projects.project_code,team.ID,team_project.position,team_project.project_code,team_project.project_role,team.Img from projects,team,team_project where team_project.project_code=projects.project_code and team_project.team_email=team.email and  team_project.position='Team' and team_project.project_code='$project_code' order by team_project.listorder";
         $team_query = $conn->query($team_q);

         if($team_query->fetchColumn()){ ?>
           <div class="row justify-content-left" style="min-height: 15rem !important;">
             <div class="col-lg-12 col-md-12 col-sm-12 mt-5 "  data-aos="fade-up" data-aos-delay="100">
               <h2 class="border-bottom p-3">Project Crew</h2>
             </div>
         <?php
         $team_query = $conn->query($team_q);
         while ($team= $team_query->fetch(PDO::FETCH_ASSOC)){ ?>
            <div class="col-lg-3 col-md-6 col-sm-8 text-center member-block" data-aos="fade-up" data-aos-delay="100">
               <?php if ($team['Display']>0) {?><a href="../Teams/team_details.php?TeamID=<?php echo $team['ID']; ?>"><?php }?>
                 <div class="portfolio-wrap">
                    <figure>
                      <img class="team-image mt-5" src="<?php echo $team['Img'];?>" alt="<?php echo $team['Name'];?>">
                    </figure>
                </div>
               <?php if ($team['Display']>0) {?></a><?php }?>
              <h3 class="up-effect pt-3 text-uppercase" style="color: #0ACFF3;font-weight:600;">
                <?php echo $team['Name'];?><br>
                <span style="color:white; font-size:16px;"><?php echo $team['project_role'];?></span>
              </h3>
            </div>
         <?php } ?>
        </div>
      <?php } ?>


         <?php
         $acknowledgement_q="select Acknowledgement from projects where project_code='$project_code'";
         $acknowledgement_query = $conn->query($acknowledgement_q);
         $acknowledgement= $acknowledgement_query->fetch(PDO::FETCH_ASSOC);
         $acknowledgement = preg_split ("/\;/", $acknowledgement['Acknowledgement']);
         $length = count($acknowledgement);
         ?>
         <?php
          if($length>1){ ?>
            <div class="row justify-content-left" style="min-height: 15rem !important;">
              <div class="col-lg-12 col-md-12 col-sm-12 mt-5 pb-4 "  data-aos="fade-up" data-aos-delay="100">
                  <h2 class="border-bottom p-3">Acknowledgements</h2>
              </div>
          <?php  for ($i = 0; $i < $length; $i++){?>

                  <div class="col-lg-12 col-md-12 col-sm-12 member-block" data-aos="fade-up" data-aos-delay="100">
                    <h3><?php print $acknowledgement[$i];?></h3>
                  </div>

              <?php } ?>
                </div>
            <?php } ?>


         <?php
         $team_q="select Affiliations from projects where project_code='$project_code'";
         $team_query = $conn->query($team_q);
         $team= $team_query->fetch(PDO::FETCH_ASSOC);
         $affiliations = preg_split ("/\;/", $team['Affiliations']);
         $length = count($affiliations);  ?>
                <?php
          if($length>1){ ?>
            <div class="row justify-content-left" style="min-height: 15rem !important;">
              <div class="col-lg-12 col-md-12 col-sm-12 mt-5 pb-4 "  data-aos="fade-up" data-aos-delay="100">
                <h2 class="border-bottom p-3 ">Affiliations</h2>
              </div>
              <?php for ($i = 0; $i < $length; $i++){?>

                <div class="col-lg-12 col-md-12 col-sm-12 member-block" data-aos="fade-up" data-aos-delay="100">
                    <h3><?php print $affiliations[$i];?></h3>
                  </div>

            <?php } ?>
                </div>
        <?php  } ?>




  </div>
</section>

<?php require_once("../Public/footer.php");?>
