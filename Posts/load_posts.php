<?php
require_once("../config/database.php");
if (isset($_POST['row'])) {
  $start = $_POST['row'];
  $limit = 4;
  $recent_sql="SELECT * FROM Recent ORDER BY id desc LIMIT ".$start.",".$limit;
  $recent_result = $conn->query($recent_sql);

  while ($recent= $recent_result->fetch(PDO::FETCH_ASSOC)){ ?>
    <div class="col-lg-6 col-md-6 col-sm-12 p-4 textbox">
      <div class="card border-primary" data-aos="fade-up" data-aos-delay="100">
        <div class="card-body">
          <h5 class="card-title"><?php echo $recent['Title'];?></h5>
          <h6 class="card-subtitle mb-2"><?php echo $recent['Log'];?></h6>
          <p class="card-text"><?php echo $recent['Content'];?></p>
          <h4 class="text-right text-bottom"><a target="_blank" href="<?php echo $recent['link'];?>">details<i class="fas fa-chevron-right"></i></a></h4>
        </div>
      </div>
    </div>
  <?php } 
} ?>