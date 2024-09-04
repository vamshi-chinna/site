<?php
require_once("../config/database.php");
require_once("../Public/header.php");
?>


<section id="posts" class="section-bg">
  <div class="container"  data-aos="fade-up">
    <header class="section-header">
      <h3>Reports, News & Posts</h3>
    </header>

    <div class="row justify-content-center mt-5 postList">
      <?php
      $count_query = "SELECT count(*) as allcount FROM Recent";
      $count_result = $conn->query($count_query);
      $count_fetch = $count_result->fetch(PDO::FETCH_ASSOC);
      $postCount = $count_fetch['allcount'];
      $limit =4;

      $recent_q="SELECT * FROM Recent ORDER BY id desc LIMIT 0,".$limit;
      $recent_query = $conn->query($recent_q);
      while ($recent= $recent_query->fetch(PDO::FETCH_ASSOC)){ ?>
          <div class="col-lg-6 col-md-6 col-sm-12 p-4 textbox">
            <div class="card border-primary" data-aos="fade-up" data-aos-delay="100">
              <div class="card-body">
                <h5 class="card-title"><?php echo $recent['Title'];?></h5>
                <h6 class="card-subtitle mb-2"><?php echo $recent['Log'];?></h6>
                <p class="card-text"><?php echo $recent['Content'];?></p>
                <h4 class="text-right text-bottom"><a target="_blank" href="<?php echo $recent['link'];?>" >View Details<i class="fas fa-chevron-right"></i></a></h4>
              </div>
            </div>
          </div>
      <?php } ?>
    </div>
    <?php if($recent_query->rowCount() <$postCount){?>
     <div class="loadmore text-center mt-5" data-aos="fade-up" data-aos-delay="100">
      <input class="btn-get-started btn-primary animated fadeInUp scrollto" id="loadBtn" value="Read More">
      <input type="hidden" id="row" value="0">
      <input type="hidden" id="postCount" value="<?php echo $postCount; ?>">
     </div>
    <?php }?>
  </div>
</section>

 <script>
    $(document).ready(function () {
      $(document).on('click', '#loadBtn', function () {
        var row = Number($('#row').val());
        var count = Number($('#postCount').val());
        var limit =4;
        row = row + limit;
        $('#row').val(row);
        $("#loadBtn").val('Loading...');

        $.ajax({
          type: 'POST',
          url: 'load_posts.php',
          data: 'row=' + row,
          success: function (data) {
            var rowCount = row + limit;
            $('.postList').append(data);
            if (rowCount >= count) {
              $('#loadBtn').css("display", "none");
            } else {
              $("#loadBtn").val('Read More');
            }
          }
        });
      });
    });
  </script>

<?php require_once("../Public/footer.php"); ?>
