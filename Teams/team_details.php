<?php
if (!isset($_GET['TeamID']) || empty($_GET['TeamID'])) {
  header("Location: ./team.php");
  die;
}
require_once("../config/database.php");
require_once("../Public/header.php");
$sql = "SELECT * FROM team where ID=" . $_GET['TeamID'] . " limit 1;";
$query = $conn->query($sql);
$team = $query->fetch(PDO::FETCH_ASSOC);
$id=$_GET['TeamID'];
$email=$team['email'];
?>
<section  id="team-sec" class="section-bg">
  <div class="container" data-aos="fade-up" style="margin-top: 120px;">
    <div class="row backbtn pb-5">
      <div class="col-lg-12 text-right">
         <a href="javascript:history.go(-1)" class="btn-get-started scrollto"><i class="fas fa-chevron-left"></i>back</a>
      </div>
    </div>
    <header class="section-header">
      <h3 class="pb-4"><?php echo $team['Name'];?></h3>
   </header>

      <div class="row mt-5">
        <div class="col-lg-3 col-md-6 col-sm-8 text-center member-block" data-aos="fade-up" data-aos-delay="100">
          <img class="team-image" alt="<?php echo $team['Name'];?>" src="<?php echo $team['Img'];?>">
          <p class="mt-3 text-uppercase"><span style="color:white; font-size:16px;font-weight:600;"><?php echo $team['Role'];?></p></p>
          <div class="contact-con">
            <a target="_blank" href="mailto:<?php echo $team['email'];?>"><i class="fa fa-envelope"></i></a>
            <a target="_blank" href="<?php echo $team['link'];?>"><i class="fa fa-globe fa-2x"></i></a>
          </div>
        </div>
        <div class="col-lg-9 col-md-6 col-sm-12  align-items-center justify-content-center"  data-aos="fade-up" data-aos-delay="100">
          <h5><?php echo $team['Bio'];?></h5>
        </div>
      </div>
  </div>
 </section>
  <section  class="portfolio">
    <div class="container" data-aos="fade-up">

        <?php if($team['References']){ ?>
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 text-left" style="min-height: 25rem !important;">
                    <h2 class="border-bottom p-3 pb-3">Featured Articles:</h2></br>
                    <h5><?php echo $team['References'];?></h5>
                  </div>
              </div>
          <?php } ?>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 text-left">
              <h2 class="border-bottom p-3">Projects:</h2>
          </div>
      </div>
       <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
        <?php
          $sql="select  projects.Title,projects.ID as PID,team.ID,projects.Img,team_project.team_email from projects,team,team_project where team_project.project_code=projects.project_code and team_project.team_email=team.email and team_project.team_email='$email'";
          $stmt = $conn->query($sql);
          $images = $stmt->fetchAll();
          foreach ($images as $key => $row) { echo '
        <div class="col-lg-4 col-md-6 p-3 portfolio-item">
          <a  href="../Project/project-details.php?ProjectID='.$row['PID'].'">
          <div class="portfolio-wrap">
            <figure>
              <img src="' . $row['Img'] . '" class="img-fluid" alt="'.$row['Title'].'">
            </figure>
            <div class="portfolio-info">
              <h4> ' . $row['Title'] . '</h4>
            </div>
          </div></a>
       </div>';
       }?>
    </div>
 </div>
</div>
</div>
</section><!-- End Portfolio Section -->

<script type='text/javascript'>

(function()
{
  if( window.localStorage )
  {
    if( !localStorage.getItem('firstLoad') )
    {
      localStorage['firstLoad'] = true;
      window.location.reload();
    }
    else
      localStorage.removeItem('firstLoad');
  }
})();

</script>
<?php require_once("../Public/footer.php"); ?>
