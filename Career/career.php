<?php
require_once("../config/database.php");
require_once("../Public/header.php");
?>
<section id="career" class="section-bg">
  <div class="container" data-aos="fade-up">
    <header class="section-header">
      <h3>Careers</h3>
    </header>
    <div class="row">
      <!--Left Side-->
      <div class="col-lg-8 mb-5 borderline">
        <div class="row mt-5 justify-content-left">
          <div class="col-12">
            <h6 class="position-hdr">OPEN POSITIONS</h6>
          </div>
        </div>
        <div class="row justify-content-left mt-2">
          <?php
          $today = date("Y-m-d");
          $career_active_sql = "SELECT * FROM career WHERE DATE(Deadline) > '". $today ."' ORDER BY PostedOn desc";
          $career_active_result = $conn->query($career_active_sql);
          if ($career_active_result->rowCount()>0) {
            while ($career_a = $career_active_result->fetch(PDO::FETCH_ASSOC)) { ?>
              <div class="card-deck col-lg-6 col-md-6 col-sm-12 p-4 post" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-primary" style="min-height:10rem;">
                  <div class="card-body">
                    <h4 class="card-text"><b><?php echo $career_a['Title']; ?></b></h4>
                    <div class="inner"><p class="card-text pb-2"><b>Location:</b> <?php echo htmlspecialchars_decode($career_a['Location']); ?></p>
                    </div>
                    <br>
                    <div class="inner">
                      <h5>
              <?php if (!is_null($career_a['Type'])) { ?>
                            <span type="button"
                                  class="badge badge-info mb-1"><b>Type:</b> <?php echo $career_a['Type']; ?></span></br>
              <?php }
              if (!is_null($career_a['PostedOn'])) { ?>
                            <span type="button"
                                  class="badge badge-success mb-1"><b>Posted On:</b> <?php echo $career_a['PostedOn']; ?></span>

              <?php }
              if (!is_null($career_a['Deadline'])) { ?>
                            <span type="button"
                                  class="badge badge-danger"><b>Deadline:</b> <?php if (date("Y-m-d") > $career_a['Deadline']) {
                  echo "Closed";
                } else {
                  echo $career_a['Deadline'];
                } ?></span>
              <?php } ?>
                      </h5>
                    </div>
                    <h4 class="text-right text-bottom"><a
                        href="career_details.php?CareerID=<?php echo $career_a['id']; ?>">View Details<i
                          class="fas fa-chevron-right"></i></a></h4>
                  </div>
                </div>
              </div>
            <?php }
          } else {?>
            <div class="col-12">
              <h6><p>No open positions at this time.</p></h6>
            </div>
          <?php } ?>
        </div>
        <div class="row mt-5 justify-content-left">
          <div class="col-12">
            <h6 class="position-hdr">CLOSED POSITIONS</h6>
          </div>
        </div>
        <div class="row justify-content-left mt-2 postList">
      		<?php
      		$count_query = "SELECT count(*) as allcount FROM career WHERE DATE(Deadline) < '". $today ."'";
      	  $count_result = $conn->query($count_query);
      		$count_fetch = $count_result->fetch(PDO::FETCH_ASSOC);
      		$postCount = $count_fetch['allcount'];
      		$limit = 2;
      		$career_sql = "SELECT * FROM career WHERE DATE(Deadline) < '". $today ."' and `Status` LIKE '3' ORDER BY PostedOn desc LIMIT 0," . $limit;
      		$career_result = $conn->query($career_sql);
          $isAboutMsgSet = false;
          $aboutUsMsg = "";
      		if ($career_result->rowCount() > 0) {
      			while ($career = $career_result->fetch(PDO::FETCH_ASSOC)) { ?>
              <?php
                if(!$isAboutMsgSet){
                  $aboutUsMsg = $career['AboutUs'];
                }
              ?>
                    <div class="card-deck col-lg-6 col-md-6 col-sm-12 p-4 post" data-aos="fade-up" data-aos-delay="100">
                      <div class="card border-primary" style="min-height:10rem;">
                        <div class="card-body">
                          <h4 class="card-text"><b><?php echo $career['Title']; ?></b></h4>
                          <div class="inner"><p class="card-text pb-2"><b>Location:</b> <?php echo htmlspecialchars_decode($career['Location']); ?></p>
                          </div>
                          <br>
                          <div class="inner">
                            <h5>
      						  <?php if (!is_null($career['Type'])) { ?>
                                  <span type="button"
                                        class="badge badge-info mb-1"><b>Type:</b> <?php echo $career['Type']; ?></span></br>
      						  <?php }
      						  if (!is_null($career['PostedOn'])) { ?>
                                  <span type="button"
                                        class="badge badge-success mb-1"><b>Posted On:</b> <?php echo $career['PostedOn']; ?></span>

      						  <?php }
      						  if (!is_null($career['Deadline'])) { ?>
                                  <span type="button"
                                        class="badge badge-danger"><b>Deadline:</b> <?php if (date("Y-m-d") > $career['Deadline']) {
      									echo "Closed";
      								} else {
      									echo $career['Deadline'];
      								} ?></span>
      						  <?php } ?>
                            </h5>
                          </div>
                          <h4 class="text-right text-bottom"><a
                              href="career_details.php?CareerID=<?php echo $career['id']; ?>">View Details<i
                                class="fas fa-chevron-right"></i></a></h4>
                        </div>
                      </div>
                    </div>
      			<?php }
      		} ?>
        </div>
        <?php if ($career_result->rowCount() < $postCount) { ?>
            <div class="loadmore text-center mt-5" data-aos="fade-up" data-aos-delay="100">
              <input class="btn-get-started btn-primary animated fadeInUp scrollto" id="loadBtn" value="View More">
              <input type="hidden" id="row" value="0">
              <input type="hidden" id="postCount" value="<?php echo $postCount; ?>">
            </div>
        <?php } ?>
      </div>
      <!--Right Side-->
      <div class="col-lg-4 mt-5">
        <h6><p>Welcome and thank you for your interest in Walk With Web Inc.</p></h6>
        <h4 class="about-career mt-5"><b>About Us</b></h4>
        <div class="row pb-3 pl-3 pr-3">
          <div class="col-12 embed-responsive embed-responsive-21by9 z-depth-1-half p-5 border-top">
            <br>
            <iframe class="pt-3 embed-responsive-item" src="https://www.youtube.com/embed/lQOE5R-kJ5w" allowfullscreen></iframe>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h6>
              <p>We are located in Toronto, Canada but work remotely with an international team, offering a rich and inspirational environment in which we grow under the guidance of academic researchers and world-class scholars, who are pioneering in their fields.</p>
              <p>We strive to develop an inclusive work environment that reflects the diversity of its community of academicians.</p>
              <p>WWW is an equal access employer and does not discriminate on the basis of gender, ethnicity, religion, sexual orientation, social status, disability, and/or age.</p>
            </h6>
          </div>
        </div>
        <h4 class="about-career"><b>Contact</b></h4>
        <div class="row">
          <div class="col-12">
            <h6>
              <p class="border-top">For general Human Resources inquires, email: <a href="mailto:hr@walkwithweb.org">hr@walkwithweb.org</a></p>
              <p>Submit your applications at: <a href="mailto:recruitments@walkwithweb.org">recruitments@walkwithweb.org</a></p>
            </h6>
          </div>
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
                url: 'load_career.php',
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
<?php
require_once("../Public/footer.php");
?>
