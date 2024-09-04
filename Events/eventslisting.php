<?php
require_once("../config/database.php");
require_once("../Public/header.php");
?>
<section id="portfolio" class="section-bg">
  <div class="container" data-aos="fade-up">
    <header class="section-header pb-5">
      <h3>Events Catalogue</h3>
    </header>

      <!--Left Side-->
      <div class="col-lg-12 mb-5">
            <?php
            $today = date("Y-m-d");
      		$count_query = "SELECT count(*) as allcount FROM events";
      	    $count_result = $conn->query($count_query);
      		$count_fetch = $count_result->fetch(PDO::FETCH_ASSOC);
      		$postCount = $count_fetch['allcount'];
      		$limit = 6;
      		$event_sql = "SELECT * FROM events ORDER BY StartDate desc LIMIT 0," . $limit;
      		$event_result = $conn->query($event_sql);
      		if ($event_result->rowCount() > 0) {
      			while ($event = $event_result->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="row">
                         <?php $event_result = $conn->query($event_sql);
                          $images = $event_result->fetchAll();?>
                          <?php foreach ($images as $key => $row) {
                          $eventDate = $row['StartDate'];
                          $newDate = str_replace('-"', '/', $eventDate);
                          $date = date("d F Y", strtotime($newDate));
                          echo '
                          <div class="col-lg-6 col-md-6 col-sm-12 text-center p-3  portfolio-item filter-' . str_replace(' ', '', $row['Title']) . '"  >
                             <a  href="events_details.php?EventID='.$row['id'].'">
                             <div>
                                 <figure>
                                    <img src="../assets/img/events/' . $row['Img'] . '" class="img-fluid" alt="Event - '.$row['Title'].'">
                                 </figure>
                                    <div class="overlay py-3 px-5">
                                       <h4 class="details">'.$row['Title'].'<br>' . $date . '</h4>
                                    </div>
                              </div></a>
                          </div>';
                     }?>
                     </div>
      			<?php }
      		} ?>
            </div>
        </div>
        <?php if ($event_result->rowCount() < $postCount) { ?>
            <div class="loadmore text-center mt-5" data-aos="fade-up" data-aos-delay="100">
              <input class="btn btn-primary animated fadeInUp scrollto" id="loadBtn" value="View More">
              <input type="hidden" id="row" value="0">
              <input type="hidden" id="postCount" value="<?php echo $postCount; ?>">
            </div>
        <?php } ?>
         </div>
       </div>
    </div>
</section>


<script>
    $(document).ready(function () {
        $(document).on('click', '#loadBtn', function () {
            var row = Number($('#row').val());
            var count = Number($('#postCount').val());
            var limit = 2;
            row = row + limit;
            $('#row').val(row);
            $("#loadBtn").val('Loading...');
            $.ajax({
                type: 'POST',
                url: 'load_eventslisting.php',
                data: 'row=' + row,
                success: function (data) {
                    var rowCount = row + limit;
                    $('.postList').append(data);
                    if (rowCount >= count) {
                        $('#loadBtn').css("display", "none");
                    } else {
                        $("#loadBtn").val('View More');
                    }
                }
            });
        });
    });
</script>

<style type="text/css">
/* These styles are just made to ovveride the style.css */
.overlay{
    position: absolute;
    top:70% !important;
    left: 0;
    right: 0;
    bottom: 0;
    background-color:rgba(0,0,0,0.7)
}
.overlay h4{
    font-size: 20px;
    color: #fff;
    font-weight: 700;
    font-family: 'Open Sans','Helvetica Neue','Arial','sans-serif';
}

@media screen and (max-width:992px){.overlay h4{font-size:13px;}}
@media screen and (max-width:768px){.overlay h4{font-size:18px;}}
@media screen and (max-width:500px){.overlay h4{font-size:14px;}}

</style>

<?php
require_once("../Public/footer.php");
?>
