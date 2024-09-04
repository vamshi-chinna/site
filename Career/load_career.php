<?php
require_once("../config/database.php");
if (isset($_POST['row'])) {
  $today = date("Y-m-d");
  $start = $_POST['row'];
  $limit = 2;
$career_sql="SELECT * FROM career WHERE DATE(Deadline) < '". $today ."' and `Status` LIKE '3' ORDER BY PostedOn desc LIMIT ".$start.",".$limit;
$career_result = $conn->query($career_sql);

    while ($career= $career_result->fetch(PDO::FETCH_ASSOC)){ ?>
        <div class="card-deck col-lg-6 col-md-6 col-sm-12 p-4 post"  data-aos="fade-up">
            <div class="card border-primary" style="min-height:10rem;">
              <div class="card-body">
                <h4 class="card-text" ><b><?php echo $career['Title'];?></b></h4>
                <div class="inner pb-2"><p class="card-text pb-2"><b>Location:</b> <?php echo $career['Location'];?></p></div><br>
                <div class="inner">
                  <h5>
                    <?php if(!is_null($career['Type'])){ ?>
                  <span type="button" class="badge badge-info mb-1"><b>Type:</b> <?php echo $career['Type'];?></span></br>
                <?php } if(!is_null($career['PostedOn'])){ ?>
                  <span type="button" class="badge badge-success mb-1"><b>Posted On:</b> <?php echo $career['PostedOn'];?></span>

                  <?php } if(!is_null($career['Deadline'])){ ?>
                    <span type="button" class="badge badge-danger"><b>Deadline:</b><?php  if (date("Y-m-d") > $career['Deadline']) {
                  echo "Closed";
                 } else {
                  echo $career['Deadline'];
                 } ?></span>
                <?php }?>
                </h5>
                </div>

                <h4 class="text-right text-bottom"><a href="career_details.php?CareerID=<?php echo $career['id']; ?>" >View Details<i class="fas fa-chevron-right"></i></a></h4>
              </div>
            </div>
        </div>
    <?php }
} ?>
