<?php
if (!isset($_GET['CareerID']) || empty($_GET['CareerID'])) {
  header("Location: ./projects.php");
  die;
}

require_once("../config/database.php");
require_once("../Public/header.php");
$sql = "SELECT * FROM career where id=" . $_GET['CareerID'] . " limit 1;";
$query = $conn->query($sql);
$career = $query->fetch(PDO::FETCH_ASSOC);
$todaydate=strtotime(date("Y-m-d"));
$posteddate=strtotime($career['PostedOn']);
$diff =($todaydate - $posteddate)/60/60/24;
if($diff==0){
  $differ='today';
}
else{
  $differ=round($diff);
  $differ .= " days ago";
}
?>

<section id="careerdetails" class="section-bg">
 <div class="container" data-aos="fade-up">
    <header class="section-header">
      <h3>Careers</h3>
    </header>
 </div>
  <div class="container" data-aos="fade-up">
   <div class="row">
      <div class="col-lg-7 col-md-7 col-sm-12 p-5 borderline">
        <?php if(date("Y-m-d") > $career['Deadline']){?>
        <div class="alert alert-danger" role="alert">
          "WE ARE <strong> NO LONGER </strong> ACCEPTING APPLICATIONS FOR THIS POSITION"
        </div> <?php }?>
         <h1 class="card-text card-link" style="color:#0ACFF3;"><?php echo $career['Title'];?></h1>
         <h6 class="pt-4"><?php echo htmlspecialchars_decode($career['Main_Text']);?></h6>
      </div>
      <div class="col-lg-5 col-md-5 col-sm-12 p-5">
        <button type="button" class="btn btn-outline-dark"><a href="career.php" class="card-link"><&nbsp;View Positions List</a></button>

      <?php if(!is_null($career['PostedOn'])){ ?>
        <h6 class="card-text pt-5" style="color:#FFF;"><i class="far fa-clock"></i>&nbsp;Posted <?php echo $differ;?></h6>
      <?php } if(!is_null($career['Type'])){ ?>
        <h6  class="card-text"><i class="fas fa-business-time"></i>&nbsp;<?php echo $career['Type'];?></h6>
      <?php } if(!is_null($career['Location'])){ ?>
         <h6 style="color:#D0D0D0;padding-top:2%;" class="card-text t-5"><i class='fas fa-map-marker-alt'></i>&nbsp;<?php echo $career['Location'];?></h6>
       <?php } if(!is_null($career['Deadline'])){ ?>
         <h6 style="color:#D0D0D0;padding-top:2%;" class="card-text t-5"><i class="fas fa-hourglass-half"></i>&nbsp;Apply by: <?php echo $career['Deadline'];?> | 6:00 PM (EST)</h6>
           <?php }?>
        <h4 style="padding-top:17%;"><b></br>About Us</b></h4><h6><?php echo htmlspecialchars_decode($career['AboutUs']);?></h6>

      </div>
    </div>
</section>

<?php
require_once("../Public/footer.php");
 ?>
