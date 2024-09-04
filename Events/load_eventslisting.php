<?php
require_once("../config/database.php");
if (isset($_POST['row'])) {
  $today = date("Y-m-d");
  $start = $_POST['row'];
  $limit = 2;
$event_sql="SELECT * FROM events WHERE DATE(StartDate) < '". $today ."' ORDER BY StartDate desc LIMIT ".$start.",".$limit;
$event_result = $conn->query($event_sql);

    while ($event= $event_result->fetch(PDO::FETCH_ASSOC)){
      echo '
      <div class="col-lg-6 col-md-6 col-sm-12 p-3 text-center  portfolio-item filter-' . str_replace(' ', '', $event['Title']) . '"  >
         <a  href="events_details.php?EventID='.$event['id'].'">
         <div class="portfolio-wrap">
             <figure>
                <img src="../assets/img/events/' . $event['Img'] . '" class="img-fluid" alt="Event'.$event['Title'].'">
             </figure>
                <div class="portfolio-info">
                   <h4 class="p-3"> ' . $event['Title']. '</h4>
                </div>
          </div></a>
      </div>';

    }
} ?>
